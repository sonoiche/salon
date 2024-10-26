@extends('layouts.app', ['page_title' => 'Add New Service'])
@section('content')
<div class="row">
    <div class="col-xl-7">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Add New Service
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/services') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.services.form')
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
{!! JsValidator::formRequest('App\Http\Requests\Admin\ServiceRequest') !!}
@endpush