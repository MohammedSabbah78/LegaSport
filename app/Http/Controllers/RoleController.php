<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{

    public function __construct()
    {
        // $this->authorizeResource(Role::class, 'role');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth('admin')->user()->can('Read-Roles')) {
            $roles = Role::withCount('permissions')->get();
            return response()->view('cms.spatie.roles.index', ['roles' => $roles]);
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

        if (auth('admin')->user()->can('Create-Role')) {
            return response()->view('cms.spatie.roles.create');
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
            'guard_name' => 'required|string|in:user-api,specialist-api,specialist,admin',
        ]);

        if (!$validator->fails()) {
            $role = new Role();
            $role->name = $request->input('name');
            $role->guard_name = $request->input('guard_name');
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
        if (auth('admin')->user()->can('Update-Role')) {
            $role = Role::findOrFail($id);
            return response()->view('cms.spatie.roles.edit', ['role' => $role]);
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
            // 'guard_name' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $role = Role::findOrFail($id);
            $role->name = $request->get('name');
            // $role->guard_name = 'admin';
            $isSaved = $role->save();
            return response()->json(['message' => $isSaved ? __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function destroy(Role $role)
    {
        if (auth('admin')->user()->can('Delete-Role')) {
            $isDeleted = $role->delete();
            return response()->json(['message' => __('cms.delete_success')], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => __('cms.delete_failed')], Response::HTTP_BAD_REQUEST);
        }
    }
}
