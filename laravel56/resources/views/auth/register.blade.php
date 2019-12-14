@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home')}}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đăng kí</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-login my-account">
                        <form method="post" class="login" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng kí</h2>
                                <p class="form-row form-row-wide">
                                    <label for="username">Họ tên<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="name" id="username" value="" placeholder="Nguyễn Văn A" >
                                    @if($errors->has('name'))
                                        <span class="error-text">
                                        {{$errors->first('name')}}
                                         </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="username">Email<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="email" id="username" value="" placeholder="nguyenvana@gmail.com" >
                                    @if($errors->has('email'))
                                        <span class="error-text">
                                        {{$errors->first('email')}}
                                         </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="username">Địa chỉ<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="address" id="username" value="" placeholder="Điện Phước Điện Bàn Quảng Nam" >
                                    @if($errors->has('address'))
                                        <span class="error-text">
                                        {{$errors->first('address')}}
                                         </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input class="input-text" type="password" name="password" id="password" placeholder="***********"  >
                                    @if($errors->has('password'))
                                        <span class="error-text">
                                        {{$errors->first('password')}}
                                         </span>
                                    @endif
                                </p>
                                <p class="form-row form-row-wide">
                                    <label for="username">Số điện thoại<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" id="username" value="" placeholder="0705232584" >
                                    @if($errors->has('phone'))
                                        <span class="error-text">
                                        {{$errors->first('phone')}}
                                         </span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-action">
                                <p class="lost_password"> <a href="#">Lost your password?</a></p>
                                <div class="actions-log">
                                    <input type="submit" class="button" name="login" value="Đăng kí">
                                </div>
                                <label for="rememberme" class="inline">
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
