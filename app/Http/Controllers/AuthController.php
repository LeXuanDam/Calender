<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $API_URL;
    public function __construct()
    {
        include('httpful.phar');
        $this->API_URL = '192.168.0.91/api';
    }
   public function login(Request $request){
        if($request->isMethod('get')) {
            if (Session::has('access_token') == true) {
                return redirect('/home');
            }
            else return view('auth.login');
        }
       $entry = array(
           'user_name' => $request->user_name,
           'password' => $request->password,
       );
       $response = \Httpful\Request::post( $this->API_URL.'/user/login')
           ->body(json_encode($entry))
           ->sendsJson()
           ->send();
       if($response->body->code == 200) {
            Session::put('access_token',$response->body->data->access_token);
            return redirect('/home');
       }
       return redirect('/');
   }
   public function home(){
        return view('home');
   }
   public function logout(){
        Session::flush();
       return redirect('/');
   }
}
