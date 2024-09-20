<div class="row row-sm">
@foreach($products as $product)
<div class="col-md-3">
  <div class="box bg-white product product-3">
    <div class="p-img img-cover" style="background-image: url(UploadedImages/{{$product->image}});">
        <div class="float-xs-right col-lg-3 bg-warning">{{$product->id}}</div>
      <button type="submit" class="btn btn-info btn-block"><a href="/product/{{$product->id}}">توضیحات</a></button>
    </div>
    <div class="p-content">
      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">{{$product->productName}} <span style="color: blue">{{$product->model}}</span></a></h5>
        <div class="p-price float-xs-right">{{$product->price}} <span style="color: blue">افغانی</span></div>
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
@endforeach
</div>
