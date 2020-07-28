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
                    
                    <!-- products table contents -->
					<table class="w_full shopping_cart_table m_bottom_38 m_xs_bottom_30 bg_white">
						<thead class="d_xs_none">
							<tr class="bg_grey_light_2 second_font">
								<th><b>Imagen</b></th>
								<th><b>Producto - Color</b></th>
								<!--th><b>Color</b></th-->
								<!--<th><b>Precio</b></th>-->
								<th><b>Paquetes</b></th>
								<!--<th><b>Importe</b></th>-->
								<th></th>
							</tr>
						</thead>
						<tbody>
							@each('cart-item-max',Cart::content(),'row')
						</tbody>
						<tfoot>
							<tr class="bg_grey_light_2">
								<td colspan="7">
									<a href="{{URL::to('/catalogo')}}" class="button_type_2 d_block tt_uppercase fs_medium second_font f_left tr_all f_xs_none t_align_c m_xs_bottom_5 lbrown state_2"><span class="d_inline_b m_left_10 m_right_10">Continuar Comprando</span></a>
								
                            <!--<section class="col-lg-4 col-md-4 col-sm-4 m_bottom_10 m_xs_bottom_10 f_right">
							<table class="w_full total_sc_table second_font type_2 t_xs_align_c">
								<tbody>
									<tr class="scheme_color">
										<td><b>Total del Pedido:</b></td>
										<td><b class="fs_large shoping-cart-total">${{Cart::total()}}</b></td>
									</tr>
									<tr class="scheme_color">
										<td colspan="2"><b>El total es aproximado y varía de acuerdo al peso. Los precios no incluyen IVA y están sujetos a cambios sin previo aviso.</b></td>
									</tr>
									
								</tbody>
								<tfoot>
									<tr class="bg_grey_light_2 t_align_c">
										<td colspan="2">
											<a href="{{URL::to('confirmar-pedido')}}" class="button_type_2 tt_uppercase fs_medium second_font tr_all lbrown d_block w_full m_top_10 m_bottom_10 confirmar-pedido-button">CONFIRMAR PEDIDO</a>
										</td>
									</tr>
								</tfoot>
							</table>
						</section>-->
                                
                                
                                </td>
							</tr>
						</tfoot>
					</table>                   
					<h2 class="fw_light second_font color_dark m_bottom_12 tt_uppercase">Enviar Pedido</h2>
                    <hr class="divider_bg m_bottom_25">
                    <div class="row">
								<section class="col-lg-12 col-md-12 col-sm-12">
									@if (count($errors) > 0)
									    <div class="alert_box error relative m_bottom_10 fw_light">
									        <ul>
									            @foreach ($errors->all() as $error)
									                <li>{{ $error }}</li>
									            @endforeach
									        </ul>
									    </div>
									@endif
								    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
								      @if(Session::has('alert-' . $msg))
								      <div class="alert_box r_corners color_green {{ $msg }}">
								      <p>{{ Session::get('alert-' . $msg) }} </p>
								      </div>
								      @endif
								    @endforeach
								  	<form id="pedidoform" method="post" action="{{URL::to('confirmar-pedido')}}" class="b_default_layout">
								  		<label for="first_name" class="juira"></label>
												<input type="text" name="first_name" class="juira">
									{{ csrf_field() }}
										<ul>
											<li class="row">
												<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
													<label class="second_font required d_inline_b m_bottom_5 clickable" for="cf_name">Su Nombre </label><br>
													<input type="text" name="nombre" id="cf_name" class="tr_all w_full fw_light">
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 m_bottom_15">
													<label class="second_font required d_inline_b m_bottom_5 clickable" for="cf_email">Su E-Mail </label><br>
													<input type="email" name="email" id="cf_email" class="tr_all w_full fw_light">
												</div>
											</li>
											<li class="m_bottom_15">
												<label class="second_font required d_inline_b m_bottom_5 clickable" for="localidad">Localidad</label><br>
												<input type="text" name="localidad" id="cf_localidad" class="tr_all w_full fw_light">
											</li>
											<li class="m_bottom_15">
												<label class="second_font required d_inline_b m_bottom_5 clickable" for="provincia">Provincia</label><br>
												<input type="text" name="provincia" id="cf_provincia" class="tr_all w_full fw_light">
											</li>
											<li class="m_bottom_15">
												<label class="second_font d_inline_b m_bottom_5 clickable" for="cf_telephone">Tel. de Contacto</label><br>
												<input type="text" name="telefono" id="cf_telephone" class="tr_all w_full fw_light">
											</li>
											<li class="m_bottom_5">
												<label class="second_font d_inline_b m_bottom_5 clickable" for="cf_message">Comentarios</label><br>
												<textarea id="cf_message" name="mensaje" rows="6" class="tr_all w_full fw_light"></textarea>
											</li>
											<li>
												<button type="submit" class="button_type_2 black state_2 tr_all second_font fs_medium tt_uppercase d_inline_b"><span class="m_left_10 m_right_10 d_inline_b">Enviar Pedido</span></button>
											</li>
										</ul>
									</form>
								</section>
							</div>
				</div>
			</div>
			<style>
				#pedidoform label {
					text-transform: uppercase;
					font-weight: bold;
				}
			</style>
@endsection