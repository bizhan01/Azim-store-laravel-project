@extends('layouts.master')

@section('content')
  <script src="js/jquery.min.js"> </script>
  <script src="js/math.js"> </script>
  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="navbar navbar-light bg-white b-a mb-2">
<center> <h1>ثبت تدارکات (مصارف)</h1> </center>
<form method="POST" action="/expense" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-3">
              <label for="fullName" style="color: black">اسم جنس</label>
              <input type="text" name="item" value="" class="form-control" placeholder="اسم جنس" required>
            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">تاریخ</label>
              <input type="date" name="date" value=""  class="form-control"  required>
            </div>
            <div class="col-md-3">
              <label for="fullName"  style="color: black">کتگوری</label>
              <select class="form-control" name="category">
                <option value=" مواد غذایی ">مواد غذایی</optio>
                <option value=" متفرقه ">متفرقه</optio>
                <option value=" اجناس">خرید اجناس</optio>
                <option value=" ترمیمات">ترمیمات</optio>
                <option value="تبلغات ">تبلغات</optio>
                <option value="مصارف اداری ">مصارف اداری</optio>
                <option value="معاش ">معاش</optio>
                <option value="آب ">آب</optio>
                <option value=" برق">برق</optio>
                <option value="مالیه ">مالیه</optio>
                <option value="سایر ">سایر</optio>
              </select>
            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">منبع مصرف</label>
              <input type="text" name="consumer" value=""  class="form-control" placeholder="مصرف کننده" required>
            </div>
          </div>
        <div class="row form-group">
            <div class="col-md-3 ">
              <label for="fullName" style="color: black">نمبر بل</label>
              <input type="number" name="billNumber" value="" class="form-control" placeholder="نمبر بل"   required>

            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">قیمت (فی دانه)</label>
              <input type="number" name="price" value=""  id="fn"  class="form-control" placeholder="قیمت (فی دانه) "  required>
            </div>
            <div class="col-md-3">
              <label for="fullName" style="color: black">تعداد</label>
              <input type="number" min="1" name="quantity" value="" id="sn" class="form-control"  placeholder="تعداد"  required>
            </div>
            <div class="col-md-3">
              <label for="profession" style="color: black">قیمت کلی </label>
              <input type="number" name="total" value="" readonly id="mul"  class="form-control" placeholder="قیمت کلی " required>
            </div>
          </div>
          <div class="row form-group">
              <div class="col-md-6">
                <button type="submit" class="btn btn-rounded bg-flickr label-left mb-0-25 waves-effect waves-light">
                  <span class="btn-label"><i class="fa fa-save"></i></span>
                  ذخیره کردن
                </button>
              </div>
            </div>
        @include('layouts.errors')
      </form>
    </div>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
        <h4>تاریخ (ماه و سال)</h4>
    <div class=" col-lg-2 box box-block ">
      <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 310px;">
          @foreach($archives as $stats)
          <li>
            <a href="/expense/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
              {{$stats['month']. ' ' .$stats['year']}}
            </a>
           </li>
          @endforeach
            <a href="/expense">همه</a>
    </div>
  </div>
    <div class="box col-lg-10 box-block bg-white">
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>جنس</th>
            <th>تاریخ</th>
            <th>کتگوری</th>
            <th>مصرف کننده</th>
            <th>نمبر بل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>قیمت کلی</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expenses)
          <tr>
            <td>{{$expenses->id}}</td>
            <td>{{$expenses->item}}</td>
            <td>{{$expenses->date}}</td>
            <td>{{$expenses->category}}</td>
            <td>{{$expenses->consumer}}</td>
            <td>{{$expenses->billNumber}}</td>
            <td>{{$expenses->price}}</td>
            <td>{{$expenses->quantity}}</td>
            <td>{{$expenses->total}}</td>
            <td>
              <a href="{{ URL::to('expense/' . $expenses->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-rounded btn-info"> </a>
            </td>
            <td>
              <form action="{{url('expense', [$expenses->id])}}" method="POST" >
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-rounded btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $expenses->total; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="8">جمله مصارف</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
