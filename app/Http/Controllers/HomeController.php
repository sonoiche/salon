<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\ProductOrder;
use App\Models\SalonProduct;
use App\Models\Subscription;

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
        $month_now  = date('m');
        $year_now   = date('Y');
        $role       = strtolower(auth()->user()->role);
        $user_id    = auth()->user()->id;
        switch ($role) {
            case 'admin':
                
                $data['users'] = User::select('users.*','subscriptions.status', 'subscriptions.proof_of_payment')
                    ->join('subscriptions','subscriptions.user_id','=','users.id')
                    ->where('role', 'Client')
                    ->where('subscriptions.status', 'Unpaid')
                    ->latest()->get();
                    
                $data['totalSales'] = Subscription::where('status','Paid')->whereMonth('created_at', $month_now)->whereYear('created_at', $year_now)->sum('amount');
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
                $productSale        = 0;
                $serviceSale        = 0;

                if(isset($client->id)) {
                    $productSale    = ProductOrder::where('client_id', $client->id)->where('payment_status', 'Paid')->whereMonth('created_at', $month_now)->whereYear('created_at', $year_now)->sum('amount');
                    $serviceSale    = Appointment::where('client_id', $client->id)->where('status', 'Accept')->whereMonth('appointment_date', $month_now)->whereYear('created_at', $year_now)->sum('amount');
                }
                
                $monthlySale        = $productSale + $serviceSale;

                $data['orders']     = isset($client->id) ? ProductOrder::where('client_id', $client->id)->latest()->get() : [];
                $data['orderCount'] = isset($client->id) ? ProductOrder::where('client_id', $client->id)->count() : 0;
                $data['totalSales'] = isset($client->id) ? $monthlySale : '0.00';
                $customer_ids       = isset($client->id) ? ProductOrder::where('client_id', $client->id)->distinct()->pluck('customer_id') : [];
                $data['customerCount'] = User::whereIn('id', $customer_ids)->count();
                $data['productCount']  = isset($client->id) ? SalonProduct::where('client_id', $client->id)->count() : 0;
                $data['customers']  = User::whereIn('id', $customer_ids)->withCount('orders')->get();

                break;
            
            default:
                
                $data[] = '';

                break;
        }
        return view('home', $data);
    }
}
