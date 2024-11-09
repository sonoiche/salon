<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Appointment;
use App\Models\SalonService;
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['appointments'] = Appointment::where('customer_id', auth()->user()->id)->latest()->get();
        return view('site.appointment.create', $data);
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
        $appointment = new Appointment();
        $appointment->client_id         = $request['client_id'];
        $appointment->service_id        = $request['service_id'];
        $appointment->contact_number    = $request['contact_number'];
        $appointment->amount            = $request['amount'];
        $appointment->appointment_date  = $request['appointment_date'];
        $appointment->appointment_time  = $request['appointment_time'];
        $appointment->message           = $request['message'];
        $appointment->status            = 'Pending';
        $appointment->customer_id       = auth()->user()->id;
        $appointment->save();

        $client     = Client::find($appointment->client_id);
        $user       = User::find($client->user_id);
        $customer   = auth()->user();

        // send email notification
        $message = $request['message'];
        $content = ['message' => $message];
        Mail::to($user->email)->send(new AppointmentMail($customer, $content, $client, $appointment));

        return redirect()->to('appointment')->with('success', 'Appointment has been sent.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!auth()->check()) {
            return redirect()->to('login');
        }
        $data['salons'] = Client::whereNotNull('name')->orderBy('name')->get();
        $data['service'] = Service::find($id);
        return view('site.appointment.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $client = Client::find($id);
        $service_id = $request['service_id'];
        $data['service'] = SalonService::where('service_id', $service_id)->where('client_id', $client->user_id)->first();

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
