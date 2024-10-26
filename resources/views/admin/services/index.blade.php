@extends('layouts.app', ['page_title' => 'List of Services'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between w-full">
                    <div class="d-flex align-items-center">
                        List of Services
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ url('admin/services/create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add New Service</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="{{ count($services) >= 5 ? 'table-responsive' : '' }}">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th>Date Created</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $key => $service)
                            <tr>
                                <td style="width: 3%">{{ $key+1 }}</td>
                                <td style="width: 50%">{{ $service->name }}</td>
                                <td style="width: 20%">{{ $service->created_date }}</td>
                                <td class="text-center" style="width: 10%">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ url('admin/services', $service->id) }}/edit">Edit</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="removeService({{ $service->id }})">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No data available</td>
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

@push('scripts')
<script>
function removeService(id) {
    if(confirm('Are you sure you want to delete this service?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/services') }}/" + id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush