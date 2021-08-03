<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Account;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['store']]);
    }
    public function store(Request $request){
        // dd($request->all());
       $data =  $request->validate([
            'operation'=>'required',
            'saving_scheme'=>'required',
            'salutation'=>'required',
            'fullName'=>'required',
            'fatherName'=>'required',
            'motherName'=>'required',
            'grandfatherName'=>'required',
            'permanent_state'=>'required',
            'permanent_district'=>'required',
            'permanent_municipality'=>'required',
            'permanent_ward'=>'required',

            'temporary_state'=>'required',
            'temporary_district'=>'required',
            'temporary_municipality'=>'required',
            'temporary_ward'=>'required',

            'dob_year'=>'required',
            'dob_month'=>'required',
            'dob_day'=>'required',

            'citizen_passport'=>'required',
            'issued_place'=>'required',
            'marital_status'=>'required',
            'mobile'=>'required',

            'minor'=>'required',

            'mobile_banking'=>'required',
            'sms_banking'=>'required',

            'collection_service'=>'required',
            'citizen_passport_upload'=>'required',
        ]);

        if(request('saving_scheme')=='generalSaving'){
            $data['general_option'] = request('general_option');
        }else if(request('saving_scheme')=='fixedSaving'){
            $data['fixed_amount'] = request('fixed_amount');
            $data['fixed_duration'] = request('fixed_duration');
            $data['fixed_payment'] = request('fixed_payment');
        }else if(request('saving_scheme')=='regularSaving'){
            $data['regular_option'] = request('regular_option');
            $data['regular_amount'] = request('regular_amount');
            $data['regular_duration'] = request('regular_duration');
        }

        //optional fields
        $data['spouseName'] = request('spouseName');
        $data['permanent_tole'] = request('permanent_tole');
        $data['temporary_tole'] = request('temporary_tole');
        $data['nationality'] = request('nationality');
        $data['occupation'] = request('occupation');
        $data['office_number'] = request('office_number');
        $data['residence_number'] = request('residence_number');
        $data['email'] = request('email');

        if(request('minor')=='yes'){
            $data['guardian_name']=request('guardian_name');
            $data['guardian_relation']=request('guardian_relation');
            $data['guardian_year']=request('guardian_year');
            $data['guardian_month']=request('guardian_month');
            $data['guardian_day']=request('guardian_day');
            $data['guardian_citizen_passport']=request('guardian_citizen_passport');
        }

        if(request('collection_service')=='representer'){
            $data['collection_point']=request('collection_point');
            $data['collection_day']=request('collection_day');
        }

        $data['nominee_name'] = request('nominee_name');
        $data['nominee_relation'] = request('nominee_relation');
        $data['nominee_citizen_passport'] = request('nominee_citizen_passport');

        $data['introducer_name'] = request('introducer_name');
        $data['introducer_phone'] = request('introducer_phone');
        $data['introducer_account'] = request('introducer_account');

        //uploads
        //1. Applicant's Citizenship
        $applicant_citizen=$request->citizen_passport_upload;
        $extension =\File::extension($applicant_citizen->getClientOriginalName());
        $nameToStore = Str::slug($request->citizen_passport).time().'.'.$extension;
        $applicant_citizen->storeAs('public/citizenship_passport',$nameToStore);
        $data['citizen_passport_upload'] = $nameToStore;

        //2. Applicant's Photo
        $applicant_photo=$request->photo_upload;
        $extension =\File::extension($applicant_photo->getClientOriginalName());
        $nameToStore = Str::slug($request->fullName.'-photo-'.$request->citizen_passport).time().'.'.$extension;
        $applicant_photo->storeAs('public/applicant_photos',$nameToStore);
        $data['photo_upload'] = $nameToStore;

        //3. Applicant's Signature
        if(request('signature_upload')){
            $applicant_signature=$request->signature_upload;
            $extension =\File::extension($applicant_signature->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-signature-'.$request->citizen_passport).time().'.'.$extension;
            $applicant_signature->storeAs('public/applicant_signatures',$nameToStore);
            $data['signature_upload'] = $nameToStore;
        }

        //4. Joint Account Upload
        if(request('joint_upload')){
            $joint_upload=$request->joint_upload;
            $extension =\File::extension($joint_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-jointupload-'.$request->citizen_passport).time().'.'.$extension;
            $joint_upload->storeAs('public/joint_uploads',$nameToStore);
            $data['joint_upload'] = $nameToStore;
        }

         //5. Left thumb Upload
         if(request('left_thumb_upload')){
            $left_thumb_upload=$request->left_thumb_upload;
            $extension =\File::extension($left_thumb_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-left-thumb-'.$request->citizen_passport).time().'.'.$extension;
            $left_thumb_upload->storeAs('public/left_thumbs',$nameToStore);
            $data['left_thumb_upload'] = $nameToStore;
        }

         //6. Right thumb Upload
         if(request('right_thumb_upload')){
            $right_thumb_upload=$request->right_thumb_upload;
            $extension =\File::extension($right_thumb_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-right-thumb-'.$request->citizen_passport).time().'.'.$extension;
            $right_thumb_upload->storeAs('public/right_thumbs',$nameToStore);
            $data['right_thumb_upload'] = $nameToStore;
        }

        //7. Guardian Signature
        if(request('minor')=='yes'){
            if(request('guardian_signature')){
                $guardian_signature=$request->guardian_signature;
                $extension =\File::extension($guardian_signature->getClientOriginalName());
                $nameToStore = Str::slug($request->fullName.'-guardian-'.$request->citizen_passport).time().'.'.$extension;
                $guardian_signature->storeAs('public/guardian_signatures',$nameToStore);
                $data['guardian_signature'] = $nameToStore;
            }
        }
        $data['status']=0;
        $account = Account::create($data);
        $application_id = uniqid().'_'.$account->id;
        $account->update(['application_id'=>$application_id]);
        return back()->with('success','Account Request Sent! Your application id is '.$application_id.'. Please save this id !');
    }
    public function view($app_id){
        $application = Account::where('application_id',$app_id)->first();
        return view('admin.application',compact('application'));
    }
    public function edit($app_id){
        $application = Account::where('application_id',$app_id)->first();
        return view('admin.editApplication',compact('application'));
    }
    public function update($app_id,Request $request){
        $application = Account::where('application_id',$app_id)->first();
        $data =  $request->validate([
            'operation'=>'required',
            'saving_scheme'=>'required',
            'salutation'=>'required',
            'fullName'=>'required',
            'fatherName'=>'required',
            'motherName'=>'required',
            'grandfatherName'=>'required',
            'permanent_state'=>'required',
            'permanent_district'=>'required',
            'permanent_municipality'=>'required',
            'permanent_ward'=>'required',

            'temporary_state'=>'required',
            'temporary_district'=>'required',
            'temporary_municipality'=>'required',
            'temporary_ward'=>'required',

            'dob_year'=>'required',
            'dob_month'=>'required',
            'dob_day'=>'required',

            'citizen_passport'=>'required',
            'issued_place'=>'required',
            'marital_status'=>'required',
            'mobile'=>'required',

            'minor'=>'required',

            'mobile_banking'=>'required',
            'sms_banking'=>'required',

            'collection_service'=>'required',
        ]);

        if(request('saving_scheme')=='generalSaving'){
            $data['general_option'] = request('general_option');
        }else if(request('saving_scheme')=='fixedSaving'){
            $data['fixed_amount'] = request('fixed_amount');
            $data['fixed_duration'] = request('fixed_duration');
            $data['fixed_payment'] = request('fixed_payment');
        }else if(request('saving_scheme')=='regularSaving'){
            $data['regular_option'] = request('regular_option');
            $data['regular_amount'] = request('regular_amount');
            $data['regular_duration'] = request('regular_duration');
        }

        //optional fields
        $data['spouseName'] = request('spouseName');
        $data['permanent_tole'] = request('permanent_tole');
        $data['temporary_tole'] = request('temporary_tole');
        $data['nationality'] = request('nationality');
        $data['occupation'] = request('occupation');
        $data['office_number'] = request('office_number');
        $data['residence_number'] = request('residence_number');
        $data['email'] = request('email');

        if(request('minor')=='yes'){
            $data['guardian_name']=request('guardian_name');
            $data['guardian_relation']=request('guardian_relation');
            $data['guardian_year']=request('guardian_year');
            $data['guardian_month']=request('guardian_month');
            $data['guardian_day']=request('guardian_day');
            $data['guardian_citizen_passport']=request('guardian_citizen_passport');
        }

        if(request('collection_service')=='representer'){
            $data['collection_point']=request('collection_point');
            $data['collection_day']=request('collection_day');
        }

        $data['nominee_name'] = request('nominee_name');
        $data['nominee_relation'] = request('nominee_relation');
        $data['nominee_citizen_passport'] = request('nominee_citizen_passport');

        $data['introducer_name'] = request('introducer_name');
        $data['introducer_phone'] = request('introducer_phone');
        $data['introducer_account'] = request('introducer_account');

        //uploads
        //1. Applicant's Citizenship
        if($request->citizen_passport_upload){
            Storage::delete('public/citizenship_passport/'.$application->citizen_passport_upload);
            $applicant_citizen=$request->citizen_passport_upload;
            $extension =\File::extension($applicant_citizen->getClientOriginalName());
            $nameToStore = Str::slug($request->citizen_passport).time().'.'.$extension;
            $applicant_citizen->storeAs('public/citizenship_passport',$nameToStore);
            $data['citizen_passport_upload'] = $nameToStore;
        }

        //2. Applicant's Photo
        if($request->photo_upload){
            Storage::delete('public/applicant_photos/'.$application->photo_upload);
            $applicant_photo=$request->photo_upload;
            $extension =\File::extension($applicant_photo->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-photo-'.$request->citizen_passport).time().'.'.$extension;
            $applicant_photo->storeAs('public/applicant_photos',$nameToStore);
            $data['photo_upload'] = $nameToStore;
        }
        //3. Applicant's Signature
        if(request('signature_upload')){
            Storage::delete('public/applicant_signatures/'.$application->signature_upload);
            $applicant_signature=$request->signature_upload;
            $extension =\File::extension($applicant_signature->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-signature-'.$request->citizen_passport).time().'.'.$extension;
            $applicant_signature->storeAs('public/applicant_signatures',$nameToStore);
            $data['signature_upload'] = $nameToStore;
        }

        //4. Joint Account Upload
        if(request('joint_upload')){
            Storage::delete('public/joint_uploads/'.$application->joint_upload);
            $joint_upload=$request->joint_upload;
            $extension =\File::extension($joint_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-jointupload-'.$request->citizen_passport).time().'.'.$extension;
            $joint_upload->storeAs('public/joint_uploads',$nameToStore);
            $data['joint_upload'] = $nameToStore;
        }

         //5. Left thumb Upload
         if(request('left_thumb_upload')){
            Storage::delete('public/left_thumbs/'.$application->left_thumb_upload);
            $left_thumb_upload=$request->left_thumb_upload;
            $extension =\File::extension($left_thumb_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-left-thumb-'.$request->citizen_passport).time().'.'.$extension;
            $left_thumb_upload->storeAs('public/left_thumbs',$nameToStore);
            $data['left_thumb_upload'] = $nameToStore;
        }

         //6. Right thumb Upload
         if(request('right_thumb_upload')){
            Storage::delete('public/right_thumbs/'.$application->right_thumb_upload);
            $right_thumb_upload=$request->right_thumb_upload;
            $extension =\File::extension($right_thumb_upload->getClientOriginalName());
            $nameToStore = Str::slug($request->fullName.'-right-thumb-'.$request->citizen_passport).time().'.'.$extension;
            $right_thumb_upload->storeAs('public/right_thumbs',$nameToStore);
            $data['right_thumb_upload'] = $nameToStore;
        }

        //7. Guardian Signature
        if(request('minor')=='yes'){
            if(request('guardian_signature')){
                Storage::delete('public/guardian_signatures/'.$application->guardian_signature);
                $guardian_signature=$request->guardian_signature;
                $extension =\File::extension($guardian_signature->getClientOriginalName());
                $nameToStore = Str::slug($request->fullName.'-guardian-'.$request->citizen_passport).time().'.'.$extension;
                $guardian_signature->storeAs('public/guardian_signatures',$nameToStore);
                $data['guardian_signature'] = $nameToStore;
            }
        }
        $application->update($data);
        return redirect()->route('home')->with('success','Application updated!');
    }
    public function print($app_id){
        $application = Account::where('application_id',$app_id)->first();
        return view('admin.applicationPrint',compact('application'));
    }
    public function delete($id){
        $application = Account::find($id);
        Storage::delete('public/citizenship_passport/'.$application->citizen_passport_upload);
        Storage::delete('public/applicant_photos/'.$application->photo_upload);
        if($application->signature_upload){
            Storage::delete('public/applicant_signatures/'.$application->signature_upload);
        }
        if($application->joint_upload){
            Storage::delete('public/joint_uploads/'.$application->joint_upload);
        }
        if($application->left_thumb_upload){
            Storage::delete('public/left_thumbs/'.$application->left_thumb_upload);
        }
        if($application->right_thumb_upload){
            Storage::delete('public/right_thumbs/'.$application->right_thumb_upload);
        }
        if($application->guardian_signature){
            Storage::delete('public/guardian_signatures/'.$application->guardian_signature);
        }
        $application->delete();
        return back()->with('success','Account Application Deleted!');
    }
}