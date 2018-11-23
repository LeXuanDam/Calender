<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;
use App\UserGenba;
use Illuminate\Support\Facades\Session;

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
        $users = User::with('group')->where('level', '<', 9)->orderBy('id', 'DESC')->get();
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
            'name' => $request->name
        );
        $response = \Httpful\Request::post($this->API_URL . '/user/register')
            ->addHeader('Access-Token', '')
            ->body(json_encode($entry))
            ->sendsJson()
            ->send();
        if ($response->body->code == 200) {
            return redirect('/user')->with('success', 'New user has been added');
        }
        return redirect('/user')->with('error', $response->body->message);
    }

    public function show($id)
    {
        try {
            $response = \Httpful\Request::get($this->API_URL . '/user/profile/' . $id)
                ->addHeader('Access-Token', Session::get('access_token'))
                ->sendsJson()
                ->send();
        } catch (Exception $e) {
            dd($e);
        }
        $user = $response->body->data;
        return view('users.show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = new \stdClass();
        $user->name = $request->name;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->address = ($request->address);
        $user->birthday = ($request->birthday);
        $user->email = ($request->email);
        if ($request->avatar != null) {
            $user->avatar = $request->avatar;
        }
        dd($user);
        $response = \Httpful\Request::put($this->API_URL . '/user/edit/3')
            ->addHeader('Access-Token', Session::get('access_token'))
            ->body(json_encode($user))
            ->sendsJson()
            ->send();

        dd($response);
        return redirect('/user')->with('success', 'user has been updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'user has been delete Successfully');
    }
}
