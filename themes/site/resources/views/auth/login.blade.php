@extends('site::app')

@section('content')
                                <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">        
<div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>

                                <form action="{{ route('auth') }}" method="post" id="login-form" class="">
                                 <span id="login-general-text" class="error-text error-hide">
                                 </span>
									<div class="form-group general">
            </div>
                                    <div class="form-group mb-3 email">
                                        <label for="login-email">Email address</label>
                                        <input class="form-control" type="email" name="email" id="login-email" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3 password">
                                        <label for="login-password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="login-password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block btn-login" name="submit" type="submit"> Log In </button>
                                    </div>

                                </form>
        @widget('modal.login.alternative')
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{ url('/password/email') }}" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Forgot your password?</a></p>
                                <p class="text-muted">Don't have an account? <a href="{{ route('register_page') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
</div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


                                


@endsection