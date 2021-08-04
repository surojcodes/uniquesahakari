<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use App\Link;

class SettingsController extends Controller
{
    public function information(){
        $info = Information::first();
        return view('admin.information',compact('info'));
    }
    public function links(){
        $links = Link::orderBy('created_at','DESC')->get();
        return view('admin.links',compact('links'));
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
    public function storeLink(Request $req){
        $data['title']=$req->title;
        $data['url']=$req->url;
        Link::create($data);
        return back()->with('success','Link Added!');
    }
    public function updateLink(Request $req,$id){
        $link = Link::find($id);
        $data['title']=$req->title;
        $data['url']=$req->url;
        $link->update($data);
        return back()->with('success','Link Updated!');
    }
    public function deleteLink($id){
        Link::find($id)->delete();
        return back()->with('success','Link Deleted!');

    }
}
