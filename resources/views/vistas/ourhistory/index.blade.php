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
							<div class="home_title">Our History</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Home</a></li>
									<li>Our History</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="section_title text-center"><h2>History</h2></div>
					<div class="section_subtitle">Driving is a passion for the creators of MapItGO freight and has been for over a decade, from driving delivery vans to Class A work. The creators of MapItGO all hold a Class A CDL and have operated commercial vehicles. After two decades of collective background working under others, it was decided that they wanted to create a name of their own. Thus, MapItGO freight was born. Each brought their own experience, likes and dislikes about the industry and working for other companies to the table. We were able to create an industry-leading company with highly valued employees because of that experience.</div>
				</div>
			</div>

			<!-- Featured Course -->
			<div class="row featured_row">
				<div class="col-lg-12 featured_col">
					<div class="featured_content">
						<div class="embed-responsive embed-responsive-16by9">
							<!--<iframe class="embed-responsive-item" src="https://www.szystems.com/mapitgo/public/Videos/WHYUSCUSTOMERS.mp4"></iframe>-->
							<div class="embed-responsive-item">
                                <video height='100%' class="embed-responsive-item" src="{{asset('Videos/History.mp4')}}" allowfullscreen controls muted></video>
                            </div>
						</div>
						<form align="center" action="{{ route('register') }}" class="course_search_form d-flex flex-md-row flex-column align-items-start justify-content-between">
							<button class="course_button"><span>Register</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection