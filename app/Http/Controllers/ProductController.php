<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Vendor;
use App\Models\admin\ImageUpload;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index()
    {

        if (Auth::user()->user_type ==1) {

            $products = Product::with('dealer', 'subcategory')->get();
        } else {
            $products = Product::where('dealer_id',Auth::user()->id)->with('dealer', 'subcategory')->get();
        }


        return view('admin.products.index', compact('products'));
    }

    public function newProducts()
    {
        $products = Product::where('status', 2)->with('dealer', 'subcategory')->get();
        return view('admin.products.new', compact('products'));
    }

    public function rejectedProducts()
    {
        $products = Product::where('status', 3)->with('dealer', 'subcategory')->get();
        return view('admin.products.new', compact('products'));
    }

    public function create()
    {
        $dealers = User::where('user_type', '!=', 3)->get();
        $categories = Category::where('status', 1)->with('subcategory')->get();
        return view('admin.products.create', compact('categories', 'dealers'));
    }

    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'subcategory_id' => 'required',
            'description' => 'nullable',
            'short_description' => 'nullable|max:255',
            'dealer_price' => 'required_without:is_products_variant',
            // 'sale_price' => 'required_without:is_products_variant' ,
            'variants' => 'required_if:is_products_variant,1',
            'variants.*.variant_name' => 'required_if:is_products_variant,1',
            'variants.*.dealer_prices' => 'required_if:is_products_variant,1',
            'variants.*.status' => 'required_if:is_products_variant,1',
            'image' => 'required|image',

        ], [
            'name.required' => 'Please Enter Name',
            'dealer_price.required_without' => 'We noticed that this product dont had variant, so kindly provide price for that',
            'variants.0.variant_name.required_if' => 'Please provide name for variant',
            'variants.0.dealer_prices.required_if' => 'Please provie Dealer Price',
            'variants.0.status.required_if' => 'Please fill all required fields for variant details',

        ]);


        $data = [
            'name' => $request->name,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'colors' => json_encode($request->colors, true),
            'is_featured' => $request->is_featured,
            'is_exclusive' => $request->is_exclusive,
            'is_trending' => $request->is_trending,
            'is_best_sellers' => $request->is_best_sellers,

        ];

        if (Auth::user()->user_type == 1) {
            $data['status'] = $request->status;
        } else {
            $data['status'] = 2;
        }
        $category_id = SubCategory::where('id',$request->subcategory_id)->pluck('category_id')->first();
        if ($request->is_products_variant != 1) {
            $validatedVariantData = $request->validate([
                'dealer_price' => 'required',
            ]);
            $data['dealer_price'] = $request->dealer_price;
            $data['is_products_variant'] = null;
            if (Auth::user()->user_type == 1) {
                $data['sale_price'] = $request->sale_price;
                $data['discounted_price'] = $request->discounted_price;
            }
        } else {
            $validatedVariantData = $request->validate([

                'variants' => 'required',
                'variants.*.variant_name' => 'required',
                'variants.*.dealer_prices' => 'required',
                // 'variants.*.sale_prices' => 'required',
                'variants.*.status' => 'required',

            ]);
            $data['is_products_variant'] = 1;
        }

        if ($request->hasFile('image')) {
            $image =   ImageUpload::upload($request->image, 'image');
            $data['image'] = $image;
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $value) {

                $image =   ImageUpload::upload($value, 'image');
                $images[] = $image;
            }
            $data['images'] = json_encode($images, true);
        }

        if (Auth::user()->user_type == 1) {
            $data['dealer_id'] = $request->dealer_id;
            $data['ultra_coin'] = $request->ultra_coin;
        } else {
            $data['dealer_id'] = Auth::user()->id;
        }
        //Unique Slug
        $d = date("d");
        $m = date("m");
        $y = date("Y");
        $t = time();
        $dmt = $d + $m + $y + $t;
        $ran = rand(0, 10000000);
        $dmtran = $dmt + $ran;
        $un =  uniqid();
        $dmtun = $un . $dmt;
        $mdun = md5($dmtun);


        $data['slug'] = Str::slug($request->name) . '&uniqId=' . $mdun;
        $data['category_id'] =$category_id;
        $product = Product::create($data);


        if ($request->is_products_variant != null) {

            if (Auth::user()->user_type == 1) {
                $dealer_id = $request->dealer_id;
            } else {
                $dealer_id = Auth::user()->id;
            }
            if (isset($request->variants) && !empty($request->variants)) {

                foreach ($request->variants as  $value) {

                    $variantData = [
                        'product_id' => $product->id,
                        'dealer_id' => $dealer_id,
                        'name'  => $value['variant_name'],
                        'dealer_price' => $value['dealer_prices'],

                        'status' => $value['status'],
                    ];

                    if (Auth::user()->user_type == 1) {
                        $variantData['seller_price'] = $value['sale_prices'];
                        $variantData['discounted_price'] = $value['discounted_price'];
                    }

                    Variant::create($variantData);
                }
            }
        }
        return redirect()->route('product.index')->with(Session::flash('alert-success', 'Product Added Successfully'));
    }

    public function edit($slug)
    {
        $data = Product::where('slug', $slug)->with('variants')->first();
        $dealers = User::where('user_type', '!=', 3)->get();
        $categories = Category::where('status', 1)->with('subcategory')->get();
        return view('admin.products.edit', compact('data', 'dealers', 'categories'));
    }

    public function review($slug)
    {
        $data = Product::where('slug', $slug)->with('variants')->first();
        $dealers = User::where('user_type', '!=', 3)->get();
        $categories = Category::where('status', 1)->with('subcategory')->get();
        return view('admin.products.review', compact('data', 'dealers', 'categories'));
    }


    public function deleteVariant($id)
    {
        try {

            // $data = Variant::where('id',$id)->first();
            // $variantCount = Variant::where('product_id',$data->product_id)->count();
            // if($variantCount <= 1){
            //     return response()->json([
            //         'status' => 0,
            //      ]);
            // }else{
            Variant::where('id', $id)->delete();
            // }
            return response()->json([
                'status' => 200,
                'message' => 'Variant Deleted Successfully',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'subcategory_id' => 'required',
            'description' => 'nullable',
            'short_description' => 'nullable|max:255',
            'dealer_price' => 'required_without:is_products_variant',
            // 'sale_price' => 'required_without:is_products_variant' ,
            'image' => 'nullable|image',
        ], [
            'name.required' => 'Please Enter Name',
            'dealer_price.required_without' => 'We noticed that this product dont had variant, so kindly provide price for that',
            'variants.0.variant_name.required_if' => 'Please provide name for variant',
            'variants.0.dealer_prices.required_if' => 'Please provie Dealer Price',
            'variants.0.status.required_if' => 'Please fill all required fields for variant details',
        ]);


        if (isset($request->variants)) {
            $validatedVariantData = $request->validate([

                'variants' => 'required',
                'variants.*.variant_name' => 'required',
                'variants.*.dealer_prices' => 'required',
                // 'variants.*.sale_prices' => 'required',
                'variants.*.status' => 'required',

            ]);
        }

        if (isset($request->variants_old)) {
            $validatedVariantOldData = $request->validate([

                'variants_old' => 'required',
                'variants_old.*.name' => 'required',
                'variants_old.*.dealer_price' => 'required',
                // 'variants_old.*.sale_price' => 'required',
                'variants_old.*.status' => 'required',

            ]);
        }


        $productData = Product::where('slug', $request->slug)->first();
        $data = [
            'name' => $request->name,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'colors' => json_encode($request->colors, true),
            'is_featured' => $request->is_featured,
            'is_exclusive' => $request->is_exclusive,
            'is_trending' => $request->is_trending,
            'is_best_sellers' => $request->is_best_sellers,
        ];

        if ($productData->status != 2) {
            $data['status'] = $request->status;
        } else {
            $data['status'] = 2;
        }
        if ($request->is_products_variant != 1) {
            $validatedVariantData = $request->validate([
                'dealer_price' => 'required',
            ]);
            $data['dealer_price'] = $request->dealer_price;
            $data['is_products_variant'] = null;
            if (Auth::user()->user_type == 1) {
                $data['sale_price'] = $request->sale_price;
                $data['discounted_price'] = $request->discounted_price;
            }
        } else {
            $data['is_products_variant'] = 1;
        }

        if ($request->hasFile('image')) {
            $image =   ImageUpload::upload($request->image, 'image');
            $data['image'] = $image;
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $value) {
                $image =   ImageUpload::upload($value, 'image');
                $images[] = $image;
            }
            $data['images'] = json_encode($images, true);
        }

        if (Auth::user()->user_type == 1) {
            $data['dealer_id'] = $request->dealer_id;
            $data['ultra_coin'] = $request->ultra_coin;
        } else {
            $data['dealer_id'] = Auth::user()->id;
        }

        // //Unique Slug
        // $d = date("d");
        // $m = date("m");
        // $y = date("Y");
        // $t = time();
        // $dmt = $d + $m + $y + $t;
        // $ran = rand(0, 10000000);
        // $dmtran = $dmt + $ran;
        // $un =  uniqid();
        // $dmtun = $un . $dmt;
        // $mdun = md5($dmtun);

        if (empty($request->variants_old) && empty($request->variants)) {
            $data['is_products_variant'] = null;
        } else {
            $data['is_products_variant'] = 1;
        }


        // $data['slug'] = Str::slug($request->name) . '&uniqId=' . $mdun;
        $category_id = SubCategory::where('id',$request->subcategory_id)->pluck('category_id')->first();
        $data['category_id'] = $category_id;
        $product = Product::where('slug', $request->slug)->update($data);


        if (isset($request->variants_old) && !empty($request->variants_old)) {
            foreach ($request->variants_old as $key => $old) {

                Variant::where([['id', $old['id']], ['product_id', $productData->id]])->update([
                    'name' => $old['name'],
                    'dealer_price' => $old['dealer_price'],
                    // 'seller_price' => $old['sale_price'],
                    'status' => $old['status'],
                ]);
                if (Auth::user()->user_type == 1) {
                    Variant::where([['id', $old['id']], ['product_id', $productData->id]])->update([
                        'seller_price' => $old['sale_price'],
                        'discounted_price' => $old['discounted_price'],
                    ]);
                }
            }
        }


        if ($request->is_products_variant != null) {
            if (Auth::user()->user_type == 1) {
                $dealer_id = $request->dealer_id;
            } else {
                $dealer_id = Auth::user()->id;
            }
            if (isset($request->variants) && !empty($request->variants)) {

                foreach ($request->variants as  $value) {
                    $variantData = [
                        'product_id' => $productData->id,
                        'dealer_id' => $dealer_id,
                        'name'  => $value['variant_name'],
                        'dealer_price' => $value['dealer_prices'],
                        'status' => $value['status'],
                    ];

                    if (Auth::user()->user_type == 1) {
                        $variantData['seller_price'] = $value['sale_prices'];
                        $variantData['discounted_price'] = $value['discounted_price'];
                    }

                    Variant::create($variantData);
                }
            }
        }


        return redirect()->route('product.index')->with(Session::flash('alert-success', 'Product Added Successfully'));
    }

    public function show($slug)
    {
        $data = Product::where('slug', $slug)->with('variants')->first();
        $dealers = User::where('user_type', '!=', 3)->get();

        $categories = Category::where('status', 1)->with('subcategory')->get();
        return view('admin.products.show', compact('data', 'dealers', 'categories'));
    }

    public function changeStatus($id)
    {
        return 1;
        $data = Product::where('id', $id)->first();
        if ($data->status == 1) {
            $datas['status'] = 0;
        } else {
            $datas['status'] = 1;
        }
        Product::where('id', $id)->update($datas);

        return response()->json([
            'status' => 200,
            'currentStatus' => $datas['status'],
        ]);
    }

    public function deleteProduct(Request $request)
    {
        try {

            Product::where('id', $request->id)->delete();
            return response()->json([
                'status' => 200,

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 0,

            ]);
        }
    }

    public function reviewUpdate(Request $request)
    {
        if ($request->status == 3) {
            Product::where('slug', $request->slug)->update([
                'status' => 3,
            ]);
            return redirect()->route('product.index');
        }
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'subcategory_id' => 'required',
            'description' => 'nullable',
            'dealer_price' => 'required_without:is_products_variant',
            'sale_price' => 'required_without:is_products_variant',

            'image' => 'nullable|image',
        ], [
            'name.required' => 'Please Enter Name',
            'dealer_price.required_without' => 'We noticed that this product dont had variant, so kindly provide price for that',
            'variants.0.variant_name.required_if' => 'Please provide Variant Name',
            'variants.0.dealer_prices.required_if' => 'Please provide Dealer Price',
            'variants.0.status.required_if' => 'Please fill all required fields for variant details',
        ]);


        if (isset($request->variants)) {
            $validatedVariantData = $request->validate([

                'variants' => 'required',
                'variants.*.variant_name' => 'required',
                'variants.*.dealer_prices' => 'required',
                'variants.*.sale_prices' => 'required',
                'variants.*.status' => 'required',

            ]);
        }

        if (isset($request->variants_old)) {
            $validatedVariantOldData = $request->validate([

                'variants_old' => 'required',
                'variants_old.*.name' => 'required',
                'variants_old.*.dealer_price' => 'required',
                'variants_old.*.sale_price' => 'required',
                'variants_old.*.status' => 'required',

            ]);
        }


        $productData = Product::where('slug', $request->slug)->first();
        $data = [
            'name' => $request->name,
            'subcategory_id' => $request->subcategory_id,
            'description' => $request->description,
            'colors' => json_encode($request->colors, true),
            'is_featured' => $request->is_featured,
            'is_exclusive' => $request->is_exclusive,
            'is_trending' => $request->is_trending,
            'is_best_sellers' => $request->is_best_sellers,
        ];

        // if ($productData->status != 2) {
        $data['status'] = $request->status;
        // } else {
        //     $data['status'] = 2;
        // }

        if ($request->is_products_variant != 1) {
            $data['dealer_price'] = $request->dealer_price;
            // $data['is_products_variant'] = null;
            $data['sale_price'] = $request->sale_price;
        }

        if ($request->hasFile('image')) {
            $image =   ImageUpload::upload($request->image, 'image');
            $data['image'] = $image;
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $value) {
                $image =   ImageUpload::upload($value, 'image');
                $images[] = $image;
            }
            $data['images'] = json_encode($images, true);
        }

        if (Auth::user()->user_type == 1) {
            $data['dealer_id'] = $request->dealer_id;
        } else {
            $data['dealer_id'] = Auth::user()->id;
        }

        // //Unique Slug
        // $d = date("d");
        // $m = date("m");
        // $y = date("Y");
        // $t = time();
        // $dmt = $d + $m + $y + $t;
        // $ran = rand(0, 10000000);
        // $dmtran = $dmt + $ran;
        // $un =  uniqid();
        // $dmtun = $un . $dmt;
        // $mdun = md5($dmtun);

        if (empty($request->variants_old) && empty($request->variants)) {
            $data['is_products_variant'] = null;
        } else {
            $data['is_products_variant'] = 1;
        }


        // $data['slug'] = Str::slug($request->name) . '&uniqId=' . $mdun;

        $product = Product::where('slug', $request->slug)->update($data);


        if (isset($request->variants_old) && !empty($request->variants_old)) {
            foreach ($request->variants_old as $key => $old) {

                Variant::where([['id', $old['id']], ['product_id', $productData->id]])->update([
                    'name' => $old['name'],
                    'dealer_price' => $old['dealer_price'],
                    'seller_price' => $old['sale_price'],
                    'status' => $old['status'],
                ]);
            }
        }


        if ($request->is_products_variant != null) {
            if (Auth::user()->user_type == 1) {
                $dealer_id = $request->dealer_id;
            } else {
                $dealer_id = Auth::user()->id;
            }
            if (isset($request->variants) && !empty($request->variants)) {

                foreach ($request->variants as  $value) {
                    $variantData = [
                        'product_id' => $productData->id,
                        'dealer_id' => $dealer_id,
                        'name'  => $value['variant_name'],
                        'dealer_price' => $value['dealer_prices'],
                        'status' => $value['status'],
                    ];

                    if (Auth::user()->user_type == 1) {
                        $variantData['seller_price'] = $value['sale_prices'];
                    }

                    Variant::create($variantData);
                }
            }
        }


        return redirect()->route('product.index')->with(Session::flash('alert-success', 'Product Added Successfully'));
    }
}
