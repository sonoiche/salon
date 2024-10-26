<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        $data['page_title'] = 'Products';
        $data['header']     = 'Product Lists';

        return $dataTable->render('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Products';
        $data['header']     = 'Create Product';

        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->user_id   = auth()->user()->id;
        $product->name      = $request['name'];
        $product->status    = 'Active';
        $product->save();

        return redirect()->to('admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page_title'] = 'Products';
        $data['header']     = 'Update Product';
        $data['product']    = Product::find($id);
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $product = Product::find($id);
        $product->name      = $request['name'];
        $product->status    = 'Active';
        $product->save();

        return redirect()->to('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(200);
    }
}
