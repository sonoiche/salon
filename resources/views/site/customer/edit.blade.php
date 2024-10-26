@extends('layouts.site')
@section('content')
<div class="cart-area py-130 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('customer/orders', $order->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="proof_of_payment" class="form-label">Proof of Payment</label>
                                <input type="file" class="form-control" name="proof_of_payment" id="proof_of_payment" />
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
    </div>
</div>
@endsection