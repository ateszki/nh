@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container color_dark">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <span class="color_light">Revisar Pedido</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container numbered_title_init">
					<h2 class="fw_light second_font color_dark m_bottom_12 tt_uppercase">Revise su Pedido</h2>
                    <hr class="divider_bg m_bottom_25">
                    
                    <!-- main content -->
                   <div class="page_section bg-body">
                      <div class="container">
                          <div class="row bg_white">                        
                              <section class="col-lg-12 col-md-12 col-sm-12">
                              
                              <div class="col-lg-8 col-md-8 col-sm-8 m_bottom_20 m_xs_bottom_20 lh_large">
                                  <p class="second_font fw_light m_bottom_8 m_xs_bottom_10 fs_big_2 m_top_15">Su Pedido se encuentra vacío.</p>
                                  <p class="fs_large fw_light">Para poder realizar un Pedido primero debe agregar los Productos que desea.</p>
                              </div>
                              <div class="col-lg-4 col-md-4 col-sm-4 t_align_r m_top_10 t_xs_align_l">
                                  <a href="{{URL::to('/hilados')}}" class="second_font tt_uppercase color_white m_top_15 fs_medium button_type_2 lbrown d_inline_b">Agregar Productos</span></a>
                              </div>
                              </section>
                              
                          </div>
                      </div>
                   </div>
             
					
				</div>
			</div>
@endsection