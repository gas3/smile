@extends('site::app')

@section('content')
<div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign Up</h4>
                                </div>

                                <form action="{{ route('register') }}" method="post" id="register-form">

                                    <div class="form-group">
                                        <label for="register-name">Username</label>
                                        <input class="form-control" name="name" type="text" id="register-name" placeholder="Enter your username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="register-email">Email address</label>
                                        <input class="form-control" name="email" type="email" id="register-email" required placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="register-password">Password</label>
                                        <input class="form-control" name="password" type="password" required id="register-password" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>
                                @widget('modal.register.alternative')
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account?  <a href="{{ route('login_page') }}" class="text-dark ml-1"><b>Sign In</b></a></p>
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