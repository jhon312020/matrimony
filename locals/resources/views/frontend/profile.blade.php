@extends('layouts.front_end_form_layout')

@section('content')
   <div class="breadcrumb1">
     <ul>
        <a href="javascript:;"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">View Profile</li>
     </ul>
   </div>
   <div class="services">
      <div class="col-sm-6 login_left">
        <h1>Welcome {{$user->username}}</h1> 
        <table>
          <tr><td>Username </td><td> : {{$user->username}}</td></tr>
          <tr><td>Email </td><td> : {{$user->email}}</td></tr>
          <tr><td>Phone number </td><td> : {{$user->phone_number}}</td></tr>
          <tr><td>Date of birth </td><td> : {{date('d-m-Y',strtotime($user->date_of_birth))}}</td></tr>
        </table>
        <br/>
        <a class="btn btn-primary" href="{{asset(Request::getLocale().'/logout')}}">Logout</a>
      </div>
    <div class="clearfix"> </div>
   </div>
@endsection