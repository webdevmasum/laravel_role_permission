<?php

namespace App\Http\Controllers\RolePermission;

use session;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Controllers\Controller;
// use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->paginate(5);
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
        $permission = Permission::findOrFail($id);
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = validator::make($request->all(), [
            'name' => 'required|unique:permissions,name|max:255',
        ]);

        if ($validator->passes()) {

            $permission->name = $request->name;
            $permission->save();

            return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
        } else {
            return redirect()->route('permission.edit, $id')->withInput()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json(['success' => false, 'message' => 'Permission not found']);
        }

        $permission->delete();

        return response()->json(['success' => true, 'message' => 'Permission deleted successfully']);
    }
}
