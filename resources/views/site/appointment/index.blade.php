@extends('layouts.site')
@section('content')
<div class="cart-area py-130 rpy-100">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h5>Appointment - {{ $service->service->name ?? '' }}</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('appointment') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="client_id" class="form-label" style="margin-top: 10px">Salon</label>
                                        <input type="text" id="client_id" class="form-control" value="{{ $salon->name }}" readonly />
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
                                        <select name="appointment_time" id="appointment_time" class="custom-select" style="height: 46px;">
                                            <option value="">Select Time</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="service_amount" class="form-label" style="margin-top: 10px">Service Price</label>
                                        <input type="text" id="service_amount" class="form-control" value="P{{ $service->price }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="contact_number" class="form-label" style="margin-top: 10px">Contact Number</label>
                                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ auth()->user()->contact_number }}" />
                                    </div>
                                </div>
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
                                    <input type="hidden" name="salon_id" id="salon_id" value="{{ $_GET['salon_id'] ?? '' }}" />
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
    $('#appointment_date').change(function() {
        var selectedDate = $(this).val();
        var salon_id = $('#salon_id').val();
        var timeSlotsSelect = $('#appointment_time');
        $.ajax({
            url: "{{ url('appointment/timeslot') }}",
            method: 'POST',
            data: {
                appointment_date: selectedDate,
                salon_id: salon_id
            },
            success: function(response) {
                var timeSlots = response.available_time_slots;
                
                timeSlotsSelect.empty();
                
                if (timeSlots.length > 0) {
                    timeSlotsSelect.append($('<option></option>').val('').text('Select Time'));
                    timeSlots.forEach(item => {
                        timeSlotsSelect.append($('<option></option>').val(item.value).text(item.name));
                    });
                } else {
                    timeSlotsSelect.append($('<option></option>').val('').text('No available Time'));
                }
            },
            error: function() {
                alert('Error fetching available time slots.');
            }
        });
    });
});
</script>
@endpush