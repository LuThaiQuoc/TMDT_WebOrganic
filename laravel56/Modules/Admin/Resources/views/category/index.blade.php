@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lí danh mục <a href="{{route('admin.get.create.category')}}" class="pull-right">Thêm mới</a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Title Seo</th>
                    <th>Trang chủ</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if( isset($categories))
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->c_name}}</td>
                            <td>{{$category->c_title_seo}}</td>
                            <td>
                                <a href="{{route('admin.get.action.category',['home',$category->id])}}" class="label {{$category->getHome($category->c_home)['class']}}">{{$category->getHome($category->c_home)['name']}}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.get.action.category',['active',$category->id])}}" class="label {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.get.edit.category',$category->id)}}">Edit</a>
                                <a href="{{route('admin.get.action.category',['delete',$category->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
@stop