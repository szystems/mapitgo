@extends('layouts.app')

@section('content')

    <!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item">
					<!-- Background image artist https://unsplash.com/@benwhitephotography -->
					<div class="home_slider_background" style="background-image:url({{asset('mapitgo/images/index3.jpg')}})"></div>
					<div class="home_container" >
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content text-center">
										<div class="home_logo"><img src="{{asset('mapitgo/images/portadalogo2.png')}}" alt=""></div>
										<div class="home_text">
											<!--<div class="home_title">Map It Go!</div>
											<div class="home_subtitle">Text</div>-->
										</div>
										<div class="home_buttons">
										<div class="button home_button"><a href="{{ route('login') }}">Login<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
											<div class="button home_button"><a href="{{ route('register') }}">Register<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- End Slider Item -->
				

			</div>
		</div>
	</div>

	
@endsection
