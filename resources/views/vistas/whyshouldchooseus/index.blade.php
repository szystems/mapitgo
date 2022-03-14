@extends('layouts.app')
@section('content')
    <!-- Home -->

	<div class="home">
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('mapitgo/images/contact2.jpg')}}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Why Should Choose Us</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Home</a></li>
									<li>Why should customers choose us</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Why -->

	<div class="about">
		<div class="container">
			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_title"><h3>Why should customers choose us?</h3></div>
						<div class="featured_text"><strong>Efficiency: </strong>MapItGO strives to maintain their great service by always delivering on their promises.</div>
						<div class="featured_text"><strong>Safety: </strong>Our drivers are not only trained to be aware of themselves, but also everybody else on the road. They are also trained to ensure the security of the load before departure. We ensure that everybody gets home safely. </div>
						<div class="featured_text"><strong>Professionalism: </strong>Your shipment is as important to us as it is to you. From pickup to delivery, your product will be secure and professionally handled. </div>
						<div class="featured_text"><strong>Quality: </strong>MOur drivers are fully vetted and qualified to complete the services we offer, and we all share the same goal to provide a great service. </div>
						<div class="featured_text"><strong>Service: </strong>Our customers are our number one priority. Not only will you get top-tier service, but we’ll do it with a smile. </div>
					</div>
				</div>
				<div class="col-lg-6 ">
					<div class="featured_content">
						<div class="embed-responsive embed-responsive-1by1">
							<!--<iframe class="embed-responsive-item" src="{{asset('Videos/WHYUSCUSTOMERS.mp4')}}"></iframe>-->
							<div class="embed-responsive-item">
                                <video height='100%' class="embed-responsive-item" src="{{asset('Videos/WHYUSCUSTOMERS.mp4')}}" allowfullscreen controls muted></video>
                            </div>
						</div>
						<br>
						<form align="center" action="{{ route('register') }}" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
							<button class="course_button"><span>Register</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
						</form>
					</div>
				</div>
			</div>
			<div class="row featured_row">
				<div class="col-lg-6 featured_col">
					<div class="featured_content">
						<div class="featured_title"><h3>Why should drivers choose us?</h3></div>
						<div class="featured_text"><strong>Great pay and benefits: </strong>All employees receive higher than average wages plus overtime, dental and health insurance, and paid sick leave, all starting on the first of the month after your hire date. </div>
						<div class="featured_text"><strong>Safety: </strong>Our drivers are not only trained to be aware of themselves, but also everybody else on the road. They are also trained to ensure the security of the load before departure. We ensure that everybody gets home safely. </div>
						<div class="featured_text"><strong>Flexibility: </strong>We have regional and OTR lanes to fit any driver’s home-time needs. Understanding: As truck drivers, we know what it takes. This is a job that with many responsibilities and we want to work with you to ensure that you’re happy and healthy. </div>
						<div class="featured_text"><strong>Equipment: </strong>All our units are late-model tractors with great maintenance packages. This way you’ll never have to worry about wasting downtime on a breakdown.</div>
					</div>
				</div>
				<div class="col-lg-6 ">
					<div class="featured_content">
						<div class="embed-responsive embed-responsive-1by1" controls="true">
							<!--<iframe class="embed-responsive-item" src="{{asset('Videos/WHYUSDRIVERS.mp4')}}"></iframe>-->
                            <div class="embed-responsive-item">
                                <video height='100%' class="embed-responsive-item" src="{{asset('Videos/WHYUSDRIVERS.mp4')}}" allowfullscreen controls muted></video>
                            </div>
						</div>
						<br>
						<form align="center" action="{{ route('register') }}" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
							<button class="course_button"><span>Register</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
@endsection