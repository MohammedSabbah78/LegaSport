<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Permission::class, 'permission');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->user()->can('Read-Permissions')) {
            $permissions = Permission::all();
            return response()->view('cms.spatie.permissions.index', ['permissions' => $permissions]);
        } else {
            return abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (auth('admin')->user()->can('Create-Permission')) {
            return response()->view('cms.spatie.permissions.create');
        } else {
            return abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:40',
            'guard_name' => 'required|string|in:admin,store'
        ]);
        if (!$validator->fails()) {
            $permission = new Permission();
            $permission->name = $request->get('name');
            $permission->guard_name = $request->get('guard_name');
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "Permission created successfully" : "Failed to create permission"], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        if (auth('admin')->user()->can('Update-Permission')) {
            $permission = Permission::findOrFail($id);
            return response()->view('cms.spatie.permissions.edit', ['permission' => $permission]);
        } else {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:40',
            'guard_name' => 'required|string|in:admin,store'
        ]);
        if (!$validator->fails()) {
            $permission =  Permission::findOrFail($id);
            $permission->name = $request->get('name');
            $permission->guard_name = $request->get('guard_name');
            $isSaved = $permission->save();
            return response()->json(['message' => $isSaved ? "Saved successfully" : "Failed to save"], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (auth('admin')->user()->can('Delete-Permission')) {
            $isDeleted = $permission->delete();
            return response()->json(['message' => __('cms.delete_success')], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return abort(401);
        }
    }
}
