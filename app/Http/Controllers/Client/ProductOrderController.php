<?php

namespace App\Http\Controllers\Client;

use App\Models\ProductOrder;
use Illuminate\Http\Request;
use App\Models\ProductOrderItem;
use App\Http\Controllers\Controller;
use App\DataTables\Client\ProductOrderDataTable;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductOrderDataTable $dataTable)
    {
        $data['page_title'] = 'Orders';
        $data['header']     = 'Active Orders';

        return $dataTable->render('client.orders.index', $data);
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
        $data['order']      = $product_order = ProductOrderItem::with('salonProduct.product')->find($id);
        $order              = ProductOrder::find($product_order->order_id);
        $data['page_title'] = 'Product Order : ' . strtoupper($order->invoice_number);
        $data['header']     = 'Product Item ' . $product_order->salonProduct->product->name ?? '';

        return view('client.orders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = ProductOrder::find($id);
        $order->payment_status = $request['payment_status'];
        $order->save();

        return redirect()->to('client/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
