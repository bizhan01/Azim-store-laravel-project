@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="navbar navbar-light bg-white b-a mb-2">
<div class="" style="padding: 50px">
  <h1>ویرایش رکورد</h1>
  <hr>
  <form action="{{url('product', [$product->id])}}" method="POST">
   <input type="hidden" name="_method" value="PUT">
      {{ csrf_field() }}

      <div class="row form-group">
         <div class="col-lg-4 col-md-4 col-sm-4">
           <label  for="Field of Study" style="color:black"> اسم محصول </label>
           <input type="text"  name="productName" value="{{$product->productName}}" class="form-control" placeholder="اسم محصول" required>
         </div>

          <input type="hidden"  name="category" value="{{$product->category}}" >

         <div class="col-lg-4 col-md-4 col-sm-4">
           <label  for="Field of Study" style="color:black">مدل </label>
           <input type="text"  name="model" value="{{$product->model}}" class="form-control" placeholder="مدل" >
         </div>

         <div class="col-lg-4 col-md-4 col-sm-4">
           <label  for="Field of Study" style="color:black">قیمت </label>
           <input type="number"  name="price" value="{{$product->price}}" class="form-control" placeholder="قیمت " required>
         </div>

      </div>

      <div class="row form-group">


         <div class="col-lg-4 col-md-4 col-sm-4">
           <label  for="Field of Study" style="color:black">تعداد </label>
           <input type="number"  name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="تعداد" required>
         </div>

         <div class="col-lg-4 col-md-4 col-sm-4">
           <label  for="Field of Study" style="color:black">تاریخ انقضا </label>
           <input type="date"  name="expireDate" value="{{$product->expireDate}}" class="form-control" placeholder="تاریخ انقضا" >
         </div>

         <div class="col-lg-4 col-md-4 col-sm-4"  style="direction: rtl">
           <label for="">اجرای عملیات</label> <br>
           <button type="submit" class="btn btn-success">بروز سازی رکورد</button>
           <button type="reset" class="btn btn-primary">لغو</button> 
         </div>

      </div>

      <input type="hidden" name="image" value="{{$product->image}}">


      @include('layouts.errors')
    </form>
  </div>
    </div>
  </div>
</div>

@endsection
