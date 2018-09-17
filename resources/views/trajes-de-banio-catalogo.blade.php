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
                    
                       
						<main class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2  m_bottom_30 m_xs_bottom_10">
							
                            <div><a href="{{URL::to('/contacto')}}"><img src="{{URL::to('/images/slider-05.jpg')}}"/></a></div>
							
							
						</main>
					</div>
				</div>
			</div>
@endsection