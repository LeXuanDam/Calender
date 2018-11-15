<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class GroupController extends Controller
{
    public function index()
    {
        $group = Group::with('user')->orderBy('id', 'DESC')->get();
        return view('group.index', ['group' => $group->toJson()]);
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $group = new Group([
            'name' => $request->get('name'),
            'author' => Auth::User()->id
        ]);
        $group->save();
        return redirect('/group')->with('success', 'New group has been added');
    }

    public function show($id)
    {
        $group = Group::with('user')->find($id);
        return view('group.show', ['group' => $group]);
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return view('group.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->name = $request->get('name');
        $group->save();

        return redirect('/group')->with('success', 'group has been updated');
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect('/group')->with('success', 'group has been delete Successfully');
    }
}
