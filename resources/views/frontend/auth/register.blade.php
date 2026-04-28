@extends('layouts.frontend')

@section('content')

    <section class="sectionPadding imageBackground02">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="fw-bold">
                            Create your
                            <span>Global Products Corporation</span>
                            Account
                        </h2>

                        <p>
                            Create your account to manage orders,
                            quotes, saved products and more.
                        </p>
                    </div>
                </div>


                <div class="col-md-6 d-flex">

                    <div class="loginForm shadow bg-white w-100 mt-lg-5 mt-4">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form method="POST" action="{{ route('customer.register.submit') }}">

                            @csrf


                            <div class="form-group">
                                <label class="fw-bold">
                                    First Name <span>*</span>
                                </label>

                                <input type="text" name="fname" class="form-control" value="{{ old('fname') }}"
                                    placeholder="Enter first name">

                                @error('fname')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>



                            <div class="form-group">
                                <label class="fw-bold">
                                    Last Name <span>*</span>
                                </label>

                                <input type="text" name="lname" class="form-control" value="{{ old('lname') }}"
                                    placeholder="Enter last name">

                                @error('lname')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>



                            <div class="form-group">
                                <label class="fw-bold">
                                    Email ID <span>*</span>
                                </label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    placeholder="Enter email">

                                <p class="small mb-1">
                                    Your email address will be used for sign in.
                                </p>

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>



                            <div class="form-group">
                                <label class="fw-bold">
                                    Password <span>*</span>
                                </label>

                                <input type="password" name="password" class="form-control" placeholder="Create password">

                                <p class="small mb-1">
                                    Password must contain at least 8 characters.
                                </p>

                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>



                            <div class="form-group">
                                <label class="fw-bold">
                                    Confirm Password <span>*</span>
                                </label>

                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm password">

                            </div>



                            <div class="form-group mt-3">
                                <label>
                                    <input type="checkbox">
                                    Receive emails about promotions
                                </label>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="mt-3 submitBtn btn-lg btn-block customBtn01 w-100 redBg">
                                    Create Account
                                </button>
                            </div>


                            <div class="mt-lg-4 mt-3 text-center">
                                Already have an account?

                                <a href="{{ route('customer.login') }}" class="fw-bold">
                                    Sign In
                                </a>

                            </div>

                        </form>

                    </div>
                </div>



                <div class="col-md-6 d-flex">
                    <div class="loginForm shadow bg-white mt-lg-5 mt-4">

                        <h3>
                            Account Benefits:
                        </h3>

                        <ul class="mb-0 w-100 fw-semibold">
                            <li>Enjoy a faster checkout</li>
                            <li>Manage returns and cancellations</li>
                            <li>Track orders easily</li>
                            <li>Create multiple order lists</li>
                            <li>View spending insights</li>
                            <li>Receive personalized recommendations</li>
                            <li>Manage communication preferences</li>
                            <li>Convert quotes to orders</li>
                        </ul>

                        <a href="{{ route('customer.login') }}" class="text-center mt-md-5 mt-3 p-3 blueBg d-block">
                            <h5 class="mb-0 text-white">
                                Already have an account? Sign In
                            </h5>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection