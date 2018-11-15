<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::with('user')->orderBy('id','DESC')->get();
        return view('company.index', ['company' => $company->toJson()]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
            'phone'=> 'required',
            'director'=> 'required'
        ]);
        $company = new Company();
        $company->company_name = $request->get('company_name');
        $company->phone = $request->get('phone');
        $company->email = $request->get('email');
        $company->address = $request->get('address');
        $company->director = $request->get('director');
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
        $company->company_name = $request->get('company_name');
        $company->phone = $request->get('phone');
        $company->email = $request->get('email');
        $company->address = $request->get('address');
        $company->director = $request->get('director');
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
