@extends('user.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody id="data_cart">
                    @foreach($gio_hang as $key => $row)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img width="100px" src="{{asset('')}}upload/hinh_anh/{{$row['anh']}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$row['ten_sp']}}</a></h4>
                                <p>Mã sản phẩm: {{$row['ma_sp']}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{$row['gia']}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button" data-id="{{$key}}" >
                                    <a class="cart_quantity_up" href="" data-id="{{$key}}"> + </a>
                                    <input class="cart_quantity_input" data-id="{{$key}}" type="text" name="quantity" value="{{$row['so_luong']}}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" data-id="{{$key}}" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$row['thanh_tien']}} VNĐ</p>
                            </td>
                            <td class="cart_delete">
                                <a data-id="{{$key}}" class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="cart_product">
                                
                            </td>
                            <td class="cart_description">
                                
                            </td>
                            <td class="cart_price">
                            </td>
                            <td class="cart_quantity">
                                <h4>Tổng tiền</h4>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$tong_tien}} VND</p>
                            </td>
                            <td class="cart_delete">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            {{--<div class="heading">--}}
                {{--<h3>What would you like to do next?</h3>--}}
                {{--<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <a id="datHang" class="btn btn-default update" href="">Đặt hàng</a>
                </div>
            </div>

        </div>
    </section>
@endsection