@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <a href="{{URL::to('/mayorista')}}" class="sc_hover">Mayorista </a> / <span class="color_ligth">{{preg_replace('/\*[a-zA-Z0-9 ]*/','',$hilado->descripcion)}}</span>
				</div>
			</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset">
				<div class="container">
					<div class="row">
                    
                        
						<main class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">{{preg_replace('/\*[a-zA-Z0-9 ]*/','',$hilado->descripcion)}} </h4>  
                            <a href="{{URL::previous()}}" class="cursor f_right_button button_type_1 m_bottom_5 d_block t_align_r lbrown state_2 tr_all second_font fs_small tt_uppercase"><i class="fa fa-arrow-left d_inline_m m_right_9"></i>Volver a Productos</a>                    
                            <hr class="divider_bg m_bottom_23">	 
                            
                            @if(count($colores) > 1)
						  	<div class="">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-lg-8 col-lg-offset-2 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                                      	<img src="{{URL::to('prodimag/'.$hilado->imagen.'-Z.jpg')}}" />
                                      @if(!Auth::check())
                                          <a href="#" data-cargar-todos='{{URL::to("/carrito/add/all/".$hilado->codigo)}}' class="cursor f_left button_type_1 m_bottom_5 d_block t_align_r lbrown state_2 tr_all second_font fs_small tt_uppercase"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>Agregar 1 paq de cada color</a>
                                          @endif	
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @else
                          <div class="bg_grey_light_2">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                      <span class="f_left button_type_1 m_bottom_5 d_block t_align_r lbrown state_2 tr_all second_font fs_small tt_uppercase"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
 Carta de colores en desarrollo</span>
                                 </div>
                                  </div>
                              </div>
                          </div>
                          @endif
							<!-- isotope -->
							<div id="can_change_layout" class="category_isotope_container five_columns wrapper m_bottom_10 m_xs_bottom_0" data-isotope-options='{
								"itemSelector": ".category_isotope_item",
					  			"layoutMode": "fitRows"
							     }'>
							     
								@foreach($colores as $color)
                                <!-- producto single -->
								<div class="category_isotope_item">
									<figure class="product_item type_2 c_image_container relative frame_container bg_white t_sm_align_c r_image_container qv_container">
										<!-- producto content -->
										<div class="relative">
											<div class="d_block">
												<img src="{{URL::to('prodimag/'.$color['codigo'].'-G.jpg')}}" alt="" class="c_image_1 tr_all imagezoom" data-zoom-image="@if(file_exists('prodimag/'.$color['codigo'].'-Z.jpg')){{URL::to('prodimag/'.$color['codigo'].'-Z.jpg')}}@else{{URL::to('prodimag/'.$color['codigo'].'-G.jpg')}}@endif">
											</div>											
										</div>
										<figcaption class="bg_white relative p_bottom_15">
											<div class="row">
												<div class="col-lg-12 col-md-12 m_bottom_12 t_align_c nombre_hilado">
													<span class="second_font d_xs_block">{{substr($color["descripcion"],strpos($color["descripcion"],"-")+2)}}<br>({{substr($color["codigo"],-3)}})</span>													
												</div>
												<div class="col-lg-12 col-md-12 color_light fs_large second_font t_align_r t_sm_align_c m_bottom_9">
													@if(Auth::check())
													<span class="scheme_color d_block">${{$color["precio"]}} x Kg.</span>
													@ENDIF
												</div>
											</div>
										@if(!Auth::check())
											<!--<button data-popup="#quick_view" data-popup-transition-in="bounceInUp" data-popup-transition-out="bounceOutUp" class="button_type_2 m_bottom_5 d_block w_full t_align_c lbrown state_2 tr_all second_font fs_small tt_uppercase m_top_10"><i class="fa fa-eye d_inline_m m_right_9"></i>Ver Opciones</button>-->
											<button data-popup="#quick_view" data-popup-transition-in="bounceInUp" data-popup-transition-out="bounceOutUp" data-url='{{ URL::to("/carrito/add") }}' data-color='{"codigo":"{{substr($color["codigo"],0,4)}}","color":"{{substr($color["codigo"],5,4)}}","precio":"{{$color["precio"]}}","descripcion":"{{preg_replace("/\*[a-zA-Z0-9 ]*/","",$color["descripcion"])}} ","img":"{{URL::to('prodimag/'.$color["codigo"].'-G.jpg')}}"}' class="button_type_1 m_bottom_5 d_block w_full t_align_c black state_2 tr_all second_font fs_small tt_uppercase m_top_10"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>Agregar</button>
											@endif	
                                        </figcaption>
									</figure>
								</div>
                                <!-- /producto single --> 
                                @endforeach
								                           
                                
							</div>
                            
						</main>
					</div>
				</div>
			</div>
@endsection
