<table>
    <thead>
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Address</th>
        <th>Ordered Items</th>
        <th>Amount</th>
        <th>Payment Type</th>
        <th>Order Date</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $key => $data)
        <tr>
            <td>{{@$key+1}}</td>
            <td>{{@$data->user->name}}</td>
            <td>
                {{@$data->address->name}}<br/>
                {{@$data->address->address_1}}<br/>
                {{@$data->address->address_2}}<br/>
                {{@$data->address->city}}<br/>
                {{@$data->address->pincode}}<br/>
                {{@$data->address->mobile}}<br/>

            </td>
            <td>
                @if (isset($data->orders) && !empty($data->orders))
                    @foreach (@$data->orders as $order)
                        {{@$order->product->name}}-{{@$order->qty}},
                    @endforeach
                @endif
            </td>
            <td>{{@$data->amount}}</td>
            <td>{{@$data->payment_type == 1 ? 'COD' : 'ONLINE'}}</td>
            <td>{{ $data->order_date ? \Carbon\Carbon::parse(@$data->order_date)->format('d-m-Y') : 'NA' }}
            <td>{{@$data->status == 1 ? 'New Order' : ($data->status == 2 ? 'Dispacthing' : ($data->status == 4 ? 'On The Way' : ($data->status == 5 ? 'Delivered' : 'Rejected')))}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>Total Sales</td>
            <td>{{@$datas->sum('amount')}}</td>
            <td></td>
            <td>Total Delivered Order</td>
            <td>{{@$datas->where('status',5)->count()}}</td>
        </tr>
    </tbody>
</table>
