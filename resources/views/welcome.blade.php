@extends('master')

@section('title', 'Welcome Page')

@section('content')


<div class="container">
    <div class="row">
        <h1 class="text-center">
            T-SHIRT Ads Manager
        </h1>
    </div>

   <div class="row">
       <img src="{!! asset('icon.jpg') !!}" alt="" class="center-block">
   </div>
   
    <div class="row">
        <a href="{!! action('Auth\AuthController@getRegister') !!}" class="btn btn-success col-sm-offset-3 col-sm-2">LOG IN</a>
        <a href="{!! action('Auth\AuthController@getRegister') !!}" class="btn btn-success col-sm-offset-2 col-sm-2">SIGN UP</a>
        <!--        <div class="col-md-1"></div>-->
    </div>
</div>

@endsection