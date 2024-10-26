<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class ClientAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Appointments';
        $data['header']     = 'List of Appointments';
        $client             = Client::where('user_id', auth()->user()->id)->first();

        $data['appointments']   = Appointment::where('client_id', $client->id)
            ->where('status', '!=', 'Declined')
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();
        return view('client.appointments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title']     = 'Appointments';
        $data['header']         = 'Update Appointment';
        $data['appointment']    = Appointment::find($id);

        return view('client.appointments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = Appointment::find($id);

        $schedule    = explode('T', $request['schedule']);

        $appointment->appointment_date = $schedule[0];
        $appointment->appointment_time = $schedule[1];
        $appointment->status           = $request['status'];
        $appointment->save();

        $user = User::find($appointment->customer_id);
        $client = Client::find($appointment->client_id);
        $service = Service::find($appointment->service_id);

        $message = 'Your appointment with ' . $client->name . ' on ' . $appointment->schedule . ' for ' . $service->name . ' has been ' . $appointment->status;
        $content = ['message' => $message];
        Mail::to($user->email)->send(new NotificationMail($user, $content));

        return redirect()->to('client/appointments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return response()->json(200);
    }
}
