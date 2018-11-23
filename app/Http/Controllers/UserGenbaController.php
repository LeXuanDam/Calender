<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    protected $API_URL;
    public function __construct()
    {
        include('httpful.phar');
        $this->API_URL = '192.168.0.91/api';
    }
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
        $entry = array(
            'phone' => $request->phone,
            'password' => $request->password,
            'name'=>$request->name
        );
        $response = \Httpful\Request::post( $this->API_URL.'/user/register')
            ->addHeader('Access-Token', '')
            ->body(json_encode($entry))
            ->sendsJson()
            ->send();
        if($response->body->code == 200){
            return redirect('/user')->with('success', 'New user has been added');
        }
        return redirect('/user')->with('error', $response->body->message);
    }

    public function show($id)
    {
        $response = \Httpful\Request::get( $this->API_URL.'/user/profile/'.$id)
            ->addHeader('Access-Token', '')
            ->body(json_encode($entry))
            ->sendsJson()
            ->send();
        return view('users.show',['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }
        if($request->address != null){
            $user->address = ($request->address);
        }
        if($request->birthday != null){
            $user->birthday = ($request->birthday);
        }
        if($request->email != null){
            $user->email = ($request->email);
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
