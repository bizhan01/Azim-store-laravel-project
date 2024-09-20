@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
      <div class="col-md-8">
        <div class="box bg-info user-1">
            <div class="box box-block tile tile-2 bg-info mb-2">
              <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
              <div class="t-content">
                <h1 class="mb-1">فروشگاه ملکه ثریا</h1>
                <h3 class="mb-1">ویرایش نرخ فروش (مفاد)</h3>
              </div><br>
                <div class="u-content">
                  <form action="{{url('percentage', [$percentage->id])}}" method="POST">
                     <input type="hidden" name="_method" value="PUT">
                     {{ csrf_field() }}
                     <div class="col-lg-3"></div>
                     <div class="row form-group">
                         <div class="col-md-6 ">
                           <input type="number" name="sell_percentage" value="{{$percentage->sell_percentage}}"  class="form-control"  required>
                         </div>
                      </div>
                     <br>
                    <div class="text-xs-center pb-0-5">
                        <button type="submit" class="btn btn-rounded bg-flickr label-left mb-0-25 waves-effect waves-light">
                         <span class="btn-label"><i class="fa fa-save"></i></span>
                         ذخیره سازی تغییرات
                       </button>
                    </div>
                  </form>
                </div>
              </div>
                <div class="u-counters">
                  <div class="row no-gutter">
                    <div class="col-xs-12 uc-item">
                      <a class="text-black" href="#">
                        <strong>تاریخ</strong> <br>
                        <strong><?php echo date('Y-M-D') ?></strong>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
