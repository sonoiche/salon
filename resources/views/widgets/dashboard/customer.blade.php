<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between w-full">
                    <div class="d-flex align-items-center">
                        {{ $header }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Order</th>
                                <th>Invoice Number</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $order->created_date }}</td>
                                <td>{{ strtoupper($order->invoice_number) }}</td>
                                <td>{{ number_format($order->amount, 2) }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td class="text-center">
                                    <a href="{{ url('customer/orders', $order->id) }}" class="btn btn-success btn-sm">View Product Items</a>
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>