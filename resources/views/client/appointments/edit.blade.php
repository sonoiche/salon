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
                <form action="{{ url('client/appointments', $appointment->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Change Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Select Option</option>
                            <option value="Pending" {{ (isset($appointment->status) && $appointment->status == 'Pending') ? 'selected' : '' }}>Pending</option>
                            <option value="Accept" {{ (isset($appointment->status) && $appointment->status == 'Accept') ? 'selected' : '' }}>Accept</option>
                            <option value="Declined" {{ (isset($appointment->status) && $appointment->status == 'Declined') ? 'selected' : '' }}>Declined</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="schedule" class="form-label">Schedule</label>
                        <input type="datetime-local" name="schedule" id="schedule" class="form-control" value="{{ $appointment->schedule_input }}" min="{{ date('Y-m-d') }}" />
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