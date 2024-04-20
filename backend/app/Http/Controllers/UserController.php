<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserModel::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:user_models,email',
            'confirmation_method' => 'required|string',
            'confirmation_code' => 'required|string'
        ]);

        $user = UserModel::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'confirmation_method' => $request->confirmation_method,
            'confirmation_code' => $request->confirmation_code
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        return response()->json($user);
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
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:user_models,email,' . $id,
        ]);

        $user = UserModel::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
