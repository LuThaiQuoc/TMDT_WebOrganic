@extends('layouts.app')
@section('content')

@if (Cart::count()>=1)
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá </th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1 ?>
                @foreach($products as $key => $product)
                <tr>
                    <td>#{{ $i }}</td>
                    <td><a href="">{{$product->name}}</a></td>
                    <td><img style="width: 80px;height: 60px" src="{{asset(pare_url_file($product->options->avatar))}}" alt=""></td>
                    <td>{{number_format($product->price,0,',','.')}} đ</td>
                    <td><input type="number" value="{{$product->qty}}" min="1" max="5" onchange="updateCart(this.value,'{{$product->rowId}}')" style="width:40px !important;text-align: center;border-radius: 5px;"></td>
                    <td>{{number_format($product->price *$product->qty,1,',','.')}} đ</td>
                    <td>
                        <a href="{{ route('delete.shopping.cart', $key) }}"><i class="fa fa-trash-o"></i> Xóa</a>
                    </td>
                </tr>
                 <?php $i ++ ?>
                @endforeach
                </tbody>
            </table>
            <h3 class="pull-right">Tổng tiền cần thanh toán : {{Cart::subtotal()}} <a class="btn btn-success" href="{{route('get.form.pay')}}">Thanh toán</a> </h3>
        </div>
    </div>
    @else
    <div>
        <div class="area-title">
            <h2>Giỏ hàng của bạn rỗng !</h2>
        </div>
    </div>

@endif
@stop

@section('script')
    <script>
        function updateCart(qty,rowId) {
            $.get(
                '{{asset('shopping/update')}}',
                {qty:qty,rowId:rowId},
                function () {
                    location.reload();
                }
            );
        }
    </script>
@stop