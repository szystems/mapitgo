@extends('layouts.app')
@section('content')
    <!-- Home -->

	<div class="home">
		<!-- Background image artist https://unsplash.com/@thepootphotographer -->
		<div class="home_background parallax_background parallax-window" data-parallax="scroll" data-image-src="{{asset('mapitgo/images/contact2.jpg')}}" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content text-center">
							<div class="home_title">Contact</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="{{ url('/') }}">Home</a></li>
									<li>Contact</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container-fluid">
			<div class="row row-xl-eq-height">
				<!-- Contact Content -->
				<div class="col-xl-6">
					<div class="contact_content">
          				
						<div class="row">
							
							<div class="col-xl-6">
								<div class="contact_info_container">
									<div class="contact_info_main_title">Contact Us</div>
									<div class="contact_info">
										<div class="contact_info_item">
											<div class="contact_info_title">Address:</div>
											<div class="contact_info_line">4610 NE 77th Ave. Suite 126 Vancouver, WA 98662</div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Phone:</div>
											<div class="contact_info_line"><a  href="tel:+3605130877">(360) 513-0877</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Email:</div>
											<div class="contact_info_line"><a href="info@mapitgo.com">info@mapitgo.com</a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="contact_info_container">
									<div class="contact_info_main_title">Company Staff</div>
									<div class="contact_info">
										<div class="contact_info_item">
											<div class="contact_info_title">Alan Aquino | Operations</div>
											<div class="contact_info_line"><a href="operations@mapitgo.com">operations@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:+3605130877">(360) 513-0877</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Alan Aquino | COO</div>
											<div class="contact_info_line"><a href="aaquino@mapitgo.com">aaquino@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:+3605212938">(360) 521-2938</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Juan Galicia | Administration</div>
											<div class="contact_info_line"><a href="administration@mapitgo.com">administration@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:+3609108650">(360) 910-8650</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Juan Galicia | CEO</div>
											<div class="contact_info_line"><a href="administration@mapitgo.com">administration@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:+360521-6804">(360) 521-6804</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Raychell Aquino | Human Resources</div>
											<div class="contact_info_line"><a href="hr@mapitgo.com">hr@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:+5644440205">(564) 444-0205</a></div>
										</div>
										<div class="contact_info_item">
											<div class="contact_info_title">Raychell Aquino | CHRO</div>
											<div class="contact_info_line"><a href="raquino@mapitgo.com">raquino@mapitgo.com</a></div>
											<div class="contact_info_line"><a  href="tel:971312(971) 312-34333433">(971) 312-3433</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="contact_form_container">
              				{!!Form::open(array('url'=>'vistas/vcontacto','method'=>'POST','autocomplete'=>'off'))!!}
              				{{Form::token()}}
								<div>
										<div class="row">
											@if (count($errors)>0)
												<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{$error}}</li>
													@endforeach
												</ul>
												</div>
											@endif
											<div class="flash-message">
											@foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      							@if(Session::has('alert-' . $msg))

                      								<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      							@endif
                      						@endforeach
                    					</div> 	<!-- fin .flash-message -->
                    					<div class="col-lg-12 contact_name_col">
                      						<div class="logo_text">Contact Us</div>
										</div>
                    					<br><br><br>
										<div class="col-lg-4 contact_name_col">
											<input type="text" class="contact_input" placeholder="Name" name="name" value="{{ old('name') }}" required="required">
										</div>
                    					<div class="col-lg-4 contact_name_col">
											<input type="text" class="contact_input" placeholder="Phone" name="phone" value="{{ old('phone') }}" required="required">
										</div>
										<div class="col-lg-4">
											<input type="email" class="contact_input" placeholder="E-mail" name="email" value="{{ old('email') }}" required="required">
										</div>
									</div>
								</div>
                				<br>
								<div><input type="text" class="contact_input" placeholder="Subject" name="subject" value="{{ old('subject') }}" required="required"></div>
                				<br>
								<div><textarea class="contact_input contact_textarea" name="messages" placeholder="Message">{{ old('messages') }}</textarea></div>
								<button class="contact_button"><span>send message</span><span class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
              				{!!Form::close()!!}	
						</div>
					</div>
				</div>

				<!-- Contact Map -->
				<div class="col-xl-6 map_col">
					<div class="contact_map">

          			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2788.8050041000683!2d-122.5966265849501!3d45.654737528731125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5495af96b0700001%3A0x723a70387d458083!2s4610%20NE%2077th%20Ave%20Suite%20126%2C%20Vancouver%2C%20WA%2098662%2C%20EE.%20UU.!5e0!3m2!1ses-419!2sgt!4v1643994570305!5m2!1ses-419!2sgt" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" ></iframe>

					</div>
				</div>
			</div>
				
		</div>
	</div>

	
@endsection