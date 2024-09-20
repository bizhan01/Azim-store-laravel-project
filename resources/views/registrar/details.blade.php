@extends('layouts.master')
@section('content')
@include('registrar.aside')
<div class="row row-sm">
  <div class="col-lg-3"></div>
<div class="col-md-5">
  <div class="box bg-white product product-3">
    <div class="p-img img-cover" style="background-image: url(/UploadedImages/{{$product->image}});">
    </div>
    <div class="p-content">
      <center><h3>توضیحات کامل محصول</h3></center> <hr>
      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">اسم محصول:</a></h5>
        <h5 class="p-price float-xs-right">{{$product->productName}}</h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">سریال نمبر محصول:</a></h5>
        <h5 class="p-price float-xs-right">{{$product->id}}</h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">مدل:</a></h5>
        <h5 class="p-price float-xs-right">{{$product->model}}</h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">قیمت:</a></h5>
        <h5 class="p-price float-xs-right">{{$product->price}} <span style="color: blue">افغانی</span></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">تعداد:</a></h5>
        <h5 class="p-price float-xs-right">{{$product->quantity}}</h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">تاریخ انقضا:</a></h5>
         <h5 class="p-price float-xs-right">{{$product->expireDate}}</h5>
      </div>

      <div class="p-info">
        <h5 class="float-xs-left"><a class="fa fa-edit"  href="{{ URL::to('product/' . $product->id . '/edit') }}"></a></h5>
        <div class="p-price float-xs-right">
          <form action="{{url('product', [$product->id])}}" method="POST" >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit"  onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

@endsection
