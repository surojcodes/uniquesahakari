<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Notice;

class NoticeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $notices = Notice::orderBy('created_at','desc')->get();
        return view('admin.notice',compact('notices'));
    }
    public function store(Request $request){
        $data['title'] = request('title');
        $data['detail'] = request('description');
        $data['slug'] = Str::slug($request->title).time();

        $data['image'] = 'no-image.png';
        if(request('image')){
        $image=$request->image;
        $extension =\File::extension($image->getClientOriginalName());
        $nameToStore = Str::slug($request->title).time().'.'.$extension;
        $image->storeAs('public/notice_images',$nameToStore);

        $data['image'] =$nameToStore;
        }
        Notice::create($data);
        return back()->with('success','Notice Added !');
    }
    public function edit($slug){
        $notice=Notice::where('slug',$slug)->first();
        return view('admin.editnotice',compact('notice'));
    }

    public function update(Request $request,$slug){
        $notice=Notice::where('slug',$slug)->first();

        $data['title'] = request('title');
        $data['detail'] = request('description');
        $data['slug'] = Str::slug($request->title).time();

        if(request('image')){
            Storage::delete('public/notice_images/'.$notice->image);
            $image=$request->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->title).time().'.'.$extension;
            $image->storeAs('public/notice_images',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $notice->update($data);
        return redirect()->route('notices.index')->with('success','Notice Updated !');
    }
    public function destroy($id){
        $notice=Notice::find($id);
        Storage::delete('public/notice_images/'.$notice->image);
        $notice->delete();
        return back()->with('success','Notice Deleted !');
    }
    public function setFront($slug){
        $notice=Notice::where('slug',$slug)->first();
        $notice->update([
            'set_front'=>1
        ]);
        $notices = Notice::all();
        foreach($notices as $n){
            if($n->id!=$notice->id){
                $n->update([
                    'set_front'=>0
                ]);
            }
        }
        return back()->with('success','Notice set as front!');
    }
    public function removeFront($slug){
        $notice=Notice::where('slug',$slug)->first();
        $notice->update([
            'set_front'=>0
        ]);
        return back()->with('success','Notice set as front!');
    }
}
