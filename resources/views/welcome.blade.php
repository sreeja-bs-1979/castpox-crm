@extends('layouts.master')

@section('content')
    <main class="login-form">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
{{--                @else--}}
{{--                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
{{--                    @endif--}}
                @endauth
            </div>
        @endif
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card" style="margin-top:100px">
                        <h3 class="card-header text-center" style="color: brown">CASTPOX CRM</h3>
                        <div class="card-body text-center" style="background-color: #e3f2fd;">
                            <h4>Great Day!</h4>
                            <p>Welcome to CASTPOX CRM</p>

{{--                            <form method="POST" action="{{ route('login.custom') }}">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group mb-3">--}}
{{--                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required--}}
{{--                                           autofocus>--}}
{{--                                    @if ($errors->has('email'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('email') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-group mb-3">--}}
{{--                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>--}}
{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('password') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-group mb-3">--}}
{{--                                    <div class="checkbox">--}}
{{--                                        <label>--}}
{{--                                            <input type="checkbox" name="remember"> Remember Me--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="d-grid mx-auto">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-block">Signin</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="container-fluid">
        <div class="row justify-content-center" style="margin-top:250px;">
{{--            <div class="col-md-8 col-md-offset-2">--}}
                <p class="text-center">Copyright &copy; 2021 castpox.com. All rights reserved.</p>
{{--            </div>--}}
        </div>
       </div>
@endsection
