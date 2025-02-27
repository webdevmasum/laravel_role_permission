<?php

namespace App\Http\Controllers\RolePermission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Models\Permission;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required|unique:permissions,name|max:255',
        ]);

        if ($validator->passes()) {

            Permission::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            return redirect()->route('permission.index')->with('success', 'Permission created successfully');
        } else {
            return redirect()->route('permission.create')->withInput()->withErrors($validator);
        }
    }


    /* public function makeandstore(Request $request){
        $validator = validator ::make($request->all(), [
            'name' => 'required|unique:permissions,name|max:255',
        ]);

        if ($validator->passes()){

            Permission::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            return redirect()->route('permission.index')->with('success', 'Permission created successfully');
        }else{
            return redirect()->route('permisson.create')->withInput()->withErrors($validator);
        }
    } */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
