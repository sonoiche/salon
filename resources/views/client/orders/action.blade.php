@if ($order->payment_status != 'Paid')
<div class="btn-group">
    <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ url('client/orders', $order->id) }}/edit">Edit</a></li>
        <li><a class="dropdown-item" href="javascript:void(0);" onclick="removeProduct({{ $order->id }})">Delete</a></li>
    </ul>
</div>
@else
Paid
@endif