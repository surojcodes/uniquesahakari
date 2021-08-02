<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Gallery;
use App\Image;

class GalleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $galleries=Gallery::orderBy('created_at','DESC')->get();
        return view('admin.gallery.gallery')->with('galleries',$galleries);
    }
    public function store(Request $request)
    {
        $title=$request->title;
        Gallery::create([
            'title'=>$title,
            'slug'=>Str::slug($title),
        ]);
        return back()->with('info','Gallery Created Successfully!');
    }
    public function show($id)
    {
        $gallery=Gallery::where('slug',$id)->first();
        $images=$gallery->images;
        return view('admin.gallery.images')->with('images',$images)->with('gallery',$gallery);
    }
    public function update(Request $request, $id)
    {
        $gallery=Gallery::find($id);

        $gallery->title=$request->title;
        $gallery->slug=Str::slug($request->title);
        $gallery->save();

        return redirect()->route('gallery.index')->with('info','Gallery Info Updated Successfully!');
    }
    public function destroy($id)
    {
         $gallery = Gallery::find($id);
         $images=Image::where('gallery_id',$gallery->id)->get() ;
         foreach($images as $image){
            $imagename=$image->fetch_name;
            Storage::delete('public/images/'.$imagename);
            $image->delete();
         }
         $gallery->delete();
        return back()->with('info','Gallery Deleted Successfully!');
    }
    public function addImages(Request $request, $id){
        $gallery=Gallery::find($id);

        $files=$request->file('file');
    
        foreach($files as $file){
            $fullName=$file->getClientOriginalName();

            $name=explode('.',$fullName)[0];
            $extension =\File::extension($fullName);

            $nameToStore= $gallery->title.$name.time().'.'.$extension;

            $file->storeAs('public/images',$nameToStore);

            Image::create([
                'name'=>$nameToStore,
                'fetch_name'=>$nameToStore,
                'gallery_id'=>$id,
            ]);
        }
        return back()->with('info','Images Added Successfully!');
    }
}
