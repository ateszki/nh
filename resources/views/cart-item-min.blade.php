<li class="relative">
	<div class="clearfix lh_small">
		<span class="f_left m_right_10 d_block"><img src="{{URL::to('prodimag/'.$row->id.'-D.jpg')}}" width="60px" height="60px" alt=""></span>
		<span class="fs_medium second_font color_dark d_block m_bottom_4">{{$row->name}}</span>
		<p class="fs_medium">{{$row->qty}} x <b class="color_dark">${{$row->price}}</b></p>
        @if($row->options->has('color'))
        <ul class="fw_light fs_small lh_small">
			<li>Color: <span class="color_dark">{{$row->options->color}}</span></li>											
		</ul>
		@endif
	</div>
	<hr class="divider_white m_top_15 m_bottom_0">
	<span class="close fs_small color_light tr_all color_dark_hover fw_light cart_remove header_cart_remove" data-itemid="{{$row->rowid}}" data-url="{{URL::to('carrito/remove')}}/{{$row->rowid}}">x</span>
</li>