<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('permissions_access'), Response::HTTP_FORBIDDEN, 'Forbidden');
        \LogActivity::addToLog('Accessed Permission Index');
        $permissions = Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        \LogActivity::addToLog('Accessed Permission Create');
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());
        \LogActivity::addToLog('Just Created new Permission');
        return redirect()->route('admin.permissions.index')->with('status-success','New Permission Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        \LogActivity::addToLog('Accessed Permission Edit');
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        \LogActivity::addToLog('Updated Permission');
        return redirect()->route('admin.permissions.index')->with('status-success','Permission Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');
        \LogActivity::addToLog('Just deleted of the permission');
        $permission->delete();  

        return redirect()->back()->with('status-success','Permission Deleted');
    }
}
