<?php

namespace App\Http\Controllers\Customer;

use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CustomerUserController extends Controller
{
    public function dashboard()
    {
        $user_id = auth()->user()->id;
        $data['product_orders'] = ProductOrder::where('customer_id', $user_id)->get();
        return view('site.customer.dashboard', $data);
    }

    public function edit($id)
    {
        $data['order'] = ProductOrder::find($id);
        return view('site.customer.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $order = ProductOrder::find($id);
        if(isset($request['proof_of_payment']) && $request->has('proof_of_payment')) {
            $file               = $request->file('proof_of_payment');
            $proof_of_payment   = time().'.'.$file->getClientOriginalExtension();

            Storage::disk('s3')->put(
                'salon/uploads/orders/' . $proof_of_payment,
                file_get_contents($file),
                'public'
            );
            
            $order->proof_of_payment = Storage::disk('s3')->url('salon/uploads/orders/' . $proof_of_payment);
            $order->save();
        }

        return redirect()->to('customer/orders/' . $order->order_id);
    }
}
