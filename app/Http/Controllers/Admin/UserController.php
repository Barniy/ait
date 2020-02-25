<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest, User $user)
    {

        $user->first_name = $userRequest->input('firstName');
        $user->middle_name = $userRequest->middleName;
        $user->last_name = $userRequest->lastName;
        $user->email = $userRequest->email;
        $user->password = Hash::make($userRequest->password);
        $user->save();
        $role = Role::find($userRequest->input('role.id'));
        $user->syncRoles($role->name);
        return response([
            'data' => 'User Created Successfully',
        ], Response::HTTP_CREATED);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->first_name = $request->input('firstName');
        $user->middle_name = $request->middleName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        return response([
            'data' => 'User Updated Successfully',
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response([
            'message' => 'User Removed Successfully'
        ]);
    }
}
