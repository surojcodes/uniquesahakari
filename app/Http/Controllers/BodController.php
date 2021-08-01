<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Bod;

class BodController extends Controller
{
    
    public function index()
    {
        $members=Bod::orderBy('created_at','DESC')->get();
        return view('admin.about.bod',compact('members'));
    }
    
    public function store(Request $request)
    {
        $data['name'] = request('name');
        $data['position'] = request('position');
        $data['text'] = request('text');
        $data['rank'] = request('rank');

        $data['image'] = 'no-image.jpg';
        if(request('image')){
            $image=$request->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->name).time().'.'.$extension;
            $image->storeAs('public/bod',$nameToStore);

            $data['image'] =$nameToStore;
        }
        Bod::create($data);
        return back()->with('success','Member Added !'); 
    }
   
    public function edit($id)
    {
        $member=Bod::find($id);
        return view('admin.about.editBod',compact('member'));
    }

   
    public function update(Request $request, $id)
    {
        $member=Bod::find($id);

        $data['name'] = request('name');
        $data['position'] = request('position');
        $data['text'] = request('text');
        $data['rank'] = request('rank');

        if(request('image')){
            Storage::delete('public/bod/'.$member->image);
            $image=$request->image;
            $extension =\File::extension($image->getClientOriginalName());
            $nameToStore = Str::slug($request->name).time().'.'.$extension;
            $image->storeAs('public/bod',$nameToStore);

            $data['image'] =$nameToStore;
        }
        $member->update($data);
        return redirect()->route('bod.index')->with('success','Member Updated !');
    }

    public function destroy($id)
    {
        $member=Bod::find($id);
        Storage::delete('public/bod/'.$member->image);
        $member->delete();
        return redirect()->route('bod.index')->with('success','Member Deleted !');
    }
}
