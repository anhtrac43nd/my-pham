<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach($slide as $key => $row)
						<li data-target="#slider-carousel" data-slide-to="{{$key}}" class="@if($key == 0) active @endif"></li>
						@endforeach
					</ol>
					
					<div class="carousel-inner">
						@foreach($slide as $key => $row)
							<div class="item @if($key == 0) active @endif">
								<div class="col-sm-6">
									<h1><span>{{$row->ten_slide}}</span></h1>
									<h2>{{ $row->noi_dung }}</h2>
									{{--<p>empor incididunt ut labore et dolore magna aliqua. </p>--}}
									{{--<button type="button" class="btn btn-default get">Get it now</button>--}}
								</div>
								<div class="col-sm-6">
									<img src="{{asset('')}}upload/slide/{{$row->anh}}" class="girl img-responsive" alt="" />
									{{--<img src="{{asset('')}}users/images/home/pricing.png"  class="pricing" alt="" />--}}
								</div>
							</div>
						@endforeach
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->