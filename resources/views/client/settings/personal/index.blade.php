@extends('layouts.app', ['page_title' => $page_title, 'header' => $header])
@section('content')
<!-- Start::row-1 -->
<div class="row mb-5">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header d-sm-flex d-block">
                <ul class="nav nav-tabs nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                    <li class="nav-item m-1">
                        <a class="nav-link active" href="{{ url('client/settings/users') }}" aria-selected="true">Personal Information</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="{{ url('client/settings/account') }}" aria-selected="true">Account Settings</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="{{ url('client/settings/subscription') }}" aria-selected="true">Subscriptions</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link" href="{{ url('client/settings/company') }}" aria-selected="true">Salon</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    @include('client.settings.tabs.personal', ['active' => true])
                    @include('client.settings.tabs.account')
                    @include('client.settings.tabs.subscription')
                    @include('client.settings.tabs.company')
                </div>
            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Client\PersonalRequest') !!}
<script>
function removePhoto() {
    if(confirm('Are you sure you want to delete this photo?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('client/settings/users') }}/" + 0,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush