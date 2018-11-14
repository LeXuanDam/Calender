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
            'name'=>'required',
            'phone'=> 'required'
        ]);
        $company = new Order([
            'phone' => $request->get('phone'),
            'name'=> $request->get('name'),
            'email' =>$request->get('email'),
        ]);
        $company->save();
        return redirect('/company')->with('success', 'New company has been added');
    }

    public function show($id)
    {
        $company = Company::with('user')->find($id);
        return view('company.show',['company' => $company]);
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->phone = $request->get('phone');
        $company->email = $request->get('email');

        $company->save();

        return redirect('/company')->with('success', 'company has been updated');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/company')->with('success', 'order has been reverse Successfully');
    }
}
