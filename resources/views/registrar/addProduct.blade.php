@extends('layouts.master')
@section('content')
@include('registrar.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="navbar navbar-light bg-white b-a mb-2">
      <center> <h1>اضافه نمودن محصول جدید</h1> </center>
      <form method="POST" action="/product" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول </label>
               <input type="text"  name="productName" class="form-control" placeholder="اسم محصول" required>
             </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">بخش </label>
                <select class="form-control" name="category" required >
                  <option value="0">انتخاب کنید</option>
                  <option value="1">پوشاک</option>
                  <option value="2">وسایل بهداشتی و آرایشی</option>
                  <option value="3">بوت و کیف</option>
                  <option value="4">سایر</option>
                </select>
              </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">مدل </label>
               <input type="text"  name="model" class="form-control" placeholder="مدل" >
             </div>
          </div>

          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">قیمت </label>
               <input type="number" max="100000" min="1" name="price" class="form-control" placeholder="قیمت " required>
             </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">تعداد </label>
               <input type="number" max="1000" min="1" name="quantity" class="form-control" placeholder="تعداد" required>
             </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">تاریخ انقضا </label>
               <input type="date"  name="expireDate" class="form-control" placeholder="تاریخ انقضا" >
             </div>
          </div>

          <div class="row form-group" >
             <div class="col-lg-12">
               <label  for="University Name" style="color:black">تصویر محصول</label>
               <input type="file" name="image" id="input-file-now" class="dropify" required=""/>
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <button type="submit" name="submit"  class="btn btn-rounded btn-success btn-lg"><li class="fa fa-save"> اضافه کردن محصول جدید </li></button>
             </div>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
</div>
@endsection
