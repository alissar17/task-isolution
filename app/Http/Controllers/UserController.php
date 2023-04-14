<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    
    public function addUser(Request $request)
    {
        
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required'
        ]);
        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

   
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

  
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

      
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone_number' => 'required'
        ]);

        $user->update($validatedData);
        return response()->json($user, 200);
    }


}
