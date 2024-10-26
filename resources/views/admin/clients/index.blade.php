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
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script>
function removeClient(id) {
    if(confirm('Are you sure you want to delete this client?')) {
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/clients') }}/" + id,
            dataType: "json",
            success: function (response) {
                location.reload();
            }
        });
    }
}
</script>
@endpush