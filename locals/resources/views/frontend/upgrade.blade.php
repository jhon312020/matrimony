@extends('layouts.front_end_form_layout')

@section('content')
<div class="grid_3">
  <div class="container">
   <div class="breadcrumb1">
     <ul>
        <a href="index.html"><i class="fa fa-home home_1"></i></a>
        <span class="divider">&nbsp;|&nbsp;</span>
        <li class="current-page">Upgrade</li>
     </ul>
   </div>
    @foreach ($packages as $package)
      <div class="col-md-3 pricing-table">
        <div class="pricing-table-grid">
          <h3><span class="dollar">Rs.</span>{{$package->price}}<br><span class="month1">{{$package->period}} days</span></h3>
          <ul>
            <li><span>{{$package->name}}</span></li>
          </ul>
          <form method="POST" action="{{asset(App::getLocale().'/purchase')}}">
            <input type="hidden" value="{{$package->id}}" name="package_id">
            <button type="submit" class="order-btn">Subscribe</button>
          </form>
        </div>
      </div>
    @endforeach
    <div class="clearfix"> </div>
  </div>
</div>
@endsection