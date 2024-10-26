@extends('layouts.site')
@section('content')
<div class="cart-area py-130 rpy-100">
    <div class="container-fluid">
        <div style="width: 90%; margin: 0 auto">
            <div class="row justify-content-end">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Ordered</th>
                            <th>Order Number</th>
                            <th>Products</th>
                            <th>Total Amount</th>
                            <th class="text-center">Proof of Payment</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order->created_date }}</td>
                            <td>{{ strtoupper($order->invoice_number) }}</td>
                            <td>
                                @foreach ($order->items as $item)
                                {{ $item->salonProduct->product->name ?? '' }} x {{ $item->quantity }} &mdash; {{ $item->item_price }}
                                @endforeach
                            </td>
                            <td>P{{ number_format($order->amount, 2) }}</td>
                            <td class="text-center">
                                @if (isset($order->proof_of_payment))
                                <a href="{{ $order->proof_of_payment }}" class="btn btn-outline-success btn-sm" target="_blank">View Payment</a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($order->payment_status != 'Paid')
                                <a href="{{ url('customer/orders', $order->id) }}/edit" class="btn btn-outline-primary btn-sm">Upload Payment</a>
                                @else
                                {{ $order->payment_status }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection