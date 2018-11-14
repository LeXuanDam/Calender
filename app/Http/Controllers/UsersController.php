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
            'phone_number'=>'required',
            'password'=> 'required'
        ]);
        $user = new Order([
            'phone_number' => $request->get('phone_number'),
            'password'=> bcrypt($request->get('password')),
            'display_name'=> $request->get('display_name'),
            'status' => 1
        ]);
        $user->save();
        return redirect('/users')->with('success', 'New user has been added');
    }

    public function show($id)
    {
        $user = User::with('group')->find($id);
        return view('users.show',['user' => $user]);
    }

    public function edit($id)
    {
        $user = Order::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Order::find($id);
        $user->display_name = $request->get('display_name');
        $user->save();

        return redirect('/users')->with('success', 'user has been updated');
    }

    public function destroy($id)
    {
        try {
            $param="{
            'user_id':$id
            }";
            $param = json_decode($param);
            $client = new Client();
            $res = $client->request('POST', 'http://159.65.135.188:9670/users/reverse', [
                'headers'=>[
                    'Access-Token'=>''
                ],
                'form_params' => $param
            ]);
        }catch (\Exception $e){
            dd($e);
        }
        dd($res);

        return redirect('/users')->with('success', 'user has been reverse Successfully');
    }
}
