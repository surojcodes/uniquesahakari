<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $applications = Account::orderBy('created_at','desc')->get();
        return view('admin.applications',compact('applications'));
    }
}
