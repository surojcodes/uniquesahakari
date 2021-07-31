<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function loanScheme(){
        return view('admin.services.loanScheme');
    }
    public function mobileBanking(){
        return view('admin.services.mobileBanking');
    }
    public function other(){
        return view('admin.services.other');
    }
    public function remittance(){
        return view('admin.services.remittance');
    }
    public function savingScheme(){
        return view('admin.services.savingScheme');
    }
    public function smsBanking(){
        return view('admin.services.smsBanking');
    }
}
