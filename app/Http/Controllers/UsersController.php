<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('group')->where('level','<',9)->orderBy('id','DESC')->get();
        return view('users.index', ['users' => $users->toJson()]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone'=>'required',
            'password'=> 'required',
            'name'=>'required'
        ]);
        $user = new User([
            'phone_number' => $request->get('phone'),
            'password'=> bcrypt($request->get('password')),
            'name'=> $request->get('name'),
            'status' => 1,
        ]);
        $user->save();
        return redirect('/user')->with('success', 'New user has been added');
    }

    public function show($id)
    {
        $user = User::with('group')->find($id);
        return view('users.show',['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        if($request->password != null){
            $user->name = bcrypt($request->password);
        }
        if($request->address != null){
            $user->name = ($request->address);
        }
        if($request->birthday != null){
            $user->name = ($request->birthday);
        }
        if($request->gender != null){
            $user->name = ($request->gender);
        }
        $user->save();

        return redirect('/user')->with('success', 'user has been updated');
    }

    public function destroy($id)
    {
       $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'user has been delete Successfully');
    }
}
