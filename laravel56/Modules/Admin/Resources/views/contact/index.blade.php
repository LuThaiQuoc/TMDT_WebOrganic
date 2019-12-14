@extends('admin::layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h2>Quản lí liên hệ</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Tiêu đề</th>
                <th style="width: 300px;">Nội dung</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>

            </tr>
            </thead>
            <tbody>
                @if (isset($contacts))
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->c_name}}</td>
                            <td>{{$contact->c_email}}</td>
                            <td>{{$contact->c_title}}</td>
                            <td>{{$contact->c_content}}</td>
                            <td>
                                @if($contact->c_status == 1)
                                    <a href="#" class="label label-success">Đã phản hồi</a>
                                @else
                                    <a href="#" class="label label-default">Chưa phản hồi</a>
                                @endif
                            </td>
                            <td>
                                <a style="padding: 5px 10px;border: 1px solid #eee;font-size: 12px" href="{{route('admin.get.action.contact',['delete',$contact->id])}} "><i class="fas fa-trash-alt" style="font-size: 11px"></i>Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
        {{$contacts ->links()}}
    </div>
@stop