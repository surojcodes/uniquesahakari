<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Download;

class DownloadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $downloads = Download::orderBy('created_at','desc')->get();
        return view('admin.download',compact('downloads'));
    }
    public function store(Request $request){
        $data['title'] = request('title');
        $data['slug'] = Str::slug($request->title).time();

        if(request('file')){
        $file=$request->file;
        $extension =\File::extension($file->getClientOriginalName());
        $nameToStore = Str::slug($request->title).time().'.'.$extension;
        $file->storeAs('public/uploaded_files',$nameToStore);

        $data['file'] =$nameToStore;
        }
        Download::create($data);
        return back()->with('success','Download Item Added !');
    }
   
    public function destroy($id){
        $download=Download::find($id);
        Storage::delete('public/uploaded_files/'.$download->file);
        $download->delete();
        return back()->with('success','Download Item Deleted !');
    }
}
