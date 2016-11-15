@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <span class="color_light">Hilados</span> / <span class="color_light">{{ $temporada}} </span>@if($tipo!='') / <span class="color_light">{{ $tipo}} </span>@endif
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">
						@include('hilados-col-izq')
                        
						<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Hilados</h4>	
                            <hr class="divider_bg m_bottom_23">						
							<div class="d_table w_full m_bottom_5">
								<div class="col-lg-6 col-md-6 col-sm-6 d_xs_block v_align_m d_table_cell f_none fs_medium color_light fw_light m_xs_bottom_5">
									<div class="styled_select relative d_inline_m m_right_2">
										<div class="select_title type_3 fs_medium fw_light color_light relative d_none tr_all">Ordenar por</div>
										<select data-orderby="1">
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
												<a href="{{URL::to('hilados/'.$hilado->codigo)}}"><img src="{{URL::to('prodimag/'.$hilado->imagen.'-D.jpg')}}" alt="" class="c_image_1 tr_all" border="0"></a>
											</div>
											<!--oferta <div class="product_label fs_ex_small circle color_white bg_lbrown t_align_c vc_child tt_uppercase"><i class="d_inline_m">Oferta!</i></div>	-->
										</div>
										<figcaption class="bg_white relative p_bottom_15">
											<div class="row">
												<div class="col-lg-12 col-md-12 m_bottom_12 t_align_c nombre_hilado">
													<span class="second_font d_xs_block">{{preg_replace('/\*[a-zA-Z0-9 ]*/','',$hilado->descripcion)}} </span>													
												</div>
												<div class="col-lg-12 col-md-12 color_light fs_large second_font t_align_r t_sm_align_c m_bottom_9">
													@if(Auth::check())
													<span class="scheme_color d_block">${{number_format($hilado->precio,0)}} x Kg.</span>
													@endif
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