<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $adminData = User::where('id', Auth::id())->first();
        return view ('Users.Admin.adminIndex')->with(['adminData' => $adminData]);
    }
}
