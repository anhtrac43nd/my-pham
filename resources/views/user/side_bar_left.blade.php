<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Loại Sản Phẩm</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->

			@foreach($loai_san_pham as $key => $row)
				@if($key < 10)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="{{route('loai_sp',['name' => $row->ten_khong_dau, 'id' => $row->ma_loai ] )}}">{{$row->ten_loai}}</a></h4>
						</div>
					</div>
				@endif
			@endforeach

		</div><!--/category-products-->
	
		<div class="brands_products"><!--brands_products-->
			<h2>Thương Hiệu</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					@foreach($thuong_hieu as $key => $row)
						@if($key < 10)
							<li><a href="{{route('thuong_hieu',['name' => $row->ten_khong_dau, 'id' => $row->ma_thuong_hieu] )}}"> <span class="pull-right"></span>{{$row->ten_thuong_hieu}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
		</div><!--/brands_products-->
		
		<div class="shipping text-center"><!--shipping-->
			<img src="{{asset('')}}users/images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->
	
	</div>
</div>