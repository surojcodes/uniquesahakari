<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Slider;

class SliderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $sliders = Slider::orderBy('created_at','desc')->get();
        return view('admin.slider',compact('sliders'));
    }
    public function store(Request $request){
        $data['title'] = request('title');

        $image=$request->image;
        $extension =\File::extension($image->getClientOriginalName());
        $nameToStore = Str::slug($request->title).time().'.'.$extension;
        $image->storeAs('public/slider_images',$nameToStore);

        $data['image'] =$nameToStore;
        Slider::create($data);
        return back()->with('success','Slider Added !');
    }
    public function destroy($id){
        $slider=Slider::find($id);
        Storage::delete('public/slider_images/'.$slider->image);
        $slider->delete();
        return back()->with('success','Slider Deleted !');
    }
}
