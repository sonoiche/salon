<?php

namespace App\Http\Controllers\Client;

use App\DataTables\Client\SubscriptionDataTable;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Client\SubscriptionRequest;

class SubscriptionController extends Controller
{
    public function index(SubscriptionDataTable $dataTable)
    {
        $data['page_title']     = 'Subscription';
        $data['header']         = 'List of Payments';
        $data['hasDatatable']   = true;
        return $dataTable->render('client.settings.subscription.index', $data);
    }

    public function store(SubscriptionRequest $request)
    {
        $user_id = auth()->user()->id;
        $subscription = new Subscription();
        $subscription->user_id          = $user_id;
        $subscription->amount           = 100.00;
        $subscription->status           = 'Unpaid';
        $subscription->reference_number = strtoupper(Str::random(10));

        if(isset($request['payment']) && $request->has('payment')) {
            $file    = $request->file('payment');
            $payment = time().'.'.$file->getClientOriginalExtension();

            $path = Storage::disk('s3')->putFileAs(
                'salon/uploads/subsciptions',
                $file,
                $payment,
                'public'
            );
            
            $subscription->proof_of_payment = Storage::disk('s3')->url($path);
        }

        $subscription->save();

        return redirect()->back()->with('success', 'Subscription successfully created.');
    }
}
