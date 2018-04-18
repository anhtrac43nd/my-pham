	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{route('trangChu')}}"><img src="{{asset('')}}users/images/home/logo.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{route('gioHang')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								@if(!Session::get('nguoi_dung'))
									<li><a href="{{route('dangKy')}}"><i class="fa fa-user"></i> Đăng ký</a></li>
									<li><a href="{{route('dangNhap')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								@else
									<li><a id="disable_a" href="">Xin chào @php echo Session::get('nguoi_dung.ten_nd') @endphp </a></li>
									<li><a href="{{route('dangXuat')}}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('trangChu')}}" class="active">Trang Chủ</a></li>
								<li class="dropdown"><a href="#">Loại Sản Phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($loai_san_pham as $row)
											<li><a href="{{route('loai_sp', $row->ten_khong_dau)}}">{{$row->ten_loai}}</a></li>
										@endforeach
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Thương Hiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($thuong_hieu as $row)
                                        	<li><a href="{{route('thuong_hieu', $row->ten_khong_dau)}}">{{$row->ten_thuong_hieu}}</a></li>
										@endforeach

                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form id="frm_search" action="{{route('timKiem')}}" method="get">
								<input type="text" id="search" name="key" placeholder="Search"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->