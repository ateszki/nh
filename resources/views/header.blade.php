			<header role="banner" class="w_inherit">
            	<!-- top header -->
				<div class="header_top_part p_top_0 p_bottom_0 bg-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-5 t_xs_align_c htp_offset p_xs_top_0 p_xs_bottom_0">                            
								
                                <!-- top nav -->
								<nav class="d_xs_inline_b m_bottom_20 m_left_20">
									<ul class="hr_list second_font si_list fs_small">
										<li><a class="sc_hover tr_delay" href="{{URL::to('acerca-de-nube')}}">Acerca de Nube</a></li>                                        
                                        <li><a class="sc_hover tr_delay" href="{{URL::to('locales')}}">Locales</a></li>
                                        <li><a class="sc_hover tr_delay" href="{{URL::to('representantes')}}">Representantes</a></li>                                        
										<li><a class="sc_hover tr_delay" href="{{URL::to('contacto')}}">Contacto</a></li>
									</ul>
								</nav>
							</div>                            

							<div class="col-lg-7 col-md-7 col-sm-7 t_align_r t_xs_align_c">
								<div class="clearfix d_inline_b t_align_l">									                                   
                       		       @if(Auth::check())
									<!-- user logged in -->
									<div class="f_right relative transform3d">
                                    <nav class="d_xs_inline_b m_top_7 m_left_20">
                                      <ul class="hr_list second_font si_list fs_small">
                                          <li><i class="fa fa-user d_inline_m m_right_5"></i> <span>Bienvenido: {{Auth::user()->nomCli}}</span></li> 
                                          <li><a class="sc_hover tr_delay" href="{{URL::to('revisar-pedido')}}"><i class="fa fa-shopping-cart  d_inline_m m_right_5"></i>Ver Pedido</a></li>    
                                          <li><a class="sc_hover tr_delay" href="{{URL::to('auth/logout')}}"><i class="fa fa-lock d_inline_m m_right_5"></i>Cerrar Sesión</a></li>
                                      </ul>
                                    </nav>
                                    
										
									</div>
									@else
									<!-- user login -->
									<div class="f_right relative transform3d">
										<button class="tr_all second_font color_dark type_2 m_sm_top_10 m_xs_top_0" data-open-dropdown="#login"><i class="fa fa-user d_inline_m m_right_5"></i> <span class="fs_small">Ingreso Clientes</span></button>
										<div id="login" data-show="fadeInUp" data-hide="fadeOutDown" class="dropdown bg_white login_dropdown animated">
											<form class="m_bottom_15" method="POST" action="{{URL::to('auth/login')}}">
											{!! csrf_field() !!}
												<ul>
													<li class="m_bottom_15">
														<label for="email" class="second_font m_bottom_4 d_inline_b fs_medium">Usuario</label>
														<input type="text" name="email" id="email" class="w_full tr_all">
													</li>
													<li class="m_bottom_20">
														<label for="password" class="second_font m_bottom_4 d_inline_b fs_medium">Contraseña</label>
														<input type="password" name="password" id="password" class="w_full tr_all">
													</li>
													<li>
														<button type="submit" class="t_align_c tt_uppercase w_full second_font d_block fs_medium button_type_2 lbrown tr_all">INGRESAR</button>
													</li>
												</ul>
											</form>
											<div class="m_bottom_14 t_align_c">
												<a href="{{URL::to('contacto')}}" class="second_font sc_hover fs_small">Solicitar su Usuario y Contraseña</a><br>
											</div>
											<hr class="divider_white m_bottom_25">
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>                
				<div class="header_bottom_part bg_white type_2 t_sm_align_c w_inherit bg-body">
					<div class="container">
						<div class="d_table w_full d_xs_block">
							<div class="col-lg-2 col-md-2 d_sm_block w_sm_full d_table_cell d_xs_block f_none v_align_m m_xs_bottom_15">
								<!-- logo -->
								<a href="/" class="d_inline_b m_sm_top_5 m_sm_bottom_5 m_xs_bottom_0">
									<img src="images/nube-hilados-logo.png" alt="Nube Hilados - Tejer con imaginación">
								</a>
							</div>
							<div class="col-lg-8 col-md-8 d_sm_block w_sm_full d_table_cell d_xs_block f_none v_align_m m_sm_top_5">
								<button id="mobile_menu_button" class="vc_child d_xs_block db_xs_centered d_none m_bottom_10 m_top_15 bg_lbrown color_white tr_all"><i class="fa fa-navicon d_inline_m"></i></button>
								
                                <!-- main menu -->
								<nav role="navigation" class="m_left_35 d_xs_none d_sm_inline_b">
									<ul class="main_menu relative type_2 hr_list second_font fs_medium">
										<li><a href="{{URL::to('hilados')}}" class="tt_uppercase tr_delay">Hilados </i></a></li>
                                        <li><a href="{{URL::to('trajes-de-banio')}}" class="tt_uppercase tr_delay">Trajes de Baño </a></li>
										<li><a href="{{URL::to('accesorios')}}" class="tt_uppercase tr_delay">Accesorios </a></li>                                        
										<li><a href="{{URL::to('fichas-de-tejidos')}}" class="tt_uppercase tr_delay">Fichas de Tejidos </a></li>
										<li><a href="{{URL::to('revista-nube')}}" class="tt_uppercase tr_delay">Revista Nube </a></li>
									</ul>
								</nav>
							</div>
                            
							<div class="col-lg-2 col-md-2 d_sm_block w_sm_full d_table_cell d_xs_block f_none v_align_m m_xs_bottom_15">
								<ul class="hr_list si_list list_with_focused_form shop_list f_right f_sm_none d_sm_inline_b t_sm_align_l t_xs_align_c">
                                
                                   <!-- searchform -->
                                   <li class="m_xs_bottom_5">										
										<div class="search_form_container d_inline_b relative">
											<form role="search" class="relative f_right f_xs_none db_xs_centered button_in_input clearfix">
												<input type="text" name="" tabindex="1" placeholder="Buscar Producto" class="fs_medium color_light fw_light w_full tr_all f_right hidden">
												<button class="color_dark color_lbrown_hover tr_all"><i class="fa fa-search d_inline_m"></i></button>
											</form>
										</div>
									</li>
                                    
									<!-- shopping cart -->
									<li class="relative open_mini_shopping_cart d_xs_inline_b t_xs_align_l">
										<button class="color_dark active_lbrown tr_all" data-open-dropdown="#shopping_cart">
											<i class="fa fa-shopping-cart fs_large"></i><sup>{{Cart::count()}}</sup>
											<b class="second_font fs_small d_inline_b m_left_10">${{Cart::total()}}</b>
										</button>
										<div id="shopping_cart" data-show="fadeInUp" data-hide="fadeOutDown" class="bg_grey_light dropdown animated">
											<div class="sc_header fs_small fw_light">Productos agregados</div>
											<hr class="divider_white">
											<ul class="shopping_cart_list m_bottom_4">
												<li class="relative">
													<div class="clearfix lh_small">
														<span class="f_left m_right_10 d_block"><img src="images/prod-01.jpg" width="60px" height="60px" alt=""></span>
														<span class="fs_medium second_font color_dark d_block m_bottom_4">Cursus eleifend elit</span>
														<p class="fs_medium">1 x <b class="color_dark">$499.00</b></p>
                                                        <ul class="fw_light fs_small lh_small">
															<li>Color: <span class="color_dark">178</span></li>											
														</ul>
													</div>
													<hr class="divider_white m_top_15 m_bottom_0">
													<span class="close fs_small color_light tr_all color_dark_hover fw_light">x</span>
												</li>
												<li class="relative">
													<div class="clearfix lh_small">
														<span class="f_left m_right_10 d_block"><img src="images/prod-02.jpg" width="60px" height="60px" alt=""></span>
														<span class="fs_medium second_font color_dark d_block m_bottom_4">Auctor wisi et urna</span>
														<p class="m_bottom_4 fs_medium">1 x <b class="color_dark">$1,599.00</b></p>
														<ul class="fw_light fs_small lh_small">
															<li>Color: <span class="color_dark">178</span></li>												
														</ul>
													</div>
													<hr class="divider_white m_top_15 m_bottom_0">
													<span class="close fs_small color_light tr_all color_dark_hover fw_light">x</span>
												</li>
												<li class="relative">
													<div class="clearfix lh_small">
														<span class="f_left m_right_10 d_block"><img src="images/prod-03.jpg" width="60px" height="60px" alt=""></span>
														<span class="fs_medium second_font color_dark d_block m_bottom_4">Aliquam erat volut</span>
														<p class="fs_medium">2 x <b class="color_dark">$99.00</b></p>
                                                        <ul class="fw_light fs_small lh_small">
															<li>Color: <span class="color_dark">178</span></li>												
														</ul>
													</div>
													<hr class="divider_white m_top_15 m_bottom_0">
													<span class="close fs_small color_light tr_all color_dark_hover fw_light">x</span>
												</li>
											</ul>
											<ul class="fs_medium second_font color_dark m_bottom_15">
												<li><b><span class="d_inline_b total_title">Total:</span>$999.00</b></li>
											</ul>
											<a href="#" role="button" class="button_type_2 tt_uppercase fs_medium second_font d_block t_align_c black state_2 m_bottom_5">Revisar Pedido</a>
											<a href="#" role="button" class="t_align_c tt_uppercase w_full second_font d_block fs_medium button_type_2 lbrown tr_all">Confirmar Pedido</a>
										</div>
									</li>
								</ul>                                
							</div>
                            <!-- end shopping cart -->
                            
						</div>
					</div>
                    <hr class="bg_lbrown_translucent" />
				</div>               
			</header>