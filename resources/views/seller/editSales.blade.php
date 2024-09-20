@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="navbar navbar-light bg-white b-a mb-2">
       <center><h3>محاسبه فاکتور</h3>
         @foreach($percentages as $percentage)
            <h4> نرخ مفاد وضع شده: {{$percentage->sell_percentage}} فیصد</h4>
         @endforeach
       </center>
      <hr>
      <form action = "/edit/<?php echo $sales[0]->id; ?>" method = "post" enctype="multipart/form-data" >
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <table class="table table-bordered table-striped mb-2">
            <tr>
               <th>محصول</th>
               <th>قیمت</th>
               <th>تعداد</th>
               <th>قابل پرداخت</th>
            </tr>
              <?php $sum=0; ?>
              @foreach($sales_info as $sInfo)
            <tr>
               <td>{{$sInfo->productName}}</td>
               <td>
                 <?php
                      $main_cost = $sInfo->price;
                      $profit = $percentage->sell_percentage;
                      $x = ($main_cost * $profit) / 100;
                      $payable = $main_cost + $x;
                      print ("$payable");
                   ?>
               </td>
               <td>{{$sInfo->product_qty}}</td>
               <td>{{$payable * $sInfo->product_qty}}   </td>
            </tr>
                <?php $sum += $payable * $sInfo->product_qty; ?>
          @endforeach

          <tr>
             <td>
               <div class="input-daterange input-group">
                  <span class="input-group-addon bg-info b-0 text-white">قیمت کلی</span>
                  <input type = 'text' readonly name = 'total' class="form-control"   value = '<?php echo $sum; ?>'/>
                </div>
             </td>
             <td colspan="2">
               <div class="input-daterange input-group">
                  <span class="input-group-addon bg-info b-0 text-white">وضع تخفیف</span>
                    <select name="discount" class="form-control">
                      <option value="0">فیصدی تخفیف را تعیین کنید</option>
                      <option value="5">%5</option>
                      <option value="10">%10</option>
                      <option value="15">%15</option>
                      <option value="20">%20</option>
                  </select>
                </di>
             </td>
                <input type = 'hidden' name = 'payable' class="form-control"  value = '<?php echo$sales[0]->payable; ?>'/>
             <td>
               <button type="submit" class="btn btn-info label-left  mr-0-5 ">
                 <span class="btn-label"><i class="ti-printer"></i></span>
                بروز رسانی
             </button>
             </td>
          </tr>
         </table>
        <br></br>
      </form>
   </div>
 </div>
</div>
@endsection
