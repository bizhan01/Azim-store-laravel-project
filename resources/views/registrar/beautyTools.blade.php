<div class="row row-sm">
@foreach($beautyTools as $product)
<div class="col-md-3">
  <div class="box bg-white product product-3">
    <div class="p-img img-cover" style="background-image: url(UploadedImages/{{$product->image}});">
      <button type="submit" class="btn btn-primary btn-block">Add to cart</button>
    </div>
    <div class="p-content">
      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">{{$product->productName}} <span style="color: blue">{{$product->model}}</span></a></h5>
        <div class="p-price float-xs-right">{{$product->price}} <span style="color: blue">افغانی</span></div>
      </div>

      <div class="p-info">
        <h5 class="float-xs-left"><a class="text-black" href="#">{{$product->expireDate}}</a></h5>
        <div class="p-price float-xs-right"><span style="color: blue">تعداد</span> {{$product->quantity}} </div>
      </div>

    </div>
  </div>
</div>
@endforeach
</div>
