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
							
                            <h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Trajes de baño</h4>  
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Primavera verano 2016 - 2017 </h4>
							<p>&nbsp;</p>
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Línea Joven</h4>
							@foreach($joven as $j)
							<div><img src="{{URL::to('images/trajes-de-banio/joven/'.basename($j))}}"/></div>
							@endforeach
							<p>&nbsp;</p>
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Línea Señora</h4>
							@foreach($seniora as $s)
							<div><img src="{{URL::to('images/trajes-de-banio/seniora/'.basename($s))}}"/></div>
							@endforeach
							
						</main>
					</div>
				</div>
			</div>
@endsection