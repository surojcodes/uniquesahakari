<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class SettingsController extends Controller
{
    public function information(){
        $info = Information::first();
        return view('admin.information',compact('info'));
    }
    public function links(){

    }
    public function updateInformation(Request $req){
        $info = Information::first();

        $data['name']=$req->name;
        $data['address']=$req->address;
        $data['email']=$req->email;
        $data['phone']=$req->phone;
        $data['phone2']=$req->phone2;
        $data['phone3']=$req->phone3;
        $data['facebook']=$req->facebook;
        $data['twitter']=$req->twitter;
        $data['instagram']=$req->instagram;
        $data['linkedin']=$req->linkedin;
        
        $info->update($data);
        return back()->with('success','Information Updated!');
    }
    public function storeLinks(Request $req){
        
    }
    public function updateLinks(Request $req,$id){
        
    }
    public function deleteLinks($id){
        
    }
}
