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
                <div class="table-responsive">
                    <div class="row gap-3 justify-content-between">
                        <div class="col-xl-7">
                            <div class="card custom-card shadow-none mb-0 border">
                                <div class="card-body">
                                    <form action="{{ url('admin/clients', $client->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-2">
                                            <div class="col-12 mb-2">
                                                <label for="company_name" class="form-label">Salon Name</label>
                                                <input type="text" name="name" class="form-control rounded-0" id="company_name" placeholder="Salon Name" value="{{ $client->name ?? '' }}" />
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label for="company_logo" class="form-label">Salon Logo</label>
                                                @if (isset($client->photo))
                                                <div class="input-group">
                                                    <input type="text" id="company_logo" class="form-control rounded-0" value="{{ basename($client->photo) }}" readonly />
                                                    <a href="javascript:;" onclick="removeLogo()" class="btn btn-outline-danger rounded-0">Remove</a>
                                                </div>
                                                @else
                                                <input type="file" name="photo" class="form-control rounded-0" id="company_logo" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label for="gcash_number" class="form-label">GCash Number</label>
                                                <input type="text" name="gcash_number" class="form-control rounded-0" id="gcash_number" placeholder="GCash Number" value="{{ $client->gcash_number ?? '' }}" />
                                            </div>
                                            <div class="col-6">
                                                <label for="contact_number" class="form-label">Contact Number</label>
                                                <input type="text" name="contact_number" class="form-control rounded-0" id="contact_number" placeholder="Contact Number" value="{{ $client->phone ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-xl-12 mb-2">
                                                <label for="complete_address" class="form-label">Complete Address</label>
                                                <input type="text" name="address" class="form-control rounded-0" id="complete_address" value="{{ $client->address ?? '' }}" />
                                            </div>
                                            <div class="col-xl-6 mb-2">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" name="city" class="form-control rounded-0" id="city" placeholder="City" value="{{ $client->city ?? '' }}" />
                                            </div>
                                            <div class="col-xl-6 mb-2">
                                                <label for="zip_code" class="form-label">Zip Code</label>
                                                <input type="number" name="zip_code" class="form-control rounded-0" id="zip_code" placeholder="Zip Code" value="{{ $client->zip_code ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection