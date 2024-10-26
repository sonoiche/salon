@extends('layouts.app', ['page_title' => 'List of Users'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between w-full">
                    <div class="d-flex align-items-center">
                        List of Users
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="{{ count($users) >= 5 ? 'table-responsive' : '' }}">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Created</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                            <tr>
                                <td style="width: 3%">{{ $key+1 }}</td>
                                <td style="width: 20%">{{ $user->created_date }}</td>
                                <td style="width: 20%">{{ $user->fullname }}</td>
                                <td style="width: 20%">{{ $user->email }}</td>
                                <td style="width: 20%">{{ $user->role }}</td>
                                <td class="text-center" style="width: 10%">
                                    <a class="btn btn-outline-danger btn-sm" href="javascript:;" onclick="removeUser({{ $user->id }})">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
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
function removeUser(id) {
    if(confirm('Are you sure you want to delete this user?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/users') }}/" + id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush