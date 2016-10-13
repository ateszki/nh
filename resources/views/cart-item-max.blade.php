<tr>
	<td data-cell-title="Product Image"><img src="{{URL::to('prodimag/'.$row->id.'-D.jpg')}}" width="100px" height="100px" class="w_full" alt=""></td>
	<td data-cell-title="Product Name">
		<span class="second_font fs_large d_inline_b m_bottom_4">{{$row->name}} </span>
	</td>
	<td data-cell-title="SKU" class="second_font">{{$row->id}}</td>
	<!--<td data-cell-title="Price" class="second_font"><span class="color_dark">${{$row->price}}</span></td>-->
	<td data-cell-title="Quantity">
		<div class="quantity clearfix t_align_c">
			<button class="f_left d_block minus black_hover tr_all">&#45;</button>
			<input type="text" class="f_left color_light item-qty item-qty-carrito" data-rowid='{{$row->id}}' data-urlheader="{{URL::to('carrito/header-cart')}}" data-url="{{URL::to('carrito/update')}}/{{$row->rowid}}" readonly name="" value="{{$row->qty}}">
			<button class="f_left d_block black_hover tr_all">&#43;</button>
		</div>
	</td>
	<!--<td data-cell-title="Total" class="second_font"><b class="color_dark item-subtotal">${{$row->subtotal}}</b></td>-->
	<td class="t_align_c">
        <!--<button class="button_type_8 black_hover grey state_2 m_xs_bottom_0 tr_all color_dark t_align_c vc_child m_bottom_5 tooltip_container relative shoping-cart-update" data-urlheader="{{URL::to('carrito/header-cart')}}" data-url="{{URL::to('carrito/update')}}/{{$row->rowid}}"><i class="fa fa-check fs_large d_inline_m"></i><span class="tooltip right hidden animated" data-show="fadeInRight" data-hide="fadeOutRight">Actualizar Producto</span></button><br class="d_inline_b">-->
  		<button class="button_type_8 black_hover grey state_2 m_xs_bottom_0 tr_all color_dark t_align_c vc_child tooltip_container relative shoping-cart-remove" data-itemid="{{$row->rowid}}" data-url="{{URL::to('carrito/remove')}}/{{$row->rowid}}"><i class="fa fa-times fs_large d_inline_m"></i><span class="tooltip right hidden animated" data-show="fadeInRight" data-hide="fadeOutRight">Eliminar Producto</span></button>
	</td>
</tr>