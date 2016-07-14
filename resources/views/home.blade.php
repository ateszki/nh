@extends('nube')
@section('contenido')
<div class="page_section_offset p_top_0 bg-body">
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_sm_bottom_30 animated hidden" data-animation="fadeInTop" data-animation-delay="200">
							
                            <!-- home slider -->
							<div class="flexslider">
								<ul class="slides">
									<li><a href="{{URL::to('hilados/5012')}}"><img src="images/slider-01.jpg" alt=""></a></li>
									<li><img src="images/slider-02.jpg" alt=""></li>
									<li><img src="images/slider-03.jpg" alt=""></li>
								</ul>
							</div>
						</div>
					</div>
                             
                    <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 m_bottom_0 m_xs_bottom_0 t_sm_align_c t_align_c">
                           <div class="represent_wrap sh_container m_bottom_30 clearfix">
                            <div class="item_represent same_height type_2 m_xs_bottom_30 h_inherit t_sm_align_c tr_delay f_left animated hidden" data-animation="fadeInLeft" data-animation-delay="100">                           
                                   <div class="d_inline_m m_sm_bottom_15 m_xs_bottom_0 m_right_6 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="fa fa-lock d_inline_m"></i></div>
                                   <div class="description d_inline_m lh_medium">
                                      <p class="color_dark tt_uppercase second_font m_bottom_4 fs_ex_large"><b>Compra Segura</b></p>
                                      <small class="fw_default">Realice su Pedido de forma segura y rápida</small>
                                  </div>
                              </div>
                              
                                <div class="item_represent same_height type_2 m_xs_bottom_30 h_inherit t_sm_align_c tr_delay f_left animated hidden" data-animation="fadeInLeft" data-animation-delay="100">
                                    <div class="d_inline_m m_sm_bottom_15 m_xs_bottom_0 m_right_6 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="fa fa-truck d_inline_m"></i></div>
                                    <div class="description d_inline_m lh_medium">
                                        <p class="color_dark tt_uppercase second_font m_bottom_4 fs_ex_large"><b>Envio de Pedidos</b></p>
                                        <small class="fw_default">Realizamos envios a cualquier punto del País </small>
                                    </div>
                                </div>
                                
                                <div class="item_represent same_height type_2 h_inherit t_sm_align_c tr_delay f_left animated hidden" data-animation="fadeInLeft" data-animation-delay="100">
                                    <div class="d_inline_m m_sm_bottom_15 m_xs_bottom_0 m_right_6 color_lbrown icon_wrap_1 t_align_c vc_child"><i class="fa fa-certificate d_inline_m"></i></div>
                                    <div class="description d_inline_m lh_medium">
                                        <p class="color_dark tt_uppercase second_font m_bottom_4 fs_ex_large"><b>Garantía de Calidad</b></p>
                                        <small class="fw_default">40 años de trayectoria respaldan nuestra calidad </small>
                                    </div>
                                </div>  
                            
                         </div>
                         </div>
                    </div>
                             
                             
				</div>
                                               
                        
				<!--</section>-->
			</div>
@endsection