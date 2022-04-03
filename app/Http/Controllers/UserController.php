<?php

namespace App\Http\Controllers;

use App\Models\Admin\ImageUpload;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userProfile($id)
    {
        $data = User::find($id);
        $tab = 1;
        return view('admin.user.profile',compact('data','tab'));
    }

    public function profileUpdate(Request $request)
    {

        $validatedData = $request->validate(
            [
                'email' => 'required|email|max:244',
                'name' => 'required|string|max:244',
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

    public function userProfileUpdate(Request $request ,$id)
    {

        $validatedData = $request->validate(
            [
                'email' => 'required|email|unique:users,email,'.$id,
                'name' => 'required|string|max:244',

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

}
