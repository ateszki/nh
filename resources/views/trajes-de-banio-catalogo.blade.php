@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / Trajes de baño
				</div>
			</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">
                    
                    @include('mallas-col-izq')
                        
						<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
							
                            <h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Trajes de baño</h4>  
							<p>&nbsp;</p>
							<p>Pronto podrá hacer su pedido de trajes de baño desde aquí. </p>
							<p>Mientras tanto lo invitamos a descargar el catálogo en formato PDF</p>
							<p>&nbsp;</p>
							<p><a class="cursor f_left button_type_1 m_bottom_5 d_block t_align_r lbrown state_2 tr_all second_font fs_small tt_uppercase" href="{{URL::to('/catalogos/catalogo-trajes-de-banio.pdf')}}">Descargar Catálogo (3.7 Mb aprox.)</a></p>
							
						</main>
					</div>
				</div>
			</div>
@endsection