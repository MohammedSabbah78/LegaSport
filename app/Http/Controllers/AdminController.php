<?php

namespace App\Http\Controllers;

use App\Mail\AdminSendNewPasswordEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::get();
        return response()->view('cms.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name', 'admin')->get();
        return response()->view('cms.admins.create', ['roles' => $roles]);
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
            'role_id' => 'required|integer|exists:roles,id',
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|min:3|unique:admins,user_name',
            'email' => 'required|string|email|unique:admins,email',
            'active' => 'required|boolean',
            'image' => 'required|image|mimes:jpg,png',

        ]);

        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->name = $request->get('name');
            $admin->user_name = $request->get('user_name');
            $admin->email = $request->get('email');
            $randomPassword = Str::random(10);

            $admin->password = Hash::make($randomPassword);
            $admin->active = $request->get('active');
            if ($request->hasFile('image')) {
                $imageName = time() . '_' . str_replace(' ', '', $admin->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('admins', $imageName, ['disk' => 'public']);
                $admin->image = 'admins/' . $imageName;
            }
            $isSaved = $admin->save();

            if ($isSaved) {
                $admin->assignRole(Role::findById($request->get('role_id')));
                Mail::to($admin)->send(new AdminSendNewPasswordEmail($admin, $randomPassword));
            }
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::where('guard_name', 'admin')->get();
        $role = $admin->roles()->first();
        return response()->view('cms.admins.edit', ['admin' => $admin, 'roles' => $roles, 'assignedRole' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $validator = Validator($request->all(), [
            'role_id' => 'required|integer|exists:roles,id',
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|min:3|unique:admins,user_name,' . $admin->id,
            'email' => 'required|string|email|unique:admins,email,' . $admin->id,
            'active' => 'required|boolean',
            'image' => 'nullable', 'image|mimes:jpg,png',

        ]);

        if (!$validator->fails()) {
            $admin->name = $request->input('name');
            $admin->user_name = $request->input('user_name');
            $admin->email = $request->input('email');
            $admin->active = $request->input('active');
            $admin->syncRoles(Role::findById($request->get('role_id')));
            if ($request->hasFile('image')) {
                Storage::delete($admin->image);
                $imageName = time() . '_' . str_replace(' ', '', $admin->name) . '.' . $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('admins', $imageName, ['disk' => 'public']);
                $admin->image = 'admins/' . $imageName;
            }
            $isSaved = $admin->save();
            return response()->json(['message' => $isSaved ?  __('cms.create_success') : __('cms.create_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $isDeleted = $admin->delete();
        if ($isDeleted) {
            Storage::delete($admin->image);
        }
        return response()->json(['message' => __('cms.delete_success')], $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
