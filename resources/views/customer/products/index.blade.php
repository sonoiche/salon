@extends('layouts.app')
@section('content')
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
                <div class="{{ count($products) > 3 ? 'table-responsive' : '' }}">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Product Name</th>
                                <th>Salon</th>
                                <th>Quantity</th>
                                <th>Item Price</th>
                                <th>Proof of Payment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ $product->salonProduct->product->name ?? '' }}</td>
                                <td>{{ $product->client->name ?? '' }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->item_price }}</td>
                                <td>
                                    @if (isset($product->proof_of_payment))
                                    <a href="{{ $product->proof_of_payment }}" class="btn btn-outline-secondary" target="_blank">Download Proof</a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('customer/orders', $product->id) }}/edit">Upload Payment</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="removeProduct({{ $product->id }})">Cancel Order</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function removeProduct(id) {
    if(confirm('Are you sure you want to cancel this order?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('customer/orders') }}/" + id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush