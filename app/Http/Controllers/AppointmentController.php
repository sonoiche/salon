<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        $date = $request['appointment_date'];
        $time = $request['appointment_time'];

        $startTime  = Carbon::createFromFormat('H:i', $time);
        $endTime    = $startTime->copy()->addHours(2);

        $appointmentCount = Appointment::where('appointment_date', $date)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('appointment_time', [$startTime->format('H:i'), $endTime->format('H:i')]);
            })
            ->count();

        if ($appointmentCount >= 3) {
            return redirect()->back()->with('error', 'Maximum number of appointments reached for this time slot.');
        }

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
    public function show(Request $request, string $id)
    {
        if(!auth()->check()) {
            return redirect()->to('login');
        }

        $salon_id = $request['salon_id'];

        $data['salon']      = Client::find($salon_id);
        $data['service']    = SalonService::with('service')->where('service_id', $id)->where('client_id', $salon_id)->first();

        return view('site.appointment.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $client = Client::find($id);
        $service_id = $request['service_id'];
        $data['service'] = SalonService::where('service_id', $service_id)->where('client_id', $client->id)->first();

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

    public function checkAvailableTime(Request $request)
    {
        $date = $request['appointment_date'];
        $salon_id = $request['salon_id'];
        $timeSlots = [
            [
                'name'  => '08:00AM - 10:00AM',
                'value' => '08:00'
            ],
            [
                'name'  => '10:00AM - 12:00PM',
                'value' => '10:00'
            ],
            [
                'name'  => '12:00PM - 02:00PM',
                'value' => '12:00'
            ],
            [
                'name'  => '02:00PM - 04:00PM',
                'value' => '14:00'
            ],
            [
                'name'  => '04:00PM - 06:00PM',
                'value' => '16:00'
            ],
            [
                'name'  => '06:00PM - 08:00PM',
                'value' => '18:00'
            ]
        ];

        $availableSlots = [];

        foreach ($timeSlots as $time) {
            // Calculate the start and end time for the 2-hour interval
            $startTime = Carbon::createFromFormat('H:i', $time['value']);
            $endTime = $startTime->copy()->addHours(2);

            // Count the number of existing appointments in this interval
            $appointmentCount = Appointment::where('appointment_date', $date)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('appointment_time', [$startTime->format('H:i'), $endTime->format('H:i')]);
                })
                ->where('client_id', $salon_id)
                ->count();

            // If the count is less than 3, add the time slot to available slots
            if ($appointmentCount < 3) {
                $availableSlots[] = $time;
            }
        }

        return response()->json(['available_time_slots' => $availableSlots]);
    }
}
