<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\DataTables\ClientDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientDataTable $dataTable)
    {
        $data['page_title'] = 'Clients';
        $data['header']     = 'Client Lists';
        return $dataTable->render('admin.clients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data['page_title'] = 'Clients';
        $data['header']     = 'Update Client';
        $data['client']     = Client::find($id);
        return view('admin.clients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photo      = NULL;
        $client     = Client::find($id);
        
        if(isset($request['photo']) && $request->has('photo')) {
            $file  = $request->file('photo');
            $photo = time().'.'.$file->getClientOriginalExtension();

            $path = Storage::disk('s3')->putFileAs(
                'salon/uploads/clients',
                $file,
                $photo,
                'public'
            );
            
            $photo = Storage::disk('s3')->url($path);
        }
        
        $client->name          = $request['name'];
        $client->address       = $request['address'];
        $client->city          = $request['city'];
        $client->zip_code      = $request['zip_code'];
        $client->phone         = $request['contact_number'];
        $client->gcash_number  = $request['gcash_number'];
        $client->photo         = $photo;
        $client->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
