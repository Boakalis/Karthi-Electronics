<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Banner;
use App\Models\admin\ImageUpload;
use App\Models\Settings;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
                // 'default_password' => 'required|min:8|max:24',
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

    public function profile()
    {
        $data = Auth::user();
        $tab = 1;
        return view('admin.profile',compact('data','tab'));
    }

    public function dealerProfile($id)
    {
        $data = User::find($id);
        $tab = 1;
        return view('admin.vendor.profile',compact('data','tab'));
    }

    public function profileUpdate(Request $request)
    {

        $validatedData = $request->validate(
            [
                'email' => 'required|email|max:244',
                'name' => 'required|string|max:244',
                'store_name' => 'required|string|max:244',
                'image' => 'nullable|image',
                'password' => 'nullable|min:8|max:24',
                'confirm_password' => 'nullable|min:8|max:24|same:password',
            ],
            [
                'email.required' => 'Please Enter Email-address',
                'store_name.required' => 'Store Name Required',
                'name.required' => 'Name Required',
                'store_name.max' => 'Maximum character exceeds',
                'name.max' => 'Maximum character exceeds',
                'email.email' => 'Please provide valid email-address',
                'image.image' => 'Please provide valid image',
                'password.required' => 'Confirm Password is required',
                'password.min' => 'Password should had minimum 8 character',
                'password.max' => 'Password exceed maximum allowed character',
                'confirm_password.same' => 'Password and Confirm Password Should be similar',
            ]
        );


        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'store_name' => $request->store_name,
        ];

        if ($request->password != null) {
            $data['password'] = bcrypt($request->password) ;
        }
        if( $request->hasFile('image') )
        {
            $image =   ImageUpload::upload($request->image,'image');
            $data['image'] = $image ;
        }

        User::where('id',Auth::user()->id)->update($data);
        return redirect()->back()
        ->with(Session::flash('alert-success', 'Settings Updated Successfully'));
    }

    public function dealerProfileUpdate(Request $request ,$id)
    {

        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:users,email,'.$id,
                'phone' => 'required|numeric|digits_between:8,15|unique:users,phone,'.$id,
                'name' => 'required|string|max:244',
                'store_name' => 'required|string|max:244',
                'image' => 'nullable|image',
                'password' => 'nullable|min:8|max:24',
                'confirm_password' => 'nullable|min:8|max:24|same:password',
            ],
            [
                'email.required' => 'Please Enter Email-address',
                'store_name.required' => 'Store Name Required',
                'name.required' => 'Name Required',
                'store_name.max' => 'Maximum character exceeds',
                'name.max' => 'Maximum character exceeds',
                'email.email' => 'Please provide valid email-address',
                'image.image' => 'Please provide valid image',
                'password.required' => 'Confirm Password is required',
                'password.min' => 'Password should had minimum 8 character',
                'password.max' => 'Password exceed maximum allowed character',
                'confirm_password.same' => 'Password and Confirm Password Should be similar',
            ]
        );


        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'store_name' => $request->store_name,
            'status' => $request->status
        ];

        if ($request->password != null) {
            $data['password'] = bcrypt($request->password) ;
        }
        if( $request->hasFile('image') )
        {
            $image =   ImageUpload::upload($request->image,'image');
            $data['image'] = $image ;
        }

        User::where('id',$id)->update($data);
        return redirect()->back()
        ->with(Session::flash('alert-success', 'Settings Updated Successfully'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



}
