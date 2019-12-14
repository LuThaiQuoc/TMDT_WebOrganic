@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Thành viên</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lí thành viên </h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th >Tên hiển thị</th>
                <th >Email</th>
                <th >Phone</th>
                <th>Hình ảnh</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @if(isset($users))
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <img src="{{ asset(pare_url_file($user->avatar))}}" alt="" class="img img-responsive" width="80px" height="80px">
                            </td>
                            <td>
                                <a style="padding: 5px 10px;border: 1px solid #eee;font-size: 12px" href="#"><i class="fas fa-trash-alt" style="font-size: 11px"></i>Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>
@stop