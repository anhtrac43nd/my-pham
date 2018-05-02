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
				
				<div class="col-md-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Loại Sản Phẩm {{$lsp->ten_loai}}</h2>
						@foreach($san_pham->chunk(4) as $chunk)
							<div class="row">
								@foreach($chunk as $key => $row)
									<div class="col-md-3">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<a href="{{route('chi_tiet_sp',['name' => $row->ten_khong_dau, 'id' => $row->ma_sp] )}}">
														<img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="" />
															@if($row->phan_tram_khuyen_mai > 0)
																<h2>{{$row->gia_khuyen_mai}}</h2>
															@else
																<h2>{{$row->don_gia}}</h2>
															@endif
															<p>{{$row->ten_sp}}</p>
														</a>
														<a data-id="{{$row->ma_sp}}" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
													</div>
													@if($row->phan_tram_khuyen_mai > 0)
														<div class="new lb_sale"><span>Sale {{$row->phan_tram_khuyen_mai}}%</span></div>
													@endif

											</div>

										</div>
									</div>
								@endforeach
							</div>
						@endforeach

					</div><!--features_items-->
					{{$san_pham->links()}}
				</div>
			</div>
		</div>
	</section>
@endsection