@extends('layouts.app', ['page_title' => 'Dashboard', 'header' => ''])
@section('content')
@if (auth()->user()->role == 'Client')
@include('widgets.dashboard.client')
@endif

@if (auth()->user()->role == 'Admin')
@include('widgets.dashboard.admin')
@endif

@if (auth()->user()->role == 'Customer')
@include('widgets.dashboard.customer')
@endif
@endsection
