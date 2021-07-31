<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Service;

class ServicesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function loanScheme(){
        $service = Service::where('slug','loan-scheme')->first();
        return view('admin.services.loanScheme',compact('service'));
    }
    public function mobileBanking(){
        $service = Service::where('slug','mobile-banking')->first();
        return view('admin.services.mobileBanking',compact('service'));
    }
    public function other(){
        $service = Service::where('slug','other')->first();
        return view('admin.services.other',compact('service'));
    }
    public function remittance(){
        $service = Service::where('slug','remittance')->first();
        return view('admin.services.remittance',compact('service'));
    }
    public function savingScheme(){
        $service = Service::where('slug','saving-scheme')->first();
        return view('admin.services.savingScheme',compact('service'));
    }
    public function smsBanking(){
        $service = Service::where('slug','sms-banking')->first();
        return view('admin.services.smsBanking',compact('service'));
    }

    // Update pages
    public function updateLoan(Request $req){
        $service = Service::where('slug','loan-scheme')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'loan-scheme-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','Loan scheme page updated !');
    }
    public function updateMobile(Request $req){
        $service = Service::where('slug','mobile-banking')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'mobile-banking-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','Mobile banking page updated !');
    }
    public function updateOther(Request $req){
        $service = Service::where('slug','other')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'other-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','Other Services page updated !');
    }
    public function updateRemittance(Request $req){
        $service = Service::where('slug','remittance')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'remittance-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','Remittance page updated !');
    }
    public function updateSaving(Request $req){
        $service = Service::where('slug','saving-scheme')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'saving-scheme-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','Saving scheme page updated !');
    }
    public function updateSms(Request $req){
        $service = Service::where('slug','sms-banking')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/services/'.$service->image);
            $service->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($service->image){
                Storage::delete('public/services/'.$service->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'sms-banking-'.time().'.'.$extension;
            $image->storeAs('public/services',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $service->update($data);
        return back()->with('success','SMS Banking page updated !');
    }
}
