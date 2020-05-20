<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/dashboard');
    }

    public function users()
    {
        $users = User::orderBy('id', 'DESC')->get()->all();
        return view('admin/users')->with('users', $users);
    }

    public function status_update($status, $user)
    {
        User::where('id', $user)->update(['status'  =>  $status]);
        return redirect('admin/users')->withErrors('UPDATED !! User status is successfully updated');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('admin/users')->withErrors('DELETED !! User is successfully deleted');
    }

    public function change_password()
    {
        return view('admin/change_password');
    }

    public function change_password_do(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'old_pwd'   =>  'required',
            'new_pwd'   =>  'required|confirmed'
        ]);

        if (Hash::check($data['old_pwd'], \Auth::user()->password)) {
            User::where('id', \Auth::user()->id)
                        ->update(['password' => Hash::make($data['new_pwd'])]);

            return redirect()->back()->withErrors('SUCCESS !! Password is successfully changed');
        }else{
            return redirect()->back()->withErrors('ERROR !! Old password is not correct');
        }
    }


}
