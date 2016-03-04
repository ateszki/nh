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
								<th><b>Nombre del Producto</b></th>
								<th><b>Código</b></th>
								<th><b>Precio</b></th>
								<th><b>Cantidad</b></th>
								<th><b>Importe</b></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@each('cart-item-max',Cart::content(),'row')
						</tbody>
						<tfoot>
							<tr class="bg_grey_light_2">
								<td colspan="7">
									<a href="{{URL::to('/hilados')}}" class="button_type_2 d_block tt_uppercase fs_medium second_font f_left tr_all f_xs_none t_align_c m_xs_bottom_5 lbrown state_2"><span class="d_inline_b m_left_10 m_right_10">Continuar Comprando</span></a>
								
                            <section class="col-lg-4 col-md-4 col-sm-4 m_bottom_10 m_xs_bottom_10 f_right">
							<table class="w_full total_sc_table second_font type_2 t_xs_align_c">
								<tbody>
									<tr class="scheme_color">
										<td><b>Total del Pedido:</b></td>
										<td><b class="fs_large shoping-cart-total">${{Cart::total()}}</b></td>
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
						</section>
                                
                                
                                </td>
							</tr>
						</tfoot>
					</table>                   
					
				</div>
			</div>
@endsection