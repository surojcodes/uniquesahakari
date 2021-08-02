<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Image;

class ImagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function destroy($id)
    {
        $image=Image::find($id);

        $imagename=$image->fetch_name;
        Storage::delete('public/images/'.$imagename);

        $image->delete();
        return back()->with('info','Image Deleted Successfully!');
    }
}
