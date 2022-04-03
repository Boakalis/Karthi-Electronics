<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CouponControllerr extends Controller
{
    public function index()
    {
        $coupons = Coupon::paginate(25);
        $categories = Category::where('status',1)->get();
        $products = Product::where('status',1)->get();
        return view('admin.coupon.index',compact('coupons','categories','products'));
    }

    public function status(Request $request)
    {
        Coupon::where('id',$request->id)->update([
            'status' => $request->value,
        ]);
    }


    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all() ,
         [
            'code' => 'required|max:255',
            'max_limit' => 'nullable|integer',
            'user_limit' => 'nullable|integer',
            'amount' => 'integer|nullable',
            'max_amount' => 'nullable|integer',
            'min_amount' => 'integer|nullable',
            'percentage' => 'numeric|nullable|max:100',
            'description' => 'required|max:255',
            'valid_date' => 'date|nullable',
         ],
         [
            'code.required' => 'Promo Code Required',
            'max_limit.required' => 'Maximum Limit of coupon usage is required',
            'user_limit.required' => 'Maximum Limit for user is required',
            'max_limit.integer' => 'Maximum Limit should be in numeric',
            'user_limit.integer' => 'User Limit should be in numeric',
            'amount.integer' => 'Amount should be in numeric',
            'min_amount.integer' => 'Minimum amount should be in numeric',
            'max_amount.integer' => 'Maximum amount should be in numeric',
            'description.required' => 'Description Field Required',
            'description.max' => 'Description Should be less than 255 characters',
            'valid_date.date' => 'Please Provide Valid Date',
         ]);

        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors()
                ->all() ]);
        }

        if ($request->type == 1) {
            $request['amount'] = null;
            if ($request['percentage'] == null ) {
                return response()
                ->json(['errors' => ['Percentage Required'] ]);
            }
            if ($request['max_amount'] == null ) {
                return response()
                ->json(['errors' => ['Maximum Amount Required when coupon is percentage'] ]);
            }
        }
        if ($request->type == 2) {
            $request['percentage'] = null;
            $request['max_amount'] = null;
            if ($request['amount'] == null ) {
                return response()
                ->json(['errors' => ['Amount Required'] ]);
            }
        }
        if (Coupon::where([['code',$request->code],['status',1]])->exists()) {

            return response()
            ->json(['errors' => ['Promocode entered is in active state.please deactive it before creating with the new one with same code.'] ]);
        }


        if ($request->offer_type == 1) {
            $request['product_id'] = null;
            $request['category_id'] = null;
        }

        if ($request->offer_type == 2) {
            $request['product_id'] = null;
        }

        if ($request->offer_type == 3) {
            $request['category_id'] = null;
        }
        Coupon::create($request->all());
        try {
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => $th->getMessage(),
            ]);
        }

    }

    public function edit($id)
    {
        $data = Coupon::find($id);
        try {
            return response()->json([
                'status' => 200,
                'data' =>$data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => $th->getMessage(),
            ]);
        }

    }

    public function update(Request $request)
    {
        $validator = \Validator::make($request->all() ,
        [
           'code' => 'required|max:255',
           'max_limit' => 'nullable|integer',
           'user_limit' => 'nullable|integer',
           'amount' => 'integer|nullable',
           'max_amount' => 'nullable|integer',
           'min_amount' => 'integer|nullable',
           'percentage' => 'numeric|nullable|max:100',
           'description' => 'required|max:255',
           'valid_date' => 'date|nullable',
        ],
        [
           'code.required' => 'Promo Code Required',
           'max_limit.required' => 'Maximum Limit of coupon usage is required',
           'user_limit.required' => 'Maximum Limit for user is required',
           'max_limit.integer' => 'Maximum Limit should be in numeric',
           'user_limit.integer' => 'User Limit should be in numeric',
           'amount.integer' => 'Amount should be in numeric',
           'min_amount.integer' => 'Minimum amount should be in numeric',
           'max_amount.integer' => 'Maximum amount should be in numeric',
           'description.required' => 'Description Field Required',
           'description.max' => 'Description Should be less than 255 characters',
           'valid_date.date' => 'Please Provide Valid Date',
        ]);

       if ($validator->fails())
       {
           return response()
               ->json(['errors' => $validator->errors()
               ->all() ]);
       }

       if ($request->type == 1) {
           $request['amount'] = null;
           if ($request['percentage'] == null ) {
               return response()
               ->json(['errors' => ['Percentage Required'] ]);
           }
           if ($request['max_amount'] == null ) {
               return response()
               ->json(['errors' => ['Maximum Amount Required when coupon is percentage'] ]);
           }
       }
       if ($request->type == 2) {
           $request['percentage'] = null;
           $request['max_amount'] = null;
           if ($request['amount'] == null ) {
               return response()
               ->json(['errors' => ['Amount Required'] ]);
           }
       }

       if (Coupon::where([['code',$request->code],['status',1]])->count() > 1 ) {

               return response()
               ->json(['errors' => ['Promocode entered is in active state.please deactive it before creating with the new one with same code.'] ]);
       }

       if ($request->offer_type == 1) {
           $request['product_id'] = null;
           $request['category_id'] = null;
       }

       if ($request->offer_type == 2) {
           $request['product_id'] = null;
       }

       if ($request->offer_type == 3) {
           $request['category_id'] = null;
       }
       $data = $request->except('_token');
       Coupon::where('id',$request->id)->update($data);
       try {
        return response()->json([
            'status' => 200,
        ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => $th->getMessage(),
            ]);
        }

    }

}
