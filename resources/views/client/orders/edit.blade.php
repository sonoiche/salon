@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between w-full">
                    <div class="d-flex align-items-center">
                        {{ $header }}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('client/orders', $order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="payment_status" class="form-label">Change Status</label>
                        <select name="payment_status" id="payment_status" class="form-select">
                            <option value="">Select Option</option>
                            <option value="Paid">Paid</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-group">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection