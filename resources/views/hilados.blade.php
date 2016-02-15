@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Hilados</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">
						<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">                            
                               
                                <!-- buscador widget -->
						 		<section class="m_bottom_30 animated hidden" data-animation="fadeInDown">
								<h5 class="color_dark tt_uppercase fw_default second_font m_bottom_15">Filtro de Búsqueda</h5>
								<hr class="divider_bg m_bottom_23">
								<ul class="categories_list second_font w_break">
                                		<li class="clearfix m_bottom_14">											
											<div class="styled_select relative">
												<div class="select_title fs_medium fw_light color_light relative d_none tr_all">Seleccionar Temporada</div>
												<select>
													<option value="Otoño/Invierno">Otoño/Invierno</option>
													<option value="Primavera/Verano">Primavera/Verano</option>
												</select>
												<ul class="options_list d_none tr_all hidden bg_grey_light"></ul>
											</div>
										</li>
                                        
                                        <li class="clearfix m_bottom_14">											
											<div class="styled_select relative">
												<div class="select_title fs_medium fw_light color_light relative d_none tr_all">Seleccionar Tipo</div>
												<select>
													<option value="Clásica">Clásicos</option>
													<option value="Fantasía">Fantasías</option>
												</select>
												<ul class="options_list d_none tr_all hidden bg_grey_light"></ul>
											</div>
										</li>
                                        	
                                        <li class="m_bottom_10">
                                        <button class="button_type_2 d_block w_full t_align_c grey state_2 tr_all second_font fs_medium tt_uppercase"><i class="fa fa-search d_inline_m m_right_9 fs_"></i>Ver Resultados</button>
										</li>
                                </ul>
							</section>	
                            
                            <!-- productos mas vendidos widget -->
							<section class="m_bottom_40 m_xs_bottom_30">
								<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Más Vendidos</h5>
								<hr class="divider_bg m_bottom_25">
								<ul>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
                                    <li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
                                    <li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>                                    
								</ul>
							</section>
                            
                            
                            <!-- productos mas vistos widget -->
							<section class="m_bottom_40 m_xs_bottom_30">
								<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Vistos Recientemente </h5>
								<hr class="divider_bg m_bottom_25">
								<ul>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
									<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
                                    <li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>
                                    <li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
										<div class="clearfix lh_small">
											<a href="#" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="images/prod-01.jpg" width="80px" height="80px" alt=""></a>
											<a href="#" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">Nombre del Producto</a>
											<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">$990.00</b>
										</div>
									</li>                                    
								</ul>
							</section>  
						</aside>
                        
						<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Hilados</h4>	
                            <hr class="divider_bg m_bottom_23">						
							<div class="d_table w_full m_bottom_5">
								<div class="col-lg-6 col-md-6 col-sm-6 d_xs_block v_align_m d_table_cell f_none fs_medium color_light fw_light m_xs_bottom_5">
									<div class="styled_select relative d_inline_m m_right_2">
										<div class="select_title type_3 fs_medium fw_light color_light relative d_none tr_all">Ordenar por</div>
										<select>
											<option @if($orderby=='descripcion') selected="selected" @endif value="descripcion">Nombre</option>
											<option @if($orderby=='visitas') selected="selected" @endif value="visitas">Mas Visitados</option>
											<option @if($orderby=='ventas') selected="selected" @endif value="ventas">Más Vendidos</option>
										</select>
										<ul class="options_list d_none tr_all hidden bg_grey_light_2"></ul>
									</div>
                                    
                                    <!-- pagination up -->
									@include('paginador', ['paginator' => $hilados])
                                    
                                    
								</div>
							</div>
                            
							<hr class="divider_white m_bottom_5">
                            
							<!-- isotope -->
							<div id="can_change_layout" class="category_isotope_container five_columns wrapper m_bottom_10 m_xs_bottom_0" data-isotope-options='{
								"itemSelector": ".category_isotope_item",
					  			"layoutMode": "fitRows"
							     }'>
								@foreach($hilados as $hilado)
                                <!-- producto single -->
								<div class="category_isotope_item">
									<figure class="product_item type_2 c_image_container relative frame_container bg_white t_sm_align_c r_image_container qv_container">
										<!-- producto content -->
										<div class="relative">
											<div class="d_block">
												<img src="{{URL::to('prodimag/'.$hilado->imagen.'-G.jpg')}}" alt="" class="c_image_1 tr_all">
											</div>
											<div class="product_label fs_ex_small circle color_white bg_lbrown t_align_c vc_child tt_uppercase"><i class="d_inline_m">Oferta!</i></div>	
										</div>
										<figcaption class="bg_white relative p_bottom_15">
											<div class="row">
												<div class="col-lg-12 col-md-12 m_bottom_12 t_align_c">
													<span class="second_font d_xs_block">{{$hilado->descripcion}}</span>													
												</div>
												<div class="col-lg-12 col-md-12 color_light fs_large second_font t_align_r t_sm_align_c m_bottom_9">
													<span class="scheme_color d_block">${{number_format($hilado->precio,2)}}</span>
												</div>
											</div>
											<a href="{{URL::to('hilados/'.$hilado->codigo)}}" class="button_type_2 m_bottom_9 d_block w_full t_align_c lbrown state_2 tr_all second_font fs_small tt_uppercase m_top_10"><i class="fa fa-eye d_inline_m m_right_9"></i>Ver Producto</a>
										</figcaption>
									</figure>
								</div>
                                @endforeach
								
                                
                                
							</div>
                            
							<hr class="m_bottom_5 divider_white">
                            
							<div class="d_table w_full m_bottom_5">
								<div class="col-lg-6 col-md-6 col-sm-6 d_xs_block v_align_m d_table_cell f_none t_align_r t_xs_align_l p_xs_left_0">
									
                                    <!-- pagination bottom -->
									@include('paginador', ['paginator' => $hilados])
								</div>
							</div>
						</main>
					</div>
				</div>
			</div>
@endsection