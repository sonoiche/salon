@extends('layouts.site')
@section('content')
<div class="cart-area py-130 rpy-100">
    <div class="container-fluid">
        <div style="width: 80%; margin: 0 auto">
            <div class="row justify-content-end">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Schedule</th>
                            <th>Service</th>
                            <th>Salon</th>
                            <th>Total Amount</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $key => $appointment)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $appointment->schedule }}</td>
                            <td>{{ $appointment->service->name ?? '' }}</td>
                            <td>{{ $appointment->client->name ?? '' }}</td>
                            <td>{{ 'P' . number_format($appointment->amount, 2) }}</td>
                            <td class="text-center">{{ $appointment->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection