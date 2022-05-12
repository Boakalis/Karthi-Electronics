<div>
    <style>
        .top_rw {
            background-color: #f4f4f4;
        }

        .td_w {}

        button {
            padding: 5px 10px;
            font-size: 14px;
        }

        .invoice-box {
            max-width: 890px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 14px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-bottom: solid 1px #ccc;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: middle;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            font-size: 12px;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top_rw">
                <td colspan="2">
                    <h2 style="margin-bottom: 0px;"> Purchase Invoice</h2>
                    <span style=""> Purchased Date: {{\Carbon\Carbon::parse(@$data->order_date)->format('d-M-Y')}} </span>
                </td>
                <td style="width:30%; margin-right: 10px;">
                    Order Id: {{@$data->orderId}}
                </td>
            </tr>
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <b> Sold By: {{@$storeData->name}} </b> <br>
                                {!!@$storeData->address!!} <br>
                                PAN: {{@$storeData->facebook}} <br>
                                GSTIN: {{@$storeData->whatsapp}} <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td colspan="2">
                                <b> Shipping Address: {{@$data->user->name}} </b> <br>
                                @if (isset($data->address->address_1) && (@$data->address->address_1 != null ))
                                {{@$data->address->address_1}} <br>
                                @endif
                                @if (isset($data->address->address_2) && (@$data->address->address_2 != null))
                                {{@$data->address->address_2}}<br>
                                @endif
                                @if (isset($data->address->city) && (@$data->address->city != null))
                                {{@$data->address->city}}, {{@$data->address->pincode}}  <br>
                                @endif
                                @if (isset($data->address->landmark) && (@$data->address->landmark != null))
                                LandMark: {{@$data->address->landmark}} <br>
                                @endif

                            </td>
                            <td> <b> Billing Address: {{@$data->user->name}} </b><br>
                                @if (isset($data->address->address_1) && (@$data->address->address_1 != null ))
                                {{@$data->address->address_1}} <br>
                                @endif
                                @if (isset($data->address->address_2) && (@$data->address->address_2 != null))
                                {{@$data->address->address_2}}<br>
                                @endif
                                @if (isset($data->address->city) && (@$data->address->city != null))
                                {{@$data->address->city}}, {{@$data->address->pincode}}  <br>
                                @endif
                                @if (isset($data->address->landmark) && (@$data->address->landmark != null))
                                LandMark: {{@$data->address->landmark}} <br>
                                @endif

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <td colspan="3">
                <table cellspacing="0px" cellpadding="2px">
                    <tr class="heading">
                        <td style="width:25%;">
                            ITEM
                        </td>
                        <td style="width:10%; text-align:center;">
                            QTY.
                        </td>
                        <td style="width:10%; text-align:right;">
                            PRICE (INR)
                        </td>
                        <td style="width:15%; text-align:right;">
                            TAX RATE
                        </td>
                        <td style="width:15%; text-align:right;">
                            TAX AMOUNT (INR)
                        </td>
                        <td style="width:15%; text-align:right;">
                            TOTAL AMOUNT (INR)
                        </td>
                    </tr>
                    @php
                        $qty = 0;
                        $tax = 0;
                        $price =0;
                        $total = 0;
                    @endphp
                    @foreach ($data->orders as $order)
                        <tr class="item">
                            <td style="width:25%;">
                                {{@$order->product->name}}{{@$order->variant_id != null ? '-'.@$order->variant->name : ''}}
                            </td>
                            <td style="width:10%; text-align:center;">
                                {{ @$order->qty}}
                                @php
                                    @$qty+= @$order->qty
                                @endphp
                            </td>
                            <td style="width:10%; text-align:right;">
                                {{ @$order->qty*(round(@$order->amount - ( @$order->amount-(@$order->amount/1.18)),2)) }}
                                @php
                                    @$price+= @$order->qty*(round(@$order->amount - ( @$order->amount-(@$order->amount/1.18)),2))
                                @endphp
                            </td>
                            <td style="width:15%; text-align:right;">
                                18%
                            </td>
                            <td style="width:15%; text-align:right;">
                               {{@$order->qty*(round(( @$order->amount-(@$order->amount/1.18)),2))}}
                               @php
                                    @$tax+= @$order->qty*(round(( @$order->amount-(@$order->amount/1.18)),2))
                                @endphp
                            </td>
                            <td style="width:15%; text-align:right;">
                                {{@$order->qty*(@$order->amount)}}
                                @php
                                    @$total+= @$order->qty*(@$order->amount)
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    <tr class="item">
                        <td style="width:25%;"> <b> Grand Total </b> </td>
                        <td style="width:10%; text-align:center;">
                            {{@$qty}}
                        </td>
                        <td style="width:10%; text-align:right;">
                            {{@$price}}
                        </td>
                        <td style="width:15%; text-align:right;">
                        </td>
                        <td style="width:15%; text-align:right;">
                            {{@$tax}}
                        </td>
                        <td style="width:15%; text-align:right;">
                            {{@$total}}
                        </td>
                    </tr>
            </td>
        </table>
        {{-- <tr class="total">

            <td colspan="3" align="right"> Total Amount in Words : <b> Three Hundred Eighty Rupees Only </b> </td>
        </tr> --}}
        <tr>
            <td colspan="3">
                <table cellspacing="0px" cellpadding="2px">
                    <tr>
                        <td width="50%">
                            <b> Declaration: </b> <br>
                            We declare that this invoice shows the actual price of the goods
                            described above and that all particulars are true and correct. The
                            goods sold are intended for end user consumption and not for resale.
                        </td>
                        <td>
                            * This is a computer generated invoice and does not
                            require a physical signature
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                        </td>
                        <td>
                            <b> Authorized Signature </b>
                            <br>
                            <br>
                            ...................................
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </table>
    </div>

</div>
