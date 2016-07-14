@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <a href="{{URL::to('/accesorios')}}?cat={{$cat}}&tipo={{$tipo}}" class="sc_hover">Accesorios / {{ trim($cat)}} @if($tipo!='') / {{ trim($tipo)}} @endif</a> 
				</div>
			</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">
                    
                    @include('accesorios-col-izq')
                        
						<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Accesorios</h4>  
                                                
                            <hr class="divider_bg m_bottom_23">	 
                            
                            
                            
							<!-- isotope -->
							<div id="can_change_layout" class="category_isotope_container five_columns wrapper m_bottom_10 m_xs_bottom_0" data-isotope-options='{
								"itemSelector": ".category_isotope_item",
					  			"layoutMode": "fitRows"
							     }'>
								@foreach($accesorios as $acc)
                                <!-- producto single -->
								<div class="category_isotope_item">
									<figure class="product_item type_2 c_image_container relative frame_container bg_white t_sm_align_c r_image_container qv_container">
										<!-- producto content -->
										<div class="relative">
											<div class="d_block">
												@if(file_exists(public_path()."/prodimag/".$acc->codigo."-G.jpg"))
												<img src="{{URL::to('prodimag/'.$acc->codigo.'-G.jpg')}}" alt="" class="c_image_1 tr_all imagezoom" data-zoom-image="{{URL::to('prodimag/'.$acc->codigo.'-G.jpg')}}">
												@else
												<img src="{{URL::to('images/nodisp-G.png')}}" alt="" class="c_image_1 tr_all " >
												@endif
											</div>											
										</div>
										<figcaption class="bg_white relative p_bottom_15">
											<div class="row">
												<div class="col-lg-12 col-md-12 m_bottom_12 t_align_c nombre_hilado">
													<span class="second_font d_xs_block">{{$acc->nombre}}</span>													
												</div>
												<div class="col-lg-12 col-md-12 color_light fs_large second_font t_align_r t_sm_align_c m_bottom_9">
													@if(Auth::check())
													<span class="scheme_color d_block">${{$acc->precio}}</span>
													@ENDIF
												</div>
											</div>
											@if(Auth::check())
											<button data-popup="#quick_view_acc" data-popup-transition-in="bounceInUp" data-popup-transition-out="bounceOutUp" data-url='{{ URL::to("/carrito/add") }}' data-color='{"codigo":"{{$acc->codigo}}","color":"","precio":"{{$acc->precio}}","descripcion":"{{$acc->nombre}}","img":"{{URL::to('prodimag/'.$acc->codigo.'-G.jpg')}}"}' class="button_type_1 m_bottom_5 d_block w_full t_align_c black state_2 tr_all second_font fs_small tt_uppercase m_top_10"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>Agregar</button>
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