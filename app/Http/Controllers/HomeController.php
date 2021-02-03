<?php

namespace App\Http\Controllers;

use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Shipu\Themevel\Facades\Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->isMethod('POST')){

if ($request->type=="install"){
    $themeSetting=new ThemeSetting();
    $themeSetting->theme_name=$request->theme_name;
    $themeSetting->is_active=0;
    $themeSetting->save();
} else{
    $themeSetting=ThemeSetting::where('is_active',1)->update(['is_active' => 0]);
    $themeSetting=ThemeSetting::where('theme_name',$request->theme_name)->first();
    $themeSetting->is_active=1;
    $themeSetting->save();
    return redirect()->back();

}



        }
        $themesList=Theme::all();
        $installedThemeList=ThemeSetting::pluck('is_active','theme_name');


        return view('home',['themesList'=>$themesList,'installedThemeList'=>$installedThemeList]);
    }


}
