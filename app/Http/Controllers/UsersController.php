<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function index()
    {
        if(Auth::check() && Auth::user()->is_admin == true){
            $data = [];
            $users = User::orderBy('created_at', 'desc')->get()->groupBy('name');
            $positions = User::POSITIONS;
            $data = [
                'users'=>$users,
                'positions'=>$positions,
            ];
            return view('users.index', $data);
        }else{
            return redirect('/');
        }
    }
    
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->is_admin == true){
            $data = [];
            $user = User::findOrFail($id);
            $positions = User::POSITIONS;
            $data = [
                'user'=>$user,
                'positions'=>$positions,
            ];
            return view('users.edit', $data);
        }else{
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        if(Auth::check() && Auth::user()->is_admin == true){
            $user = User::findOrFail($id);
            $myEmail = $user->email;
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->whereNot('email', $myEmail)],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'position' => ['required', 'string'],
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position' => $request->position,
                'is_admin' => $user->is_admin,
            ]);
            return redirect('users');
        }else{
            return redirect('/');
        }

    }
    
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->is_admin == true){
    
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('users');
        }else{
            return redirect('/');
        }
        
    }
}
