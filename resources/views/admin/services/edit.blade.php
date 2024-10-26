@extends('layouts.app', ['page_title' => 'Update Service'])
@section('content')
<div class="row">
    <div class="col-xl-7">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Update Service
                </div>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/services', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.services.form')
                    <div class="row gy-4 mb-4">
                        <div class="col-6">
                            <input type="hidden" name="id" value="{{ $service->id }}" />
                            <button class="btn btn-primary" type="submit">Save Changes</button>
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