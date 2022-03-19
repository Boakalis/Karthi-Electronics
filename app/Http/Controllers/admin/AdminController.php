<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\Admin\ImageUpload;
use App\Models\Settings;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPage()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        $banner_image = Banner::get();
        $data = Settings::where('id',1)->first();
        return view('admin.settings',compact('data','banner_image'));
    }

    public function settingsUpdate(Request $request)
    {


        $validatedData = $request->validate(
            [
                'email' => 'nullable|email|max:244',
                'name' => 'nullable|string|max:244',
                'description' => 'nullable|string',
                'default_password' => 'required|min:8|max:24',
                'facebook' => 'nullable|string|max:244',
                'whatsapp' => 'nullable|string|max:244',
                'logo' => 'nullable',
                'favicon' => 'nullable',
                'banner_image' => 'nullable',
                'footer_text' => 'nullable|max:244',
                'phone' => 'nullable|integer|digits_between:7,15',
                'landline' => 'nullable|integer|digits_between:7,20',

                'address' => 'nullable',
                'password' => 'nullable|min:8|max:24',
            ],
            [
                'email.required' => 'Please Enter Email-address',
                'email.email' => 'Please provide valid email-address',
                'default_password.required' => 'Password is required',
                'default_password.min' => 'Password should had minimum 8 character',
                'default_password.max' => 'Password exceed maximum allowed character',
            ]
        );
        $datas = $request->except('_token','id');

        if( $request->hasFile('logo') )
        {
            $logo =   ImageUpload::upload($request->logo,'logo');
            $datas['logo'] = $logo ;
        }



        if( $request->hasFile('banner_image') )
        {

            foreach ($request->banner_image as $key => $value) {
                 $banner_image =   ImageUpload::upload($value,'banner_image');
                    Banner::create([
                        'image' => $banner_image,
                    ]);
                }


        }

        if( $request->hasFile('favicon') )
        {
            $favicon =   ImageUpload::upload($request->favicon,'favicon');
            $datas['favicon'] = $favicon ;
            }
        Settings::updateOrCreate(['id'=>1],$datas);
        return redirect()->route('settings')
        ->with(Session::flash('alert-success', 'Settings Updated Successfully'));


    }

    public function bannerDelete($id)
    {
        Banner::where('id',$id)->delete();
        return redirect()->back();
    }

}
