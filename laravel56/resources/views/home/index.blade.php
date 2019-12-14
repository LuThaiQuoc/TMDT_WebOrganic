@extends('layouts.app')
@section('content')
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <style>
        .active {
        color: #ff9705 !important;
        }

    </style>
<!-- Add your site or application content here -->
<!-- header area start -->
    <!-- header area end -->
    <!-- start home slider -->
    <div class="slider-area an-1 hm-1">
        <!-- slider -->
        <div class="bend niceties preview-2"  >
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset('img/slider/home-1/bn2.jpg')}}" alt="" title="#slider-direction-1"  />
                <img src="{{asset('img/slider/home-1/bn3.jpg')}}"  alt="" title="#slider-direction-2" />
                <img src="{{asset('img/slider/home-1/bn1.jpg')}}" alt="" title="#slider-direction-3"/>
            </div>
            <!-- direction 1 -->
{{--            <div id="slider-direction-1" class="t-cn slider-direction">--}}
{{--                <div class="slider-progress"></div>--}}
{{--                <div class="slider-content t-cn s-tb slider-1">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- direction 2 -->--}}
{{--                    <div id="slider-direction-2" class="slider-direction">--}}
{{--                        <div class="slider-progress"></div>--}}
{{--                        <div class="slider-content t-lfl s-tb slider-2 lft-pr">--}}
{{--                            <div class="title-container s-tb-c">--}}
{{--                                <h2 class="title1">minimal bags</h2>--}}
{{--                                <h3 class="title2" >collection</h3>--}}
{{--                                <h4 class="title2" >Simple is the best.</h4>--}}
{{--                                <a class="btn-title" href="">View collection</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
        </div>
        <!-- slider end-->
    </div>
    <!-- end home slider -->
    @if (isset($productHot))
        <div class="our-product-area new-product">
            <div class="container">
                <div class="area-title">
                    <h2>Sản Phẩm Mới</h2>
                </div>
                <!-- our-product area start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="features-curosel">
                                <!-- single-product start -->
                                @foreach($productHot as $hot)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">
                                            <div class="product-img">
                                                @if($hot->pro_number == 0)
                                                <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết hàng</span>
                                                @endif
                                                @if($hot->pro_sale)
                                                <span style="position: absolute;font-size: 12px;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 2px 7px;color: white;right: 5px">{{$hot->pro_sale}} %</span>
                                                @endif

                                                <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}">
                                                    <img class="primary-image" src="{{asset(pare_url_file($hot->pro_avatar))}}" style="width: 270px;height: 270px;" alt="" />

                                                </a>
                                                <div class="action-zoom">
                                                    <div class="add-to-cart">
                                                        <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="action-buttons">
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="{{route('add.shopping.cart',$hot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="quickviewbtn">
                                                            <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($hot->pro_price,0,',','.')}}đ</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h2 class="product-name" style="font-size: 14px;color: #333;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;text-overflow: ellipsis;overflow: hidden;"><a href="#">{{$hot->pro_name}}</a></h2>
                                                <p style="overflow: hidden;white-space: normal;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;font-size: 12px;color: #333;">{{$hot->pro_description}}</p>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                            <!-- single-product end -->
                                <!-- single-product start -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- our-product area end -->
            </div>
        </div>
    @endif
    <!-- product section end -->
    <!-- latestpost area start -->
    @if (isset($articleNews))
        <div class="latest-post-area">
            <div class="container">
                <div class="area-title">
                    <h2>Bài Viết Mới</h2>
                </div>
                <div class="row">
                    <div class="all-singlepost">
                        <!-- single latestpost start -->
                        @foreach($articleNews as $arNew)
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="single-post" style="margin-bottom: 10px">
                                    <div class="post-thumb">
                                        <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}">
                                            <img src="{{asset(pare_url_file($arNew->a_avatar))}}" alt="" style="width: 370px;height: 280px" />
                                        </a>
                                    </div>
                                    <div class="post-thumb-info">
                                        <div class="post-time">
                                            <a href="#">Beauty</a>
                                            <span>/</span>
                                            <span>Post by</span>
                                            <span>BootExperts</span>
                                        </div>
                                        <div class="postexcerpt">
                                            <p style="height: 40px">{{ $arNew->a_name }}</p>
                                            <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single latestpost end -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- latestpost area end -->
    <!-- block category area start -->
    <div class="block-category">
        <div class="container">
            <div class="row">
                <!-- featured block start -->
                @if (isset($categoriesHome))
                    @foreach($categoriesHome as $categoriHome)
                            <div class="col-md-4">
                                <!-- block title start -->
                                <div class="block-title">
                                    <h2>{{$categoriHome->c_name}}</h2>
                                </div>
                                <!-- block title end -->
                                <!-- block carousel start -->
                                @if(isset($categoriHome->products))
                                <div class="block-carousel">
                                    @foreach($categoriHome->products as $product)
                                        <?php
                                        $ageDetail = 0;

                                        if ($product->pro_total_rating)
                                        {
                                            $ageDetail =round( $product->pro_total_number / $product->pro_total_rating,2);
                                        }
                                        ?>
                                    <div class="block-content">
                                        <!-- single block start -->
                                        <div class="single-block">
                                            <div class="block-image pull-left">
                                                <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}"><img src="{{pare_url_file($product->pro_avatar)}}" style="height: 210px;width: 170px;" alt="" /></a>
                                            </div>
                                            <div class="category-info">
                                                <h3 style="font-size: 14px;color: #333;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;text-overflow: ellipsis;overflow: hidden;"><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h3>
                                                <p style="overflow: hidden;white-space: normal;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;font-size: 12px;color: #333;">{{$product->pro_description}}</p>
                                                <div class="cat-price">{{number_format($product->pro_price,0,',','.')}}đ<span class="old-price">{{number_format($product->pro_price,0,',','.')}}đ</span></div>
                                                <div class="cat-rating">
                                                    @for($i =1 ; $i <= 5; $i++)
                                                        <a href="#"><i class="fa fa-star {{$i <= $ageDetail ? 'active' : ''}}"></i></a>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single block end -->
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <!-- block carousel end -->
                            </div>
                    @endforeach
                @endif
                <!-- featured block end -->
            </div>
        </div>
    </div>
    <!-- block category area end -->
    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>BootExperts</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>Lavoro Store!</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>
                            <span>MR Selim Rana</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
    <!-- FOOTER START -->
@stop