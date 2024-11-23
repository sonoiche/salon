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
                <form action="{{ url('client/products', $salon_product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('client.products.form')
                    <div class="row gy-4 mb-4">
                        <div class="col-6">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </div>
                    <input type="hidden" name="salon_product_id" value="{{ $salon_product->id }}" />
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
<style>
#select2-product_name-container,
.select2-search__field {
    border-radius: 0px !important;
}
</style>
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Client\ProductRequest') !!}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $("#product_name").select2({
        dir: "ltr",
        placeholder: "Select Product",
        tags: true
    });
});
</script>
@endpush