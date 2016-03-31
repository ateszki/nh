<!-- shopping cart -->
<li class="relative open_mini_shopping_cart d_xs_inline_b t_xs_align_l" id="header-cart">
	<button class="color_dark active_lbrown tr_all" data-open-dropdown="#shopping_cart">
		<i class="fa fa-shopping-cart fs_large"></i><sup class='header-cart-count'>{{Cart::count()}}</sup>
		<b class="second_font fs_small d_inline_b m_left_10 header-cart-total">${{Cart::total()}}</b>
	</button>
	<div id="shopping_cart" data-show="fadeInUp" data-hide="fadeOutDown" class="bg_grey_light dropdown animated">
		<div class="sc_header fs_small fw_light">Productos agregados</div>
		<hr class="divider_white">
		<a href="{{URL::to('revisar-pedido')}}" role="button" class="button_type_2 tt_uppercase fs_medium second_font d_block t_align_c black state_2 m_bottom_5">Revisar Pedido</a>
		<a href="{{URL::to('confirmar-pedido')}}" role="button" class="t_align_c tt_uppercase w_full second_font d_block fs_medium button_type_2 lbrown tr_all confirmar-pedido-button">Confirmar Pedido</a>
		<ul class="shopping_cart_list m_bottom_4">
			@each('cart-item-min',Cart::content(),'row')
		</ul>
		<ul class="fs_medium second_font color_dark m_bottom_15">
			<li><b><span class="d_inline_b total_title">Total:</span><span class='header-cart-total'>${{Cart::total()}}</span></b></li>
		</ul>
	</div>
</li>