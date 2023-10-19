@extends('layouts.appauth')
@section('title','Registration')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row border m-2 rounded-5 bg-white shadow box-area ">
    
        @include('layouts.leftbox')
    <div class="col-md-6 right-box">
        <div class="row align-items-center">
            <div class="header-text mb-1">
                <div class="d-flex flex-row align-items-center justify-content-center"> <img src="{{ asset('assets/images/dvc-logo.png') }} " style="width: 70px;">  
                    <h2 style="font-size: 80px; font-weight: bold; margin: 0; color: rgb(86, 86, 250);" >DVC</h2></div>
           
                    <p class="text-center mt-0 fs-5">REGISTER</p>
            </div>
            
        </div>
        <div id="show_success_alert"></div>
        <form action="{{ route('register') }}" method="POST" id="register_form">
            @csrf
            @method('post')
         
            <div class="input-group mb-3 row align-items-end">
              <div class="col-12 align-self-end">  <input type="text" name="name" id="name" autocomplete="username" class="form-control form-control bg-light fs-6" placeholder="Full name"  :value="old('name')" required autofocus autocomplete="name" ></div>
                <div class="col-12"><x-input-error :messages="$errors->get('name')" class="mt-2" /></div>
           <div class="invalid-feedback fs-sm"></div>
            </div>
            <div class="input-group mb-3 row">
                <div class="col-12">
                    <input type="email" name="email" id="email" autocomplete="email" class="form-control form-control bg-light fs-6 " placeholder="Email Address" :value="old('email')" required autocomplete="username">
                </div>
               
               <div class="col-12"> <x-input-error :messages="$errors->get('email')" class="" /></div>
                <div class="invalid-feedback"></div>
            </div>
            <div class="input-group mb-3 row">
               <div class="col-12"> <input type="password" name="password" id="password" autocomplete="new-password" class="form-control form-control bg-light fs-6" placeholder="Password"required ></div>
            <div class="col-12">    <x-input-error :messages="$errors->get('password')" class="mt-2" /></div>
                <div class="invalid-feedback"></div>
            </div>
            <div class="input-group mb-4 row">
              <div class="col-12">
                <input type="password"     name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="form-control form-control bg-light fs-6" placeholder="Re-enter password" required>
              </div>
               
          <div class="col-12">      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /></div>
                <div class="invalid-feedback"></div>
            </div>
          
        <div class="input-group mb-4">
            <input type="submit" id="register_btn" value="Register" class="btn btn-lg btn-primary w-100 fs-6">
        </div>
    </form>
        <div class="row">
           
    
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
   
    
        </div>
    
    </div>
    
    </div>
    
    </div>
    
@endsection

@section('script')
{{-- <script>
    $(function(){
     $("#register_form").submit(function(e){
        e.preventDefault();
        $("#register_btn").val('Please Wait...');
        $.ajax({
            url:'{{ route('auth.register') }}',
            method:'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
                if(res.status == 400){
                    showError('username',res.messages.username);
                    showError('email',res.messages.email);
                    showError('password',res.messages.password);
                    showError('cpassword',res.messages.cpassword);
                    $("#register_btn").val('Register');
                }else if(res.status == 200){
                    $("#show_success_alert").html(showMessage('success',res.messages));
                    $("#register_form")[0].reset();
                    removeValidationClasses("register_form");
                    $("#register_btn").val('Register');
                }
            }
        });
      });
    });
</script> --}}

@endsection