@extends('admin::layouts.master')
@section('content')
    <style>
        .rating .active {color:#ff9705 !important; }
    </style>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Sản phẩm</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" action="" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tên sản phẩm ...." name="name" value="{{ Request::get('name') }}">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control">
                        <option value="" >Danh mục</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{Request::get('cate') == $category->id ? "selected='selected'" : ""}}>{{$category->c_name}}</option>
                            @endforeach    
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <h2>Quản lí sản phẩm <a href="{{route('admin.get.create.product')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Loại Sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Nổi bật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            @if( isset($products))
                @foreach($products as $product)
                    <?php
                        $age = 0;

                        if ($product->pro_total_rating)
                            {
                               $age =round( $product->pro_total_number / $product->pro_total_rating,2);
                            }
                    ?>
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->pro_name}}
                            <ul style="padding-left: 15px">
                                <li> <span>Giá tiền :</span><span>{{number_format($product->pro_price)}} VNĐ</span></li>
                                <li> <span>Giảm giá :</span><span>{{$product->pro_sale}} (%)</span></li>
                                <li><span>Đánh giá:</span>
                                    <span class="rating">
                                        @for ($i =1 ; $i <=5; $i++)
                                            <i class="fa fa-star {{$i <= $age ? 'active' : ''}}" style="color: #999;"></i>
                                        @endfor
                                    </span>
                                    <span>{{$age}}</span>
                                </li>
                                <li><span>Số lượng :</span> <span>{{$product->pro_number}}</span></li>
                            </ul>
                        </td>
                        <td>{{isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}}</td>
                        <td>
                            <img src="{{ asset(pare_url_file($product->pro_avatar))}}" alt="" class="img img-responsive" width="80px" height="80px">
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="label {{$product->getStatus($product->pro_active)['class']}}">{{$product->getStatus($product->pro_active)['name']}}</a>
                        </td>
                        <td>
                            <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="label {{$product->getHot($product->pro_hot)['class']}}">{{$product->getHot($product->pro_hot)['name']}}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #eee;font-size: 12px" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pen" style="font-size: 11px"></i> Cập nhật</a>
                            <a style="padding: 5px 10px;border: 1px solid #eee;font-size: 12px" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt" style="font-size: 11px"></i>Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$products ->links()}}
    </div>
@stop