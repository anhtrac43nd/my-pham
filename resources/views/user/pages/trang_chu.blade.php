@extends('user.master')
@section('content')
	@include('user.slide')
	<section>
		<div class="container">
			<div class="row">
				@include('user.side_bar_left')
				
				<div class="col-md-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản Phẩm Mới</h2>
						@foreach($san_pham->chunk(4) as $chunk)
							<div class="row">
								@foreach($chunk as $key => $row)
									<div class="col-md-3">
										<div class="product-image-wrapper">
											<div class="single-products">
													<div class="productinfo text-center">
														<a href="{{route('chi_tiet_sp', ['name' => $row->ten_khong_dau, 'id' => $row->ma_sp] )}}">
															<img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="" />
															<h2>{{$row->don_gia}} VND</h2>
															<p>{{$row->ten_sp}}</p>
														</a>
														<a href="#" data-id="{{$row->ma_sp}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
													</div>

											</div>

										</div>
									</div>
								@endforeach
							</div>
						@endforeach
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach($thuong_hieu_1 as $key => $row)
									<li @if($key == 0) class="active" @endif><a href="#{{$row->ten_khong_dau}}" data-toggle="tab">{{$row->ten_thuong_hieu}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="tab-content">
							@foreach($thuong_hieu_1 as $key => $row)
								<div class="tab-pane fade @if($key == 0) active in @endif" id="{{$row->ten_khong_dau}}" >

								@foreach($row->san_pham as $row_1)
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('chi_tiet_sp', ['name' => $row_1->ten_khong_dau, 'id' => $row_1->ma_sp] )}}">
														<img src="{{asset('')}}upload/hinh_anh/{{$row_1->anh}}" alt="" />
														<h2>{{$row_1->don_gia}}</h2>
														<p>{{$row_1->ten_sp}}</p>
													</a>
													<a data-id="{{$row_1->ma_sp}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>

											</div>
										</div>
									</div>
									@endforeach
							</div>
							@endforeach


						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									@foreach($san_pham_random as $row)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<a href="{{route('chi_tiet_sp',['name' => $row->ten_khong_dau, 'id' => $row->ma_sp] )}}">
															<img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="" />
															<h2>{{$row->don_gia}}</h2>
															<p>{{$row->ten_sp}}</p>
														</a>
															<a data-id="{{$row->ma_sp}}" class="btn btn-default add-to-cart"><i class="fa
															fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
													</div>
													
												</div>
											</div>
										</div>
									@endforeach
					
								</div>
								<div class="item">	
									@foreach($san_pham_random as $row)
										<div class="col-sm-4">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														<a href="{{route('chi_tiet_sp',['name' => $row->ten_khong_dau, 'id' => $row->ma_sp] )}}">
														<img src="{{asset('')}}upload/hinh_anh/{{$row->anh}}" alt="" />
															<h2>{{$row->don_gia}}</h2>
															<p>{{$row->ten_sp}}</p>
														</a>
														<a data-id="{{$row->ma_sp}}" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
													</div>
													
												</div>
											</div>
										</div>
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