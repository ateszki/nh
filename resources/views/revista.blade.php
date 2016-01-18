@extends('nube')
@section('contenido')
			<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container color_dark">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Revista Nube</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<main class="container">
					<div class="d_table w_full d_xs_block m_bottom_6">
						<div class="col-lg-9 col-md-9 col-sm-9 f_none d_table_cell v_align_m d_xs_block m_xs_bottom_10 p_xs_left_0 px_right_0">
							<h2 class="fw_light second_font color_dark tt_uppercase m_bottom_12">Revista Nube</h2>
                            <hr class="divider_bg m_bottom_13">
						</div>
					</div>
					<div class="portfolio_isotope_container four_columns wrapper m_bottom_10 m_xs_bottom_0" data-isotope-options='{
						"itemSelector": ".portfolio_isotope_item",
			  			"layoutMode": "fitRows"
						}'>
						@foreach($revistas as $numero => $revista)
						<!-- revista item -->
						<div class="portfolio_isotope_item living_room">
							<div class="frame_container relative r_image_container db_xs_centered">
								<figure class="relative">
									<div class="d_block wrapper m_bottom_16 scale_image_container popup_container relative">
										<img src="{{URL::to('revista-nube/'.$numero.'/tapa')}}" alt="" height="348" width="250" class="tr_all scale_image">
										<ul class="open_buttons_container relative hr_list">
											<li class="m_right_5 tr_all"><a href="{{URL::to('revista-nube/'.$numero.'/sumario')}}" class="button_type_6 vc_child d_block t_align_c border_white tr_delay jackbox" data-group="lightbox" data-title="Sumario #21"><i class="fa fa-plus d_inline_m"></i></a></li>
											<li class="m_right_5 tr_all"><a href="{{URL::to('revista-nube/'.$numero.'/pdf')}}" target="_blank" class="button_type_6 vc_child d_block t_align_c border_white tr_delay"><i class="fa fa-download d_inline_m"></i></a></li>
										</ul>
									</div>
									<figcaption>
										<h5 class="second_font m_bottom_5 lh_small"><b>Revista #{{$numero}}</b></h5>
										<a href="{{URL::to('revista-nube/'.$numero.'/pdf')}}" target="_blank" class="fw_light color_light color_dark_hover">Descargar Pdf</a>
									</figcaption>
								</figure>
							</div>
						</div>
                        @endforeach
					</div>
                    
                    
                    <hr class="m_bottom_5 divider_white">
							<div class="d_table w_full">
								<div class="col-lg-6 col-md-6 col-sm-6 d_xs_block v_align_m d_table_cell f_none fs_medium color_light fw_light m_xs_bottom_5">Mostrando 1 - 5 de 45</div>
								
                                <div class="col-lg-6 col-md-6 col-sm-6 d_xs_block v_align_m d_table_cell f_none t_align_r t_xs_align_l p_xs_left_0">
									
                                    <!-- pagination -->
									<nav class="d_inline_b">
										<ul class="hr_list">
											<li class="m_bottom_3 m_right_3"><a href="#" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small"><i class="fa fa-angle-left d_inline_m"></i></a></li>
											<li class="m_bottom_3 m_right_3"><a href="#" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c border_black"><span class="d_inline_m fs_small">1</span></a></li>
											<li class="m_bottom_3 m_right_3"><a href="#" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c"><span class="d_inline_m fs_small">2</span></a></li>
											<li class="m_bottom_3 m_right_3"><a href="#" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c"><span class="d_inline_m fs_small">3</span></a></li>
											<li class="m_bottom_3 m_right_3"><a href="#" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small"><i class="fa fa-angle-right d_inline_m"></i></a></li>
										</ul>
									</nav>
								</div>
							</div>
                    
                    
				</main>
			</div>
@endsection