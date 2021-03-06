<!--popup-->
		<div class="init_popup" id="add_to_cart_popup">
			<div class="popup init">
				<div class="clearfix m_bottom_15">
					<span class="f_left d_block m_right_20">
						<img src="" width="80px" height="80px" alt="">
					</span>
					<p class="second_font fs_large color_dark">1 x Producto de Ejemplo<br> agregado a tu Pedido</p>
				</div>
				<div class="clearfix">
					<a href="#" class="button_type_2 d_block f_left t_align_c grey state_2 tr_all second_font fs_medium tt_uppercase m_top_15">Continuar Comprando</a>
					<a href="pages_shopping_cart.html" class="button_type_2 d_block f_right t_align_c grey state_2 tr_all second_font fs_medium tt_uppercase m_top_15">Ver Pedido</a>
				</div>
				<button class="close_popup fw_light fs_large tr_all">x</button>
			</div>
		</div>

		<!--popup-->
		<div class="init_popup" id="quick_view">
			<div class="popup init">
				<div class="clearfix">
					<div class="product_preview f_left f_xs_none wrapper m_xs_bottom_15">
						<div class="d_block relative r_image_container" id="qv_image">
							<img id="zoom" src="" alt="">
							<!--<div class="product_label fs_ex_small circle color_white bg_lbrown t_align_c vc_child tt_uppercase"><i class="d_inline_m">Oferta!</i></div>-->
						</div>
					</div>
                    
					<div class="product_description f_left f_xs_none">
						<h3 class="second_font m_bottom_10 product_title" id="qv_nombre">Nombre del Producto</h3>                        
						<ul class="m_bottom_14">
							<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Código:</span> <span class="color_dark fw_light" id="qv_codigo"></span></li>
							<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Color:</span> <span class="scheme_color fw_light" id="qv_color"></span></li>
						</ul>
						<hr class="divider_light m_bottom_15">
						<p class="fw_light m_bottom_14 color_grey" id="qv_texto"></p>
						<div class="product_options">

							<footer class="bg_grey_light_2">
								<!--<div class="fs_big second_font m_bottom_17"><s class="color_light" id="qv_precio_antes"></s> <b class="scheme_color" id="qv_precio"></b> <em>LOS PRECIOS NO INCLUYEN IVA</em></div>-->
								<div class="clearfix">
									<div class="quantity clearfix t_align_c f_left f_md_none m_right_10 m_md_bottom_3">
										<button class="f_left d_block minus black_hover tr_all bg_white">-</button>
										<input type="text" value="1" name=""  id="qv_cant" class="f_left color_light">
										<button class="f_left d_block black_hover tr_all bg_white">+</button> &nbsp;Paqs. de 5kg aprox. 
									</div>
									<br class="d_md_block d_none">
									<button  data-url='{{ URL::to("/carrito/add") }}' class="add_to_cart button_type_2 d_block f_sm_none m_sm_bottom_3 t_align_c lbrown state_2 tr_all second_font fs_medium tt_uppercase f_left m_right_3 product_button " id="qv_agregar"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>AGREGAR AL PEDIDO</button>
									<br class="d_sm_block d_none">
								</div>
							</footer>
						</div>
					</div>
				</div>
				<button class="close_popup fw_light fs_large tr_all">x</button>
			</div>
		</div> 
		<!--popup-->
		<div class="init_popup" id="quick_view_tb">
			<div class="popup init">
				<div class="clearfix">
					<div class="product_preview f_left f_xs_none wrapper m_xs_bottom_15">
						<div class="d_block relative r_image_container" id="qvtb_image">
							<img id="zoom" src="" alt="">
							<!--<div class="product_label fs_ex_small circle color_white bg_lbrown t_align_c vc_child tt_uppercase"><i class="d_inline_m">Oferta!</i></div>-->
						</div>
					</div>
                    
					<div class="product_description f_left f_xs_none">
						<h3 class="second_font m_bottom_10 product_title" id="qvtb_nombre">Nombre del Producto</h3>                        
						<ul class="m_bottom_14">
							<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Código:</span> <span class="color_dark fw_light" id="qvtb_codigo"></span></li>
							
						</ul>
						<hr class="divider_light m_bottom_15">
						
						<div class="fs_big second_font m_bottom_17"><s class="color_light" id="qvtb_precio_antes"></s> <b class="scheme_color" id="qvtb_precio"></b> <em>LOS PRECIOS NO INCLUYEN IVA</em></div>
								
						<!-- seleccionar Color -->
                        <div class=" relative w_half d_inline_m m_right_2 m_bottom_20">
                            <label>Colores</label>
                            <select id="qvtb_colores">
                                <option value=""></option>
                            </select>
                            </div>
                        
                        <!-- seleccionar Talle -->
                        <div class=" relative w_half d_inline_m m_right_2 m_bottom_20">
                            <label>Talles</label>
                            <select id="qvtb_talles">
                                <option value=""></option>
                            </select>
                      	</div>
						<div class="product_options">

							<footer class="bg_grey_light_2">
								<div class="clearfix">
									<div class="quantity clearfix t_align_c f_left f_md_none m_right_10 m_md_bottom_3">
										<button class="f_left d_block minus black_hover tr_all bg_white">-</button>
										<input type="text" value="1" name=""  id="qv_cant" class="f_left color_light">
										<button class="f_left d_block black_hover tr_all bg_white">+</button> &nbsp;unidades. 
									</div>
									<br class="d_md_block d_none">
									<button  data-url='{{ URL::to("/carrito/add") }}' class="add_to_cart button_type_2 d_block f_sm_none m_sm_bottom_3 t_align_c lbrown state_2 tr_all second_font fs_medium tt_uppercase f_left m_right_3 product_button " id="qv_agregar_tb"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>AGREGAR AL PEDIDO</button>
									<br class="d_sm_block d_none">
								</div>
							</footer>
						</div>
					</div>
				</div>
				<button class="close_popup fw_light fs_large tr_all">x</button>
			</div>
		</div> 




		<!--popup-->
		<div class="init_popup" id="quick_view_acc">
			<div class="popup init">
				<div class="clearfix">
					<div class="product_preview f_left f_xs_none wrapper m_xs_bottom_15">
						<div class="d_block relative r_image_container" id="qv_image">
							<img id="zoom" src="" alt="">
							<!--<div class="product_label fs_ex_small circle color_white bg_lbrown t_align_c vc_child tt_uppercase"><i class="d_inline_m">Oferta!</i></div>-->
						</div>
					</div>
                    
					<div class="product_description f_left f_xs_none">
						<h3 class="second_font m_bottom_10 product_title" id="qv_nombre">Nombre del Producto</h3>                        
						<ul class="m_bottom_14">
							<li class="m_bottom_3"><span class="project_list_title second_font d_inline_b">Código:</span> <span class="color_dark fw_light" id="qv_codigo"></span></li>
						</ul>
						<hr class="divider_light m_bottom_15">
						<p class="fw_light m_bottom_14 color_grey" id="qv_texto"></p>
						<div class="product_options">

							<footer class="bg_grey_light_2">
								<div class="fs_big second_font m_bottom_17"><s class="color_light" id="qv_precio_antes"></s> <b class="scheme_color" id="qv_precio"></b> <em>LOS PRECIOS NO INCLUYEN IVA</em></div>
								<div class="clearfix">
									<div class="quantity clearfix t_align_c f_left f_md_none m_right_10 m_md_bottom_3">
										<button class="f_left d_block minus black_hover tr_all bg_white">-</button>
										<input type="text" value="1" name=""  id="qv_cant" class="f_left color_light">
										<button class="f_left d_block black_hover tr_all bg_white">+</button> &nbsp; 
									</div>
									<br class="d_md_block d_none">
									<button  data-url='{{ URL::to("/carrito/add") }}' class="add_to_cart button_type_2 d_block f_sm_none m_sm_bottom_3 t_align_c lbrown state_2 tr_all second_font fs_medium tt_uppercase f_left m_right_3 product_button " id="qv_agregar"><i class="fa fa-shopping-cart d_inline_m m_right_9"></i>AGREGAR AL PEDIDO</button>
									<br class="d_sm_block d_none">
								</div>
							</footer>
						</div>
					</div>
				</div>
				<button class="close_popup fw_light fs_large tr_all">x</button>
			</div>
		</div> 
