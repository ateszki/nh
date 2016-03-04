@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container color_dark">
					<a href="{{URL::to('/')}}" class="sc_hover">Home</a> / <span class="color_light">Ingreso Clientes</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset">
				<div class="container numbered_title_init">
					<h2 class="fw_light second_font color_dark m_bottom_27 tt_uppercase">Ingreso Clientes</h2>
                    
					<!-- ingreso clientes -->
					<section class="m_bottom_35 m_xs_bottom_30">						
                        
						<hr class="divider_bg m_bottom_23">
                        
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 m_xs_bottom_30 second_font">
								<mark class="fs_large bg_transparent scheme_color d_block m_bottom_20">Acceso MAYORISTA</mark>
								<p class="m_bottom_15">Condiciones de compra Mayorista:</p>
								<ul class="vr_list_type_2 m_bottom_15">
									<li><i class="fa fa-check scheme_color"></i>Compra mínima cinco (5) paquetes </li>
									<li><i class="fa fa-check scheme_color"></i>Enviar CUIT para Facturación </li>
                                    <li><i class="fa fa-check scheme_color"></i>Constancia de Ingresos Brutos </li>                                  
								</ul>								
							</div>
                            
							<div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30 m_right_40">								
                                <div class="m_bottom_20">Ya tiene sus credenciales de Cliente?<br/> Ingrese su Usuario y Contraseña</div>	
								<form method="POST" action="{{URL::to('auth/login')}}">
								{!! csrf_field() !!}
									<ul>
										<li class="m_bottom_15">
											<label for="reg_email" class="clickable d_inline_b m_bottom_5 second_font">Usuario</label><br>
											<input name="email" id="email" class="tr_all w_full fs_medium color_light">
										</li>
										<li class="m_bottom_10">
											<label for="reg_pass" class="clickable d_inline_b m_bottom_5 second_font">Contraseña</label><br>
											<input type="password" name="password" class="tr_all w_full fs_medium color_light">
										</li>
										<li class="clearfix second_font">
											<button type="submit" class="button_type_2 tt_uppercase fs_medium f_left t_align_c black state_2 m_bottom_30 tr_all"><span class="d_inline_b m_left_10 m_right_10">INGRESAR</span></button>
											<div class="f_left t_align_l fs_medium lh_small">	
                                            <div class="m_bottom_5">Todavía no tiene sus acceso?</div>											
												<a href="{{URL::to('contacto')}}" class="sc_hover">Solicitar su Usuario y Contraseña</a>
											</div>
										</li>
									</ul>
								</form>
							</div>
						
                        
                             <div class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30 second_font f_right">
								<mark class="fs_large bg_transparent scheme_color d_block m_bottom_20">Acceso MINORISTA</mark>
								<p class="m_bottom_15">Próximamente</p>
														
							</div>
                            
                       </div> 
					</section>
				</div>
			</div>
@endsection