<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Loại Sản Phẩm</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Sportswear
						</a>
					</h4>
				</div>
				<div id="sportswear" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="#">Nike </a></li>
							<li><a href="#">Under Armour </a></li>
							<li><a href="#">Adidas </a></li>
							<li><a href="#">Puma</a></li>
							<li><a href="#">ASICS </a></li>
						</ul>
					</div>
				</div>
			</div>
			@foreach($loai_san_pham as $key => $row)
				@if($key < 10)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a href="{{route('loai_sp', $row->ten_khong_dau)}}">{{$row->ten_loai}}</a></h4>
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
							<li><a href="{{route('thuong_hieu', $row->ten_khong_dau)}}"> <span class="pull-right"></span>{{$row->ten_thuong_hieu}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
		</div><!--/brands_products-->
		
		<div class="price-range"><!--price-range-->
			<h2>Price Range</h2>
			<div class="well text-center">
				 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
			</div>
		</div><!--/price-range-->
		
		<div class="shipping text-center"><!--shipping-->
			<img src="{{asset('')}}users/images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->
	
	</div>
</div>