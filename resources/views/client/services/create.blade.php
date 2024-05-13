@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-7">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    {{ $header }}
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('client/services') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('client.services.form')
                    <div class="row gy-4 mb-4">
                        <div class="col-6">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Client\ServiceRequest') !!}
@endpush