<div class="row gy-4 mb-4">
    <div class="col-xl-12">
        <label for="service_id" class="form-label">Service Name</label>
        <select name="service_id" id="service_id" class="form-select">
            <option value="">Select Service</option>
            @foreach ($services as $item)
            <option value="{{ $item->id }}" {{ (isset($service->service_id) && $service->service_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
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