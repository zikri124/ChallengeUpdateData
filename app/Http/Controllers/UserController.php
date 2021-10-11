<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll()
    {
        $data['status'] = 'Success';
        $data['data'] = User::all();
        return (new Response($data, 200))->header('Content-Type', 'application/json');
    }

    public function show($userId)
    {
        $data['status'] = 'Success';
        $data['data'] = User::where('id', $userId)->get();
        return (new Response($data, 200))->header('Content-Type', 'application/json');
    }

    public function update($userId, Request $request)
    {
        $isUpdate = User::where('id', $userId)
            ->update(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password')]);

        if ($isUpdate) {
            $data['status'] = 'Success';
            $data['message'] = 'Data Updated';
            $status = 201;
        } else {
            $data['status'] = 'Failed';
            $data['message'] = 'Internal server error';
            $status = 500;
        }

        return (new Response($data, $status))->header('Content-Type', 'application/json');
    }

    //
}
