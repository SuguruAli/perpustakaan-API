<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $tableUser = new User;
        $tableUser->username = $request->input('username');
        $tableUser->email = $request->input('email');
        $tableUser->password = $request->input('password');

    $tableUser->save();
    }
    public function index()
{
    $user = User::all();
    $response = [
        'status' => 'success',
        'data' => $user
    ];
    return response()->json($response);
}


}
