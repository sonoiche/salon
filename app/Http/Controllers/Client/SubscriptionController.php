<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\DataTables\Client\SubscriptionDataTable;
use App\Http\Requests\Client\SubscriptionRequest;
use App\Mail\NotificationMail;
use Carbon\Carbon;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

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
        $basis   = config('app.basis');
        $user_id = auth()->user()->id;
        $subscription = new Subscription();
        $subscription->user_id              = $user_id;
        $subscription->amount               = $basis[$request['subscription_basis']]['amount'];
        $subscription->status               = 'Unpaid';
        $subscription->reference_number     = strtoupper(Str::random(10));
        $subscription->subscription_basis   = $request['subscription_basis'];

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

    public function show($id, Request $request)
    {
        $what = $request['what'];
        $subscription = Subscription::find($id);
        $basis = config('app.basis');

        switch ($what) {
            case 'paid':
                $subscription->status = 'Paid';
                $subscription->save();

                $user = User::find($subscription->user_id);
                $user->subscribe_until  = $basis[$subscription->subscription_basis]['expiry'];
                $user->subscription     = true;
                $user->save();

                $message  = 'Subscription has been updated.';
                $message2 = "We are happy to tell that your registration for a salon on our website has been approved.";
                
                Mail::to($user->email)->send(new NotificationMail($user, $message2));

                break;
            
            default:
                
                $subscription->status = 'Denied';
                $subscription->save();

                $user = User::find($subscription->user_id);
                $message = "We apologize to tell that the payment you send has been denied and not reflected on our account. Please pay correctly and upload your proof of payment.";
                
                Mail::to($user->email)->send(new NotificationMail($user, $message));
                $message = "Payment has been declined.";
                
                break;
        }

        return redirect()->back()->with('success', $message);
    }
}
