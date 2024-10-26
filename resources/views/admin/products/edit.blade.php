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
                <form action="{{ url('admin/products', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.products.form')
                    <div class="row gy-4 mb-4">
                        <div class="col-6">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Admin\ProductRequest') !!}
@endpush