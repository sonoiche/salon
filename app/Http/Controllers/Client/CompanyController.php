<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Client\CompanyRequest;

class CompanyController extends Controller
{
    public function index()
    {
        $user_id            = auth()->user()->id;
        $data['page_title'] = 'Company';
        $data['header']     = 'Client Information';
        $data['salon']      = Client::where('user_id', $user_id)->first();
        return view('client.settings.company.index', $data);
    }

    public function store(CompanyRequest $request)
    {
        $user_id    = auth()->user()->id;
        $photo      = '';
        
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
        
        Client::updateOrCreate(
            ['user_id'  => $user_id],
            [
                'name'          => $request['name'],
                'address'       => $request['address'],
                'city'          => $request['city'],
                'zip_code'      => $request['zip_code'],
                'phone'         => $request['contact_number'],
                'gcash_number'  => $request['gcash_number'],
                'photo'         => $photo
            ]
        );

        return redirect()->to('client/settings/company');
    }

    public function destroy($id)
    {
        $user_id    = auth()->user()->id;
        $salon      = Client::where('user_id', $user_id)->first();

        $photoPath  = str_replace(config('filesystems.disks.s3.url'), '', $salon->photo);
        Storage::disk('s3')->delete($photoPath);
        $salon->photo = null;
        $salon->save();

        return response()->json(200);
    }
}
