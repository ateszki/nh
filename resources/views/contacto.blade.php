@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Contacto</span>
				</div>
			</div>
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">		
                    
                    	<aside class="col-lg-4 col-md-4 col-sm-4">
                        
                        	<!-- datos de contacto -->                            
                             <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">TELEFÓNICAMENTE</h5>
							 <hr class="divider_bg second_font m_bottom_23">
                             
                             <h1 class="second_font m_bottom_15">0800-555-1000</h1>
                             <h4 class="second_font m_bottom_55">(011) 4302-4000</h4> 
                       
                        
							<!-- locales nube -->
                            <h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Locales Nube</h5>
							<hr class="divider_bg m_bottom_23">							
							<figure class="relative wrapper scale_image_container m_bottom_40 r_image_container m_xs_bottom_30">
								<a href="locales.php"><img src="images/nube-locales.jpg" alt="" class="tr_all scale_image"></a>
								<!-- image -->
								<figcaption class="caption_type_1 tr_all">
										<div class="d_inline_b color_white fw_light caption_title tt_uppercase bg_lbrown_translucent">
											Locales Nube
										</div>
										<div class="caption_inner">
											<h3 class="color_white fs_medium fw_light m_bottom_2 w_break">Conozca nuestros puntos de Venta en todo el País</h3>
											<p class="color_light fw_light color_light_2"><a href="{{URL::to('locales')}}" class="color_lbrown color_white_hover">Ver todos nuestros Locales</a></p>
										</div>
								 </figcaption>
							</figure>
							
						</aside>
                    				
                         <!-- formulario de contacto -->
						<div class="col-lg-7 col-md-7 col-sm-7 m_bottom_30 m_xs_bottom_30 m_left_30">
							<div class="row">
								<section class="col-lg-12 col-md-12 col-sm-12">
									<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Envíenos su Consulta</h5>
									<hr class="divider_bg m_bottom_25">
									@if (count($errors) > 0)
									    <div class="alert_box error relative m_bottom_10 fw_light">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
								    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
								      @if(Session::has('alert-' . $msg))
								      <div class="alert_box r_corners color_green {{ $msg }}">
								      <p>{{ Session::get('alert-' . $msg) }} </p>
								      </div>
								      @endif
								    @endforeach
								  	<form id="contactform" method="post" class="b_default_layout">
									{{ csrf_field() }}
										<ul>
											<li class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
													<label class="second_font required d_inline_b m_bottom_5 clickable" for="cf_name">Su Nombre </label><br>
													<input type="text" name="nombre" id="cf_name" class="tr_all w_full fw_light">
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
													<label class="second_font required d_inline_b m_bottom_5 clickable" for="cf_email">Su E-Mail </label><br>
													<input type="email" name="email" id="cf_email" class="tr_all w_full fw_light">
												</div>
											</li>
											<li class="m_bottom_15">
												<label class="second_font d_inline_b m_bottom_5 clickable" for="cf_telephone">Tel. de Contacto</label><br>
												<input type="text" name="telefono" id="cf_telephone" class="tr_all w_full fw_light">
											</li>
											<li class="m_bottom_5">
												<label class="second_font d_inline_b m_bottom_5 clickable" for="cf_message">Consulta</label><br>
												<textarea id="cf_message" name="mensaje" rows="6" class="tr_all w_full fw_light"></textarea>
											</li>
											<li>
												<button type="submit" class="button_type_2 black state_2 tr_all second_font fs_medium tt_uppercase d_inline_b"><span class="m_left_10 m_right_10 d_inline_b">Enviar Consulta</span></button>
											</li>
										</ul>
									</form>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection