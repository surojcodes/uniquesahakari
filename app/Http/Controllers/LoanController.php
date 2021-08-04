<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class LoanController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['store']]);
    }
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

        $loan = Loan::create($data);
        $loan_id = uniqid().'_'.$loan->id;
        $loan->update(['loan_id'=>$loan_id]);

        return back()->with('success','Loan Request Sent! Your loan request id is '.$loan_id.'. Please save this id !');
    }
    public function viewLoans(){
        $loans = Loan::orderBy('created_at','DESC')->get();
        return view('admin.loans',compact('loans'));
    }
    public function view($loan_id){
        $loan = Loan::where('loan_id',$loan_id)->first();
        return view('admin.loan',compact('loan'));
    }
    public function print($loan_id){
        $loan = Loan::where('loan_id',$loan_id)->first();
        return view('admin.loanPrint',compact('loan'));
    }
    public function delete($id){
        Loan::find($id)->delete();
        return back()->with('success','Loan Application Deleted!');
    }
}
