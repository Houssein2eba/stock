<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        Auth::loginUsingId(2);
        $roles=User::with('roles')->find(2);
        $permissions=User::with('permissions')->find(2)->permissions->pluck('name');
        
        return response()->json($roles->roles[0]['name']);
    }
    
}
