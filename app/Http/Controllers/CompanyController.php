<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::orderBy('id','DESC')->get();
        return view('company.index', ['company' => $company->toJson()]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number'=>'required',
            'password'=> 'required'
        ]);
        $order = new Order([
            'phone_number' => $request->get('phone_number'),
            'password'=> bcrypt($request->get('password')),
            'display_name'=> $request->get('display_name'),
            'status' => 1
        ]);
        $order->save();
        return redirect('/company')->with('success', 'New order has been added');
    }

    public function show($id)
    {
        $order = Order::with('client')->with('partner')->find($id);
        return view('company.show',['order' => $order]);
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('company.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->display_name = $request->get('display_name');
        $order->save();

        return redirect('/company')->with('success', 'order has been updated');
    }

    public function destroy($id)
    {
        try {
            $param="{
            'order_id':$id
            }";
            $param = json_decode($param);
            $client = new Client();
            $res = $client->request('POST', 'http://159.65.135.188:9670/company/reverse', [
                'headers'=>[
                    'Access-Token'=>''
                ],
                'form_params' => $param
            ]);
        }catch (\Exception $e){
            dd($e);
        }
        dd($res);

        return redirect('/company')->with('success', 'order has been reverse Successfully');
    }
}
