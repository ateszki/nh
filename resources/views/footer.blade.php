<!-- footer -->
			<footer role="contentinfo" class="p_top_0 bg-texture">
				<div class="section_offset bg-sub-footer m_bottom_35 m_xs_bottom_30">
					<div class="container m_top_10">
						<div class="row">
                            
							<!-- contact info -->
							<div class="col-lg-5 col-md-5 col-sm-5 m_bottom_15 m_xs_bottom_30 color_light_3">
								<h5 class="color_white tt_uppercase second_font m_bottom_13">Contáctenos</h5>
								<hr class="divider_bg m_bottom_25">
								<h1 class="second_font m_bottom_15"><i class="fas fa-phone"></i> 0800-555-1000</h1>
                                <h4 class="second_font m_bottom_15"><i class="fas fa-phone"></i> (011) 4302-4000</h4>
                                <h4 class="second_font m_bottom_15"><a href="https://api.whatsapp.com/send?phone=01128080280" style="color:white"><i class="fab fa-whatsapp"></i> (011) 2808-0280</a></h4>
							</div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 m_bottom_15 m_xs_bottom_30 color_light_3">
                            
                            <!-- subscribe widget -->
							<section>
								<h5 class="color_white tt_uppercase second_font m_bottom_13">Novedades</h5>
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
								      @if(Session::has('alert-newsletter-' . $msg))
								      <div class="alert_box r_corners color_green {{ $msg }}">
								      <p>{{ Session::get('alert-' . $msg) }} </p>
								      </div>
								      @endif
								    @endforeach
								<p class="second_font m_bottom_15">Reciba todas las novedades Nube en su E-Mail!</p>
								<form method='post' action="{{URL::to('lista-email')}}">
								{{ csrf_field() }}
									<input placeholder="Ingrese su E-Mail" name="email" class="tr_all fw_light w_full fs_medium m_bottom_10" type="email">
									<button class="second_font w_full tt_uppercase fs_medium button_type_2 black state_2 d_block tr_all" type="submit">Suscribirse</button>
								<div class="message_container_subscribe d_none m_top_20"></div></form>
							</section>
                             </div>
                            
							<!-- social widget -->
							<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_15 m_xs_bottom_0">
								<h5 class="color_white tt_uppercase second_font m_bottom_13">Nube en Redes Sociales</h5>
								<hr class="divider_bg m_bottom_30">
								<!-- social buttons -->
								<ul class="hr_list">
									<li class="m_right_3 m_bottom_3 m_left_80">
										<a href="https://www.facebook.com/hiladosnube" target="_blank" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fab fa-facebook-f fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Facebook</span></a>
									</li>
									<li class="m_right_3 m_bottom_3">
										<a href="https://twitter.com/nubehilados" target="_blank" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fab fa-twitter fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Twitter</span></a>
									</li>
									<li class="m_right_3 m_bottom_3">
										<a href="https://www.instagram.com/nubehilados/" target="_blank" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fab fa-instagram fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Instagram</span></a>
									</li>
									<li class="m_right_3 m_bottom_3">
										<a href="https://api.whatsapp.com/send?phone=01128080280" class="button_type_6 d_block grey state_2 tr_delay color_dark t_align_c vc_child tooltip_container relative"><i class="fab fa-whatsapp fs_large d_inline_m"></i><span class="tooltip top fs_small color_white hidden animated" data-show="fadeInDown" data-hide="fadeOutUp">Whatsapp</span></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
                
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
									<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Catálogo</h5>
									<hr class="divider_bg m_bottom_25">
									<ul class="second_font vr_list_type_1 with_links m_sm_bottom_30">
                                   		<li class="m_bottom_14"><a href="{{URL::to('hilados')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Hilados</a></li>
										<li class="m_bottom_14"><a href="{{URL::to('trajes-de-banio')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Trajes de Baño</a></li>
                                        <li class="m_bottom_14"><a href="{{URL::to('accesorios')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Accesorios</a></li>
                                        
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
									<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">INFORMACIÓN ÚTIL</h5>
									<hr class="divider_bg m_bottom_25">
									<ul class="second_font vr_list_type_1 with_links">    
										<li class="m_bottom_14"><a href="{{URL::to('locales')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Locales</a></li>
                                        <li class="m_bottom_14"><a href="{{URL::to('representantes')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Representantes</a></li>
									<!--                                
	                                    <li class="m_bottom_14"><a href="{{URL::to('preguntas-frecuentes')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Preguntas Frecuentes</a></li>

	                                    <li class="m_bottom_14"><a href="{{URL::to('como-comprar')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Cómo Comprar?</a></li>
                                        
										<li class="m_bottom_14"><a href="{{URL::to('politica-de-privacidad')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Política de Privacidad</a></li>
										<li class="m_bottom_14"><a href="{{URL::to('terminos-y-condiciones')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Términos y Condiciones</a></li>	
										-->									
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
									<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">SOBRE NUBE</h5>
									<hr class="divider_bg m_bottom_25">
									<ul class="second_font vr_list_type_1 with_links">
										<li class="m_bottom_14"><a href="{{URL::to('acerca-de-nube')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Acerca de Nube</a></li>
                                        
										<li class="m_bottom_14"><a href="{{URL::to('contacto')}}" class="sc_hover d_inline_b"><i class="fa fa-caret-right"></i>Contacto</a></li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_13 m_sm_bottom_30">
									<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Novedades en Facebook!</h5>
									<hr class="divider_bg m_bottom_15">
									<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fhiladosnube&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>
								</div>
							</div>
						</div>
					</div>
                    
					<hr class="divider_black m_bottom_13">
                    
					<div class="d_table w_full d_xs_block t_xs_align_c">
						<div class="col-lg-7 col-md-7 col-sm-7 color_light fw_default f_none d_table_cell v_align_m d_xs_block m_xs_bottom_0">
							 <a href="https://servicios1.afip.gov.ar/clavefiscal/qr/mobilePublicInfo.aspx?req=e1ttZXRob2Q9Z2V0UHVibGljSW5mb11bcGVyc29uYT0zMDY0MjAxMDYzNF1bdGlwb2RvbWljaWxpbz0wXVtzZWN1ZW5jaWE9MF1bdXJsPWh0dHA6Ly93d3cubnViZWhpbGFkb3MuY29tL119" target="_blank"><img src="http://www.afip.gob.ar/images/f960/DATAWEB.jpg" width="35" height="47" alt="" class="m_right_5"></a> Nube Hilados - Contamos con la mayor variedad de lana para tejido artesanal e industrial.
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 t_align_r t_xs_align_c f_none d_table_cell v_align_t d_xs_block">
							<ul class="hr_list d_inline_b">
							 <!--<a href="http://www.ivancandle.com.ar/" target="_blank">IVANCANDLE</a>-->
							</ul>
						</div>
					</div>
				</div>
			</footer>