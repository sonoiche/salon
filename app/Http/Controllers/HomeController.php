<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ProductOrder;
use App\Models\SalonProduct;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role       = strtolower(auth()->user()->role);
        $user_id    = auth()->user()->id;
        switch ($role) {
            case 'admin':
                
                $data['users'] = User::select('users.*','subscriptions.status', 'subscriptions.proof_of_payment')
                    ->join('subscriptions','subscriptions.user_id','=','users.id')
                    ->where('role', 'Client')
                    ->where('subscriptions.status', 'Unpaid')
                    ->latest()->get();
                    
                $data['totalSales'] = Subscription::where('status','Paid')->sum('amount');
                $data['salonCount'] = Client::count();
                $data['customerCount']  = User::where('role','Customer')->count();
                $data['productCount']   = SalonProduct::count();

                break;

            case 'customer':
                
                $data['page_title'] = 'Customer';
                $data['header']     = '';
                $data['orders']     = ProductOrder::where('customer_id', $user_id)->latest()->get();

                break;

            case 'client':
            
                $data['page_title'] = 'Client';
                $data['header']     = '';
                $client             = Client::where('user_id', $user_id)->first();
                $data['orders']     = ProductOrder::where('client_id', $client->id)->latest()->get();
                $data['orderCount'] = ProductOrder::where('client_id', $client->id)->count();
                $data['totalSales'] = ProductOrder::where('client_id', $client->id)->where('payment_status', 'Paid')->sum('amount');
                $customer_ids       = ProductOrder::where('client_id', $client->id)->distinct()->pluck('customer_id');
                $data['customerCount'] = User::whereIn('id', $customer_ids)->count();
                $data['productCount']  = SalonProduct::where('client_id', $client->id)->count();
                $data['customers']  = User::whereIn('id', $customer_ids)->withCount('orders')->get();

                break;
            
            default:
                
                $data[] = '';

                break;
        }
        return view('home', $data);
    }
}
