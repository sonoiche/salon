<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Client\PersonalRequest;

class UserController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Personal';
        $data['header']     = 'Personal Information';
        return view('client.settings.personal.index', $data);
    }

    public function store(PersonalRequest $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->fname            = $request['fname'];
        $user->lname            = $request['lname'];
        $user->mname            = $request['mname'];
        $user->contact_number   = $request['contact_number'];
        $user->birthdate        = $request['birthdate'];
        $user->address          = $request['address'];
        $user->city             = $request['city'];
        $user->zip_code         = $request['zip_code'];

        if(isset($request['photo']) && $request->has('photo')) {
            $file  = $request->file('photo');
            $photo = time().'.'.$file->getClientOriginalExtension();

            $path = Storage::disk('s3')->putFileAs(
                'salon/uploads/users',
                $file,
                $photo,
                'public'
            );
            
            $user->photo = Storage::disk('s3')->url($path);
        }

        $user->save();

        return redirect()->back()->with('success', 'Personal Information Updated Successfully');
    }

    public function destroy($id)
    {
        $user_id = auth()->user()->id;
        $user    = User::find($user_id);

        if (!is_null($user->photo)) {
            $photoPath = str_replace(config('filesystems.disks.s3.url'), '', $user->photo);
            Storage::disk('s3')->delete($photoPath);
            $user->photo = null;
            $user->save();

            return response()->json(200);
        }
    }
}
