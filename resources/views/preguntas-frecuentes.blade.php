@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Preguntas Frecuentes</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset">
				<div class="container">
					<div class="row">                        
						<section class="col-lg-12 col-md-12 col-sm-12">
							<h2 class="fw_light second_font color_dark m_bottom_12 tt_uppercase">Preguntas Frecuentes</h2>
                            <hr class="divider_bg m_bottom_30">
                     	 </section>                     
                     
                    	 <section class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_xs_bottom_30">
							<dl class="accordion toggle">
								<dt class="primary_font color_dark clickable tr_all m_bottom_3 relative">¿Puedo hacer una compra minorista?</dt>
								<dd class="fw_light">De momento no. Próximamente estará disponible una tienda minorista online. </dd>
								
                                <dt class="primary_font clickable tr_all m_bottom_3 relative border_light_3 color_light">¿Que necesito para hacer un pedido mayorista?</dt>
								<dd style="display: none;" class="fw_light">Primero solicitar una cuenta de acceso al sistema de pedidos online mediante el <a href="{{URL::to('contacto')}}">formulario de contacto.</a> Luego al ingresar a ver <a href="{{URL::to('hilados')}}">hilados</a>, <a href="{{URL::to('accesorios')}}">accesorios</a> o <a href="{{URL::to('trajes-de-banio')}}">trajes de baño</a> ingresar con el usuario y contraseña recibidos y realizar el pedido.</dd>
								
                                
                            </dl>
						</section>
                        
                         </div>                      
                      </div>
                   </div>
@endsection