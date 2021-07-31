<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Introduction;

class AboutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function bod(){
        return view('admin.about.bod');
    }
    public function introduction(){
        $introduction = Introduction::first();
        return view('admin.about.introduction',compact('introduction'));
    }
    public function membership(){
        return view('admin.about.membership');
    }
    public function mvo(){
        return view('admin.about.mvo');
    }
    public function principle(){
        return view('admin.about.principle');
    }

    // Updates
    public function updateBod(Request $req){

    }
    public function updateIntroduction(Request $req){
        
        $introduction = Introduction::first();
        if(key_exists('remove',$req->all())){
            Storage::delete('public/about/'.$introduction->image);
            $introduction->update([
                'image'=>null
            ]);
            return back()->with('success','Introduction Image Removed !');
        }
        $data['text'] = request('text');

        if(request('image')){
            if($introduction->image){
                Storage::delete('public/about/'.$introduction->image);
            }
            $image=$req->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($req->title).time().'.'.$extension;
            $image->storeAs('public/about',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $introduction->update($data);
        return back()->with('success','Introduction page Updated !');
    }
    public function updateMembership(Request $req){
        
    }
    public function updateMvo(Request $req){
        
    }
    public function updatePrinciple(Request $req){
        
    }

}