<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\About;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function introduction(){
        $introduction = About::where('slug','introduction')->first();
        return view('admin.about.introduction',compact('introduction'));
    }
    public function membership(){
        $membership = About::where('slug','membership')->first();
        return view('admin.about.membership',compact('membership'));
    }
    public function mvo(){
        $mvo = About::where('slug','mvo')->first();
        return view('admin.about.mvo',compact('mvo'));
    }
    public function principle(){
        $principle = About::where('slug','principle')->first();
        return view('admin.about.principle',compact('principle'));
    }

    // Updates
    public function updateIntroduction(Request $req){
        $introduction = About::where('slug','introduction')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/about/'.$introduction->image);
            $introduction->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($introduction->image){
                Storage::delete('public/about/'.$introduction->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'intro-'.time().'.'.$extension;
            $image->storeAs('public/about',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $introduction->update($data);
        return back()->with('success','Introduction page Updated !');
    }
    public function updateMvo(Request $req){
        $mvo = About::where('slug','mvo')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/about/'.$mvo->image);
            $mvo->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($mvo->image){
                Storage::delete('public/about/'.$mvo->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'mvo-'.time().'.'.$extension;
            $image->storeAs('public/about',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $mvo->update($data);
        return back()->with('success','Mission, Vision, Objective page Updated !');
    }
    public function updateMembership(Request $req){
        $membership = About::where('slug','membership')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/about/'.$membership->image);
            $membership->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($membership->image){
                Storage::delete('public/about/'.$membership->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'membership-'.time().'.'.$extension;
            $image->storeAs('public/about',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $membership->update($data);
        return back()->with('success','Membership page Updated !');
    }
    public function updatePrinciple(Request $req){
         $principle = About::where('slug','principle')->first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/about/'.$principle->image);
            $principle->update([
                'image'=>null
            ]);
            return back()->with('success','Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($principle->image){
                Storage::delete('public/about/'.$principle->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = 'principle-'.time().'.'.$extension;
            $image->storeAs('public/about',$nameToStore);
            $data['image'] =$nameToStore;
        }
        $principle->update($data);
        return back()->with('success','Principle page Updated !');
    }
}