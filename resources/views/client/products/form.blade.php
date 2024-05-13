<div class="row gy-4 mb-4">
    <div class="col-xl-12">
        <label for="product_name" class="form-label">Product Name</label>
        <select name="product_id" class="js-example-basic-single rounded-0" id="product_name">
            <option value=""></option>
            @foreach ($products as $item)
            <option value="{{ $item->id }}" {{ (isset($salon_product->product_id) && $salon_product->product_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-xl-12">
        <label for="description" class="form-label">Product Description</label>
        <textarea name="description" id="description" rows="4" class="form-control rounded-0" style="width: 100%; resize: none">{{ $salon_product->description ?? '' }}</textarea>
    </div>
    <div class="col-xl-6">
        <label for="amount" class="form-label">Product Price</label>
        <input type="number" name="amount" class="form-control rounded-0" id="amount" placeholder="Product Price" value="{{ $salon_product->amount ?? '' }}" />
    </div>
    <div class="col-xl-6">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select rounded-0">
            <option value="">--</option>
            <option value="In Stock" {{ (isset($salon_product->status) && $salon_product->status == 'In Stock') ? 'selected' : '' }}>In Stock</option>
            <option value="Out of Stock" {{ (isset($salon_product->status) && $salon_product->status == 'Out of Stock') ? 'selected' : '' }}>Out of Stock</option>
        </select>
    </div>
    <div class="col-xl-6">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control rounded-0" id="quantity" placeholder="Product Price" value="{{ $salon_product->quantity ?? '' }}" />
    </div>
    <div class="col-xl-6">
        <label for="photos" class="form-label">Product Photos</label>
        <input type="file" name="photos[]" class="form-control rounded-0" id="photos" multiple />
    </div>
</div>