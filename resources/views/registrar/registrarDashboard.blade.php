@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-lg-4 col-md-4 col-sm-4"> </div>
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
                <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
            <p class="text-muted pb-0-5">ثبت کننده</p>
            <div class="text-xs-center pb-0-5">
              <button type="submit" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل </button>
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
    </div>


    <div class="row row-md">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-info mb-2">
          <div class="t-icon right"><i class="fa fa-save"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$productCount}}</h1>
            <h6 class="text-uppercase">جمله محصولات ثبت شده</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-success mb-2">
          <div class="t-icon right"><i class="fa fa-save"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$products}}</h1>
            <h6 class="text-uppercase"> محصولات ثبت شده ماه جاری</h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-warning mb-2">
          <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$soldProducts}}</h1>
            <h6 class="text-uppercase">محصولات فروخته شده </h6>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-danger mb-2">
          <div class="t-icon right"><i class="fa  fa-ban"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$xp}}</h1>
            <h6 class="text-uppercase">محصولات تاریخ گذشته</h6>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
