<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Slider;
use App\Notice;
use App\Download;
use App\About;
use App\Service;

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
    public function contact(){
        return view('pages.contact');
    }
    public function gallery(){
        return view('pages.gallery');
    }
    
    // About
    public function bod(){
        return view('pages.about.bod');
    }
    public function introduction(){
        $introduction = About::where('slug','introduction')->first();
        return view('pages.about.introduction',compact('introduction'));
    }
     public function membership(){
        $membership = About::where('slug','membership')->first();
        return view('pages.about.membership',compact('membership'));
    }
     public function mvo(){
        $mvo =About::where('slug','mvo')->first();
        return view('pages.about.mvo',compact('mvo'));
    }
     public function principle(){
        $principle = About::where('slug','principle')->first();
        return view('pages.about.principle',compact('principle'));
    }

    // services
    public function loanScheme(){
        $service = Service::where('slug','loan-scheme')->first();
        return view('pages.services.loanScheme',compact('service'));
    }
    public function mobileBanking(){
        $service = Service::where('slug','mobile-banking')->first();
        return view('pages.services.mobileBanking',compact('service'));
    }
    public function other(){
        $service = Service::where('slug','other')->first();
        return view('pages.services.other',compact('service'));
    }
    public function remittance(){
        $service = Service::where('slug','remittance')->first();
        return view('pages.services.remittance',compact('service'));
    }
    public function savingScheme(){
        $service = Service::where('slug','saving-scheme')->first();
        return view('pages.services.savingScheme',compact('service'));
    }
    public function smsBanking(){
        $service = Service::where('slug','sms-banking')->first();
        return view('pages.services.smsBanking',compact('service'));
    }

}
