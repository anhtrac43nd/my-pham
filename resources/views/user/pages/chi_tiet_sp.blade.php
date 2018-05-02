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
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('')}}upload/hinh_anh/{{$san_pham->anh}}" alt="">
								<!-- <h3>ZOOM</h3> -->
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								@if($san_pham->phan_tram_khuyen_mai > 0)
								<div class="newarrival lb_sale"><span>Sale {{$san_pham->phan_tram_khuyen_mai}}%</span></div>
								@endif
								<h2>{{$san_pham->ten_sp}}</h2>
								<p>Số lượng: {{$san_pham->so_luong}}</p>
								<!-- <img src="{{asset('')}}users/images/product-details/rating.png" alt=""> -->
								<span>

                                    @if($san_pham->phan_tram_khuyen_mai > 0)
                                        <span style="text-decoration: line-through;">
                                        {{$san_pham->don_gia}} VND
                                        </span>
                                        <div style="clear: both"></div>
									<span >Giá khuyến mại: {{$san_pham->gia_khuyen_mai}} VND</span>
                                    @else
                                        <span>
                                        {{$san_pham->don_gia}} VND
                                        </span>
                                        <div style="clear: both"></div>
                                    @endif
									<div style="clear: both"></div>
									<label>Đặt:</label>
									<input type="text" value="0">
									<button type="button" class="btn btn-fefault cart" id="add_to_cart" data-id="{{$san_pham->ma_sp}}">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</button>
								</span>
								<p><b>Trạng thái:</b> @if($san_pham->so_luong > 0) Còn hàng @else Hết hàng @endif</p>
								<!-- <p><b>Condition:</b> New</p> -->
								<p><b>Thương Hiệu:</b> {{$san_pham->thuongHieu->ten_thuong_hieu}}</p>
								<a href=""><img src="{{asset('')}}users/images/product-details/share.png" class="share img-responsive" alt=""></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#mota" data-toggle="tab">Mô Tả Sản Phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">


							<div class="tab-pane fade active in" id="mota">
								<div class="col-sm-12">
									{!! $san_pham->mo_ta !!}
								</div>
							</div>

						</div>
					</div><!--/category-tab-->

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Gợi ý sản phẩm</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($san_pham_random as $row)
										<a href="{{route('chi_tiet_sp',['name' => $row->ten_khong_dau, 'id' => $row->ma_sp] )}}">
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="">
														<h2>{{$row->don_gia}} VND</h2>
														<p>{{$row->ten_sp}}</p>
														<a data-id="{{$row->ma_sp}}" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
													</div>
												</div>
											</div>
										</div>
										</a>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
@endsection