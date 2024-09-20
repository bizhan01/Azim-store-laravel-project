@extends('layouts.master')
@section('content')
@include('registrar.aside')
<div class="colorlib-menu">
  <div class="container">
    <div class="row">
      <br></br>
      <center>
        <h2>لیست اجناس موجود در فروشگاه ملکه ثریا</h2>
      </center>
      <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 animate-box">
        <center>
        <div class="row">
          <div class="col-md-12 text-center">
              <a href="#main" aria-controls="mains" role="tab" data-toggle="tab"> <button type="button" class="btn btn-rounded btn-success">همه</button></a>
              <a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab"><button type="button" class="btn btn-rounded btn-primary">پوشاک</button></a>
             <a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab"><button type="button" class="btn btn-rounded btn-info">وسایل آرایشی / بهداشتی</button></a>
             <a href="#bags" aria-controls="drinks" role="tab" data-toggle="tab"><button type="button" class="btn btn-rounded btn-warning">کیف و بوت</button></a>
             <a href="#other" aria-controls="drinks" role="tab" data-toggle="tab"><button type="button" class="btn btn-rounded btn-danger">سایر</button></a>
          </div>
        </div>
      </center>
        <div class="tab-content">

            <!-- ّfood list -->
          <div role="tabpanel" class="tab-pane active" id="main">
            @include('registrar/all')
         </div>

          <!-- Cookies list -->
          <div role="tabpanel" class="tab-pane" id="desserts">
              @include('registrar/cloths')
          </div>

          <!-- Drinks list -->
          <div role="tabpanel" class="tab-pane" id="drinks">
              @include('registrar/beautyTools')
          </div>

          <!-- Drinks list -->
          <div role="tabpanel" class="tab-pane" id="bags">
              @include('registrar/bags')
          </div>

          <!-- Drinks list -->
          <div role="tabpanel" class="tab-pane" id="other">
              @include('registrar/other')
          </div>

        </div>
      </div>
    </div>


  </div>
</div>
@endsection
