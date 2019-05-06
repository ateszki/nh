@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a>  
				</div>
			</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container">
					<div class="row">
                    
                    	<main class="col-lg-9 col-md-9 col-sm-9 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">Tester</h4>  
                                                
                            <hr class="divider_bg m_bottom_23">	 
                            <div>
                            	@foreach($errores as $err)
                            	<div style="color: red;">{{$err}}</div>
                            	@endforeach

                            	@foreach($mensajes as $msg)
                            	<div style="color:green;">{{$msg}}</div>
                            	@endforeach
                            </div>
						</main>
					</div>
				</div>
			</div>
@endsection