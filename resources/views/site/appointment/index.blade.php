@extends('layouts.site')
@section('content')
<div class="cart-area py-130 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h5>Appointment - {{ $service->name }}</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('appointment') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="client_id" class="form-label" style="margin-top: 10px">Salon</label>
                                        <select name="client_id" id="client_id" class="form-select">
                                            <option value="">Select Salon</option>
                                            @foreach ($salons as $salon)
                                            <option value="{{ $salon->id }}" {{ (isset($_GET['salon_id']) && $_GET['salon_id'] == $salon->id) ? 'selected' : '' }}>{{ $salon->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="appointment_date" class="form-label" style="margin-top: 10px">Date</label>
                                        <input type="date" name="appointment_date" id="appointment_date" class="form-control" min="{{ date('Y-m-d') }}" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="appointment_time" class="form-label" style="margin-top: 10px">Time</label>
                                        <input type="time" name="appointment_time" id="appointment_time" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 id="service-amount">P0.00</h4>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="contact_number" class="form-label" style="margin-top: 10px">Contact Number</label>
                                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ auth()->user()->contact_number }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="message" class="form-label" style="margin-top: 10px">Message</label>
                                        <textarea name="message" id="message" rows="5" style="resize: none; width: 100%" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="form-group">
                                    <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}" />
                                    <input type="hidden" name="amount" id="amount" />
                                    <button class="btn btn-primary" type="submit">Send Appointment</button>
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

@section('css')
<style>
.form-select {
    padding: 10px 12px;
    font-size: 16px;
}
.form-control {
    padding: 9px 12px;
    font-size: 16px;
}
</style>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    var service_id = $('#service_id').val();
    $('#client_id').change(function () { 
        var client_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ url('appointment') }}/" +client_id+ "/edit?service_id=" + service_id,
            dataType: "json",
            success: function (response) {
                $('#service-amount').text(response.service.price);
                $('#amount').val(response.service.price);
            }
        });
    });
});
</script>
@endpush