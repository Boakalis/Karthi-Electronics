<div>
    {{-- <style>
        .lavender{
            background: lavender;
        }
    </style>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <center>
                <h1>Order Placed Successfully</h1>
            </center>
            <center>
                <div class="ec-bg-swipe">
                    <div class="row">
                        <button class="col-6 bg-success ec-btn-bg-swipe">
                            <span class="circle bg-dark " aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text text-light ">Track Order</span>
                        </button>
                        <button class="col-6 bg-danger ec-btn-bg-swipe">
                            <span class="circle bg-dark " aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text text-light ">Go Home</span>
                        </button>
                    </div>
                </div>
            </center>
        </div>
    </section> --}}
    <style>
        .body-area {
            text-align: center;
            padding: 40px 0;

        }

        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }

        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }

        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }

        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }

    </style>

    <div class="body-area">
        <div style="border-radius:200px; height:200px; width:200px; background: #f8f8f8; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>We received your purchase request;<br /> your order will be dispatched shortly</p>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('home') }}" class="btn btn-danger">Go Home</a>
            </div>
            <div class="col-6">
                <a href="{{ route('order.view') }}" class="btn btn-success">View Orders</a>
            </div>
        </div>
    </div>


</div>
