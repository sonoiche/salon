<?php

namespace App\Http\Controllers\Customer;

use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Models\ProductOrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $order              = ProductOrder::find($id);
        $data['page_title'] = 'Product Order : ' . strtoupper($order->invoice_number);
        $data['header']     = 'List of Product Items';
        $data['products']   = ProductOrderItem::where('order_id', $id)->latest()->get();

        return view('customer.products.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['order']      = $product_order = ProductOrderItem::with('salonProduct.product')->find($id);
        $order              = ProductOrder::find($product_order->order_id);
        $data['page_title'] = 'Product Order : ' . strtoupper($order->invoice_number);
        $data['header']     = 'Product Item ' . $product_order->salonProduct->product->name ?? '';

        return view('customer.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order              = ProductOrderItem::find($id);
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

        return redirect()->to('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
