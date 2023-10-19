<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/stylesheets/loginStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="row border rounded-5 bg-white shadow box-area ">
        
           @include('layouts.leftbox')
        <div class="col-md-6 right-box">
            <div class="row align-items-center a">
                <div class="header-text mb-4   ">
                    <div class="d-flex flex-row align-items-center justify-content-center"> <img src="{{ asset('assets/images/dvc-logo.png') }} " style="width: 70px;">  
                        <h2 style="font-size: 80px; font-weight: bold; margin: 0; color: rgb(86, 86, 250);" >DVC</h2></div>
               
                        <p class="text-center mt-0 fs-5">DAVAO VISION COLLEGE</p>
                </div>
                
            </div>
            <div id="login_alert"></div>
            <form action="{{ route('login') }}" method="POST" id="login_form">
                @csrf
                @method('post')
            <div class="input-group mb-3">
                <input type="email"  name="email" id="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email":value="old('email')" required autofocus autocomplete="username">
             
           {{-- <div class="invalid-feedback"></div> --}}
            </div>
           
            <div class="input-group mb-1">
                <input type="password" name="password" id="password"   required autocomplete="current-password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                {{-- <div class="invalid-feedback"></div> --}}
               
            </div>
             <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="input-group mb-3 d-flex justify-content-between">
                <div class="form-check">
              <input type="checkbox"    class="form-check-input" id="remember_me" name="remember">
              <label for="remember_me" class="for-check-label text-secondary">Remember me</label>
            </div>
            <div class="forgot">
                <small>       @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif</small>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red"/>
            </div>
          
            <div class="input-group mb-3">  
                <button type="submit" id="login_btn" class="btn btn-lg btn-primary w-100 fs-6" >Login</button>
            </div>
        </form>
 
            <div class="row">
                <small>Don't have an Account? <a href="/register">Register</a></small>
        
            </div>
        
        </div>
        
        </div>
        
        </div>
    






    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="{{asset('js/function.js')}}"></script>
    @yield('script')
    
</body>
</html>


















