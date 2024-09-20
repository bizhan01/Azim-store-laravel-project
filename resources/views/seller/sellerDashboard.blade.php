@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
                <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5><br>
            <p class="text-muted pb-0-5">فروشنده</p><br>
            <div class="text-xs-center pb-0-5">
              <!-- <button type="submit" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل </button> -->
              <!-- <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button> -->
              <a  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box bg-info user-1">
          <div class="box box-block tile tile-2 bg-info mb-2">
          <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
          <div class="t-content">
            <h1 class="mb-1">فروشگاه ملکه ثریا</h1>
            <h3 class="mb-1">مدیریت فروشات</h3>
          </div>
            <div class="u-content">
              <span class="avatar box-32">
                <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="height: 100px; width: 100px">
              </span>
              <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
              <h6 class="text-uppercase">فروشنده</h6><br>
              <div class="text-xs-center pb-0-5">
                <form method="POST" action="/sales" enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <input type="hidden" name="total" value="0">
                 <input type="hidden" name="discount" value="0">
                 <input type="hidden" name="payable" value="0">
                 <!-- <button type="submit" class="btn btn-lg btn-primary btn-rounded mr-0-5 bg-flickr  mb-0-25 waves-effect waves-light">اجرای فروش جدید</button> -->
                 <button type="submit" class="btn btn-rounded bg-flickr label-left mb-0-25 waves-effect waves-light">
                   <span class="btn-label"><i class="ti-shopping-cart-full"></i></span>
                   اجرای فروش جدید
                 </button>
              </form>
              </div>
            </div>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
