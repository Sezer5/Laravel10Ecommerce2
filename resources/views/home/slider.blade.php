<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>{{$active_slider->title}}</h1>
									<h2>{{$active_slider->title_second}}</h2>
									<p>{!!$active_slider->description!!}</p>
									<button type="button" class="btn btn-default get">{{$active_slider->button}}</button>
								</div>
								<div class="col-sm-6">
									<img src="{{Storage::url($active_slider->image)}}" class="girl img-responsive" alt="" />
									<img src="{{asset('assets')}}/user/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							@foreach ($other_slider as $rs)
								<div class="item">
								<div class="col-sm-6">
									<h1>{{$rs->title}}</h1>
									<h2>{{$rs->title_second}}</h2>
									<p>{!!$rs->description!!}</p>
									<button type="button" class="btn btn-default get">{{$rs->button}}</button>
								</div>
								<div class="col-sm-6">
									<img src="{{Storage::url($rs->image)}}" class="girl img-responsive" alt="" />
									<img src="{{asset('assets')}}/user/images/home/pricing.png"  class="pricing" alt="" />
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