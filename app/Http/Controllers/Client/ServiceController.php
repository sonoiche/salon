<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\SalonService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Client\ServiceDataTable;
use App\Http\Requests\Client\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(ServiceDataTable $dataTable)
    {
        $data['page_title'] = 'Services';
        $data['header']     = 'Service Lists';

        return $dataTable->render('client.services.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Services';
        $data['header']     = 'Add New Service';
        $data['services']   = Service::orderBy('name')->get();

        return view('client.services.create', $data);
    }

    public function store(ServiceRequest $request)
    {
        $user_id    = auth()->user()->id;
        $client     = Client::where('user_id', $user_id)->first();

        $service = new SalonService();
        $service->client_id     = $client->id;
        $service->service_id    = $request['service_id'];
        $service->price         = $request['price'];
        $service->status        = $request['status'];
        $service->description   = $request['description'];
        $service->save();

        return redirect()->to('client/services')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $data['page_title'] = 'Services';
        $data['header']     = 'Update Service';
        $data['service']    = SalonService::find($id);
        $data['services']   = Service::orderBy('name')->get();

        return view('client.services.edit', $data);
    }

    public function update(ServiceRequest $request, $id)
    {
        $service = SalonService::find($id);
        $service->service_id    = $request['service_id'];
        $service->price         = $request['price'];
        $service->status        = $request['status'];
        $service->description   = $request['description'];
        $service->save();

        return redirect()->back()->with('success', 'Service updated successfully.');
    }
}
