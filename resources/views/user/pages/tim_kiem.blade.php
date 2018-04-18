@extends('user.master')
@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="{{asset('')}}users/images/shop/advertisement.jpg" alt="">
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                @include('user.side_bar_left')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Tìm kiếm </h2>
                        @foreach($san_pham as $row)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{route('chi_tiet_sp', $row->ten_khong_dau)}}">
                                                <img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="" />
                                                <h2>{{$row->don_gia}} VND</h2>
                                                <p>{{$row->ten_sp}}</p>
                                            </a>
                                            <a data-id="{{$row->ma_sp}}" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div><!--features_items-->
                    {{$san_pham->links()}}

                </div>
            </div>
        </div>
    </section>
@endsection