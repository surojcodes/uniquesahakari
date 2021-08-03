<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function store(Request $request){
        $data =  $request->validate([
            'salutation'=>'required',
            'fullName'=>'required',
            'fatherName'=>'required',
            'motherName'=>'required',
            'grandfatherName'=>'required',
            'membershipNumber'=>'required',
            'loanAmount'=>'required',
            'loanAmountWords'=>'required',
            'repayTime'=>'required',
        ]);
        $data['spouseName'] = request('spouseName');
        $data['loanType'] = request('loanType');
        dd($data);
    }
}
