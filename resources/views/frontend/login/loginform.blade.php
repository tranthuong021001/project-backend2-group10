@extends('frontend.master')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>login</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>login</h2>
                <form action="{{url('/login-account')}}" method="post">
                {{csrf_field()}}
                    <p>
                        <label>Username or email <span>*</span></label>
                        <input type="text" name="email_account">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">login</button>
                        <label for="remember">
                            <input id="remember" type="checkbox">
                            Remember me
                        </label>
                        <a href="#">Lost your password?</a>
                    </div>

                </form>
            </div>
        </div>
        <!--login area start-->

        <!--register area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form register">
                <h2>Register</h2>
                <form action="{{url('/add-customer')}}" method="POST">
                    {{ csrf_field() }}
                    <p>
                        <label>Full Name <span>*</span></label>
                        <input type="text" name="name">
                    </p>
                    <p>
                        <label>Email address <span>*</span></label>
                        <input type="text" name="email">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label>Phone <span>*</span></label>
                        <input type="text" name="phone">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>
</div>
<!-- customer login end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection
