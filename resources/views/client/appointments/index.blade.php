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
                <div class="{{ count($appointments) >= 5 ? 'table-responsive' : '' }}">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Contact Number</th>
                                <th>Service</th>
                                <th>Schedule</th>
                                <th>Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $key => $appointment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $appointment->customer->fullname ?? '' }}</td>
                                <td>{{ $appointment->contact_number }}</td>
                                <td>{{ $appointment->service->name ?? '' }}</td>
                                <td>{{ $appointment->schedule }}</td>
                                <td>{{ 'P' . number_format($appointment->amount, 2) }}</td>
                                <td class="text-center">
                                    @if($appointment->status === 'Pending')
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ url('client/appointments', $appointment->id) }}/edit">Edit</a></li>
                                                {{-- <li><a class="dropdown-item" href="javascript:void(0);" onclick="removeAppointment({{ $appointment->id }})">Delete</a></li> --}}
                                            </ul>
                                        </div>
                                    @else
                                    <div class="text-success">
                                        {{ $appointment->status }}
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No data available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection