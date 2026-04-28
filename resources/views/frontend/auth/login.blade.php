@extends('layouts.frontend')

@section('content')

    <section class="sectionPadding imageBackground02">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-7 col-md-9">

                    <div class="loginBlock m-auto">

                        <div class="text-center mb-4">
                            <h2 class="fw-bold">
                                Welcome Back
                            </h2>

                            <p>
                                Sign in to access your orders, quotes,
                                saved products and account preferences.
                            </p>
                        </div>



                        <div class="loginForm shadow bg-white mt-lg-4 mt-3">

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif



                            <form method="POST" action="{{ route('customer.login.submit') }}">

                                @csrf


                                <div class="form-group mb-3">
                                    <label class="fw-bold">
                                        Email Address <span>*</span>
                                    </label>

                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter your email" required>

                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>



                                <div class="form-group mb-3">
                                    <label class="fw-bold">
                                        Password <span>*</span>
                                    </label>

                                    <input type="password" name="password" class="form-control" placeholder="Enter password"
                                        required>

                                    @error('password')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>



                                <div class="form-group d-flex justify-content-between align-items-center mt-2 mb-3">

                                    <div>
                                        <label class="mb-0">
                                            <input type="checkbox" name="remember" value="1">
                                            Keep me signed in
                                        </label>
                                    </div>

                                    <div>
                                        <a href="{{ route('password.request') }}" class="fw-semibold">
                                            Forgot Password?
                                        </a>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <button type="submit" class="mt-2 submitBtn btn-lg btn-block customBtn01 w-100 redBg">
                                        Sign In
                                    </button>
                                </div>



                                <div class="mt-4 text-center">
                                    Don’t have an account?

                                    <a href="{{ route('customer.register') }}" class="fw-bold">
                                        Create One
                                    </a>

                                </div>


                            </form>

                        </div>



                        <div class="loginForm shadow bg-white p-0 border-0 mt-3">

                            <a href="{{ route('customer.register') }}" class="text-center p-3 blueBg d-block">

                                <h5 class="mb-0 text-white">
                                    New User? Get Registered
                                </h5>

                            </a>

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection