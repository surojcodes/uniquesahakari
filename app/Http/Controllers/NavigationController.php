<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Slider;
use App\Notice;
use App\Download;

class NavigationController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('created_at','desc')->get();
        $notice = Notice::where('set_front',1)->first();
        return view('pages.index',compact('sliders','notice'));
    }
    public function notices(){
        $notices = DB::table('notices')->orderBy('created_at', 'desc')->paginate(6);
        return view('pages.notices',compact('notices'));
    }
    public function notice($slug){
        $notice = Notice::where('slug',$slug)->first();
        return view('pages.notice',compact('notice'));
    }
    public function downloads(){
        $downloads = DB::table('downloads')->orderBy('created_at', 'desc')->paginate(6);
        return view('pages.downloads',compact('downloads'));
    }
    public function download($slug){
        $download = Download::where('slug',$slug)->first();
        return Storage::download('public/uploaded_files/'.$download->file);
    }
    public function onlineAccountForm(){
        return view('pages.onlineAccount');
    }
    public function loanForm(){
        return view('pages.loan');
    }
    public function abort(){
        abort(404);
    }
}
