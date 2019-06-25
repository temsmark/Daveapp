<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {$departments=Department::all();
        $users=User::all();
        return view('admin.dashboard',compact('users','departments'));
    }


}
