<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AccountRequest;

class AccountController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Account';
        $data['header']     = 'Account Information';
        return view('client.settings.account.index', $data);
    }

    public function store(AccountRequest $request)
    {
        $user_id        = auth()->user()->id;
        $user           = User::find($user_id);
        $user->email    = $request['email'];
        if(isset($request['password'])) {
            $user->password = bcrypt($request['password']);
        }
        $user->save();

        return redirect()->back()->with('success', 'Account information updated successfully');
    }
}
