<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $permissions = Permission::create($request->all());
        return redirect()->route('permissions.index');
    }

    public function show($id)
    {
        $permissions = Permission::find($id);
        return view('admin.permissions.index');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $permissions = Permission::findOrFail($id)->delete();
        return redirect()->route('permissions.index');
    }
}
