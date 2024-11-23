<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\SalonProduct;
use Illuminate\Http\Request;
use App\Models\SalonProductPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\DataTables\Client\ProductDataTable;
use App\Http\Requests\Client\ProductRequest;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        $data['page_title'] = 'Products';
        $data['header']     = 'Product Lists';

        return $dataTable->render('client.products.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Products';
        $data['header']     = 'Create Product';
        $data['products']   = Product::orderBy('name')->get();
        return view('client.products.create', $data);
    }

    public function store(ProductRequest $request)
    {
        $product_id = $request['product_id'];
        $user_id    = auth()->user()->id;

        $client     = Client::where('user_id', $user_id)->first();

        if (filter_var($product_id, FILTER_VALIDATE_INT)) {
            $salon_product = new SalonProduct();
            $salon_product->product_id  = $product_id;
            $salon_product->user_id     = $user_id;
            $salon_product->client_id   = $client->id;
            $salon_product->description = $request['description'];
            $salon_product->amount      = $request['amount'];
            $salon_product->quantity    = $request['quantity'];
            $salon_product->status      = ($request['quantity'] > 0) ? 'In Stock' : 'Out of Stock';
            $salon_product->product_sku = strtoupper(Str::random(10));
            $salon_product->save();
        } else {
            $product = new Product();
            $product->user_id       = $user_id;
            $product->name          = $request['product_id'];
            $product->status        = 'Active';
            $product->save();

            $product_id = $product->id;
            
            $salon_product = new SalonProduct();
            $salon_product->product_id  = $product_id;
            $salon_product->user_id     = $user_id;
            $salon_product->client_id   = $client->id;
            $salon_product->description = $request['description'];
            $salon_product->amount      = $request['amount'];
            $salon_product->quantity    = $request['quantity'];
            $salon_product->status      = ($request['quantity'] > 0) ? 'In Stock' : 'Out of Stock';
            $salon_product->product_sku = strtoupper(Str::random(10));
            $salon_product->save();
        }

        // Product Photos
        $photos = $request->file('photos');
        if($request->has('photos')) {
            foreach ($photos as $file) {
                $photo = time().'.'.$file->getClientOriginalExtension();

                Storage::disk('s3')->put(
                    'salon/uploads/products/' . $photo,
                    file_get_contents($file),
                    'public'
                );
                
                $product_photo = new SalonProductPhoto();
                $product_photo->salon_product_id = $salon_product->id;
                $product_photo->photo            =  Storage::disk('s3')->url('salon/uploads/products/' . $photo);
                $product_photo->save();
            }
        }

        return redirect()->to('client/products')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $data['page_title']     = 'Products';
        $data['header']         = 'Update Product';
        $data['products']       = Product::orderBy('name')->get();
        $data['salon_product']  = SalonProduct::find($id);

        return view('client.products.edit', $data);
    }

    public function update(ProductRequest $request, $id)
    {
        $product_id         = $request['product_id'];
        $salon_product_id   = $request['salon_product_id'];
        $user_id            = auth()->user()->id;

        if (filter_var($product_id, FILTER_VALIDATE_INT) && isset($salon_product_id)) {
            $salon_product = SalonProduct::find($id);
            $salon_product->description = $request['description'];
            $salon_product->amount      = $request['amount'];
            $salon_product->quantity    = $request['quantity'];
            $salon_product->status      = ($request['quantity'] > 0) ? 'In Stock' : 'Out of Stock';
            $salon_product->save();
        } else {
            $product = new Product();
            $product->user_id       = $user_id;
            $product->name          = $request['product_id'];
            $product->status        = 'Active';
            $product->save();

            $product_id = $product->id;
            
            $salon_product = SalonProduct::find($id);
            $salon_product->product_id  = $product_id;
            $salon_product->description = $request['description'];
            $salon_product->amount      = $request['amount'];
            $salon_product->quantity    = $request['quantity'];
            $salon_product->status      = ($request['quantity'] > 0) ? 'In Stock' : 'Out of Stock';
            $salon_product->save();
        }

        // Product Photos
        $photos = $request->file('photos');
        foreach ($photos as $file) {
            $photo = time().'.'.$file->getClientOriginalExtension();

            Storage::disk('s3')->put(
                'salon/uploads/products/' . $photo,
                file_get_contents($file),
                'public'
            );
            
            $product_photo = new SalonProductPhoto();
            $product_photo->salon_product_id = $salon_product->id;
            $product_photo->photo            =  Storage::disk('s3')->url('salon/uploads/products/' . $photo);
            $product_photo->save();
        }

        return redirect()->back()->with('success', 'Product udpated successfully');
    }

    public function destroy($id)
    {
        $salon_product = SalonProduct::find($id);

        // delete product photos
        $photos = SalonProductPhoto::where('salon_product_id', $salon_product->id)->get();
        foreach ($photos as $item) {
            $photoPath  = str_replace(config('filesystems.disks.s3.url'), '', $item->photo);
            Storage::disk('s3')->delete($photoPath);
            $item->delete();
        }
        
        // delete product
        $salon_product->delete();

        return response()->json(200);
    }
}
