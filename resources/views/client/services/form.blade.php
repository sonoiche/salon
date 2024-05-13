<div class="row gy-4 mb-4">
    <div class="col-xl-12">
        <label for="service_name" class="form-label">Service Name</label>
        <input type="text" name="service_name" id="service_name" class="form-control rounded-0" value="{{ $service->name ?? '' }}" />
    </div>
    <div class="col-xl-12">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" rows="4" class="form-control rounded-0" style="width: 100%; resize: none">{{ $service->description ?? '' }}</textarea>
    </div>
    <div class="col-xl-6">
        <label for="price" class="form-label">Service Price</label>
        <input type="number" name="price" class="form-control rounded-0" id="price" placeholder="Service Price" value="{{ $service->price ?? '' }}" />
    </div>
    <div class="col-xl-6">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select rounded-0">
            <option value="">--</option>
            <option value="Active" {{ (isset($service->status) && $service->status == 'Active') ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ (isset($service->status) && $service->status == 'Inactive') ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
</div>