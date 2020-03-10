<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
	public function show(){
		$users = User::all();
		return view('admin.showuser')->with('users',$users);;
	}
    public function add()
    {
    	return view('admin.adduser');
    }
    public function addit(Request $request)
    {
    	$valid =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($valid->fails()){
        	return redirect('/addusers')->with('error',$valid->messages()->first());
        }
    	$user = new User;
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = Hash::make($request->input('password'));
    	$user->role = 'user';
    	$user->save();
    	return redirect('/addusers')->with('status','User has been added');
    }
    public function delete(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/users')->with('status','User has been deleted');
    }
}
