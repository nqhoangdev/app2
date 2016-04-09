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
        <div class="btn btn-success col-md-2 col-md-offset-3">LOGIN</div>
        <!--        <div class="col-md-1"></div>-->
        <div class="btn btn-success col-md-2 col-md-offset-2">SIGN UP</div>
    </div>
</div>

@endsection