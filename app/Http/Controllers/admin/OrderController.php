<?php

namespace App\Http\Controllers\admin;

use App\Events\NewOrderCancelledEvent;
use App\Events\NewOrderDeliveredEvent;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\DeliveryAgent;
use App\Models\ImageUpload;
use App\Models\Order;
use App\Models\OrderTrack;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{

    public function getOrder(Request $request)
    {
        try {
            $data =  Order::where('id',$request->id)->with('payment','user','address')->first();
            $html = View('admin.orders.invoice',compact('data'))->render();
            return response()->json([
                'status' => 200,
                'data' => $html,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'error'=>$th->getMessage(),
            ]);
        }

    }

    public function update()
    {
        try {
            $data = Order::where([['status',1],['branch_id',Auth::guard('admin')->user()->branch_id],['order_date',Carbon::now()->format('Y-m-d')]])->first();
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

    public function list()
    {
        if (Auth::guard('admin')->user()->is_admin == 1) {
            $datas = Order::where('order_date',Carbon::now()->format('Y-m-d'))->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Order::where([['branch_id',Auth::user()->id],['order_date',Carbon::now()->format('Y-m-d')],['status',1]])->paginate(10);
        }

        return view('admin.orders.index')->with(compact('datas'));
    }

    public function getDeliveryAgent(Request $request)
    {
        try {
            $warehouseId =  Order::where('id',$request->id)->pluck('branch_id')->first();
            $deliveryAgents = DeliveryAgent::where([['branch_id',$warehouseId],['status',1]])->get();
            return response()->json([
                'deliveryAgent' => $deliveryAgents,
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 200 ,
            ]);
        }
    }

    public function deliveryAgents()
    {
        $deliveryAgents = DeliveryAgent::get();
        return view('admin.delivery.index')->with(compact('deliveryAgents'));
    }

    public function createDeliveryAgents()
    {
        $branch = Branch::where('status',1)->get();
        return view('admin.delivery.create')->with(compact('branch'));
    }

    public function editDeliveryAgents($id)
    {
        $data = DeliveryAgent::where('id',$id)->first();
        $branch = Branch::where('status',1)->get();
        return view('admin.delivery.edit')->with(compact('branch','data'));
    }

    public function assignDA(Request $request)
    {
        try {

            $orderId = $request->id;


            $userID = Order::where('id',$orderId)->pluck('user_id')->first();
            Order::where([['user_id',$userID],['id',$orderId]])->update([
                'delivery_partner_id' => $request->delivery_id,
                'status' => 3,
            ]);
            OrderTrack::create([
                'order_id' => $orderId,
                'status' => 3,
                'date' => Carbon::now('Asia/Kolkata')->toTimeString(),
            ]);

            return response()->json([
                'status' => 200 ,
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th->getMessage(),
                'status' => 400 ,
            ]);

        }
    }

    public function storeDeliveryAgents(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'branch_id' => 'required',
            'phone' => 'required|numeric|digits_between:8,15|unique:delivery_agents,phone',
            'status' => 'required',
        ]);
        $path = null;
        $datas = $request->except('_token','image');
        if ($request->file('image')) {
            $path =   ImageUpload::upload($request->image,'image');
            $datas['image'] = $path;
        }
        DeliveryAgent::create($datas);
        return redirect()->route('admin.delivery.agents')->with('success', 'Delivery Agent added Successfully');
    }

    public function updateDeliveryAgents(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'branch_id' => 'required',
            'phone' => 'required|numeric|digits_between:8,15|unique:delivery_agents,phone,'.$request->id,
            'status' => 'required',
        ]);
        $datas = $request->except('_token','image');
        if ($request->file('image')) {
            $path =   ImageUpload::upload($request->image,'image');
            $datas['image'] = $path;
        }
        DeliveryAgent::where('id',$request->id)->update($datas);
        return redirect()->route('admin.delivery.agents')->with('success', 'Delivery Agent Updated Successfully');
    }

    public function orderStatus(Request $request)
    {
        try {

          $order =  Order::where('id',$request->id)->update([
                'status' => $request->status,
          ]);
          if ($request->status == 2) {
            $order =  Order::where('id',$request->id)->update([
                'status' => $request->status,
                'delivery_partner_id' => null,
          ]);
          }
          $order_data = Order::where('id',$request->id)->first();

         $details = [
            'order_id' => $order_data->order_id,
            'name' =>   $order_data->user->name ,
            'email' => $order_data->user->email,
        ];

         if ($request->status == 0) {
             event(new NewOrderCancelledEvent($details));
         }

         if ($request->status == 4) {
                $walletData = Wallet::where('user_id',$order_data->user_id)->first();
                // $walletData->amount -= ($order_data->amount);
                // $walletData->save();
                $transaction_data = [
                    'user_id' => $order_data->user_id,
                    'wallet_id' => $walletData->id,
                    'date' => date('Y-m-d'),
                    'action_id' => 2 ,
                    'amount' => $order_data->amount,
                    'current_balance' => $walletData->amount,
                    'status' => 1,
                    'payment_type' => 1,
                ];
                Transaction::create($transaction_data);

                event(new NewOrderDeliveredEvent($details));
        }

        OrderTrack::updateOrCreate([
            'order_id' => $order_data->id,
            'status' => $request->status,
        ],[
            'date' => Carbon::now('Asia/Kolkata')->toTimeString(),
        ]);


        return response()->json([
                'status_code' => $request->status,
                'status' => 200,
                'id' =>$request->id,
        ]);

        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th->getMessage(),
                'status' => 400,
            ]);
        }
    }

    public function refund(Request $request)
    {
        try {
            $user_id = Order::where('id',$request->order_id)->pluck('user_id')->first();
            $wallet =Wallet::where('user_id',$user_id)->first();
            $wallet->amount += $request->amount;
            $wallet->save();
            Order::where('id',$request->order_id)->update([
                'status' => 5 ,
            ]);
            $transaction_data = [
                'user_id' => $user_id,
                'wallet_id' => $wallet->id,
                'date' => date('Y-m-d'),
                'action_id' => 1 ,
                'amount' => $request->amount,
                'current_balance' => $wallet->amount,
                'status' => 1,
                'payment_type' => 1,
            ];
            Transaction::create($transaction_data);
            return response()->json([
                'status' => 200 ,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th->getMessage(),
                'status' => 400 ,
            ]);

        }

    }

    public function preOrders()
    {
        if (Auth::guard('admin')->user()->is_admin == 1) {
            $datas = Order::where('order_date',Carbon::now()->addday(1)->format('Y-m-d'))->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Order::where([['branch_id',Auth::guard('admin')->user()->branch_id],['order_date',Carbon::now()->addday(1)->format('Y-m-d')],['status',1]])->paginate(10);
        }
        $preOrders = [] ;
        return view('admin.orders.index')->with(compact('datas','preOrders'));
    }

    public function pastOrders()
    {
        if (Auth::guard('admin')->user()->is_admin == 1) {
            $datas = Order::where('order_date','!=',Carbon::now()->addday(1)->format('Y-m-d'))->where('order_date','!=',Carbon::now()->format('Y-m-d'))->orderBy('id','DESC')->paginate(10);
        } else {
            $datas = Order::where('order_date','!=',Carbon::now()->addday(1)->format('Y-m-d'))->where('order_date','!=',Carbon::now()->format('Y-m-d'))->paginate(10);
        }
        $preOrders = [] ;
        return view('admin.orders.index')->with(compact('datas','preOrders'));
    }

    public function cancel()
    {
        $datas = Order::where('status',0)->orWhere('status',6)->orWhere('status',5)->paginate(10);
        return view('admin.orders.cancel',compact('datas'));
    }

    public function orders()
    {
        $datas = Order::latest()->paginate(10);
        return view('admin.orders.index',['datas'=> $datas]);
    }

}
