<aside class="col-lg-3 col-md-3 col-sm-3 m_xs_bottom_30">                            
        
    
    <!-- productos mas vendidos widget -->
	<section class="m_bottom_40 m_xs_bottom_30">
		<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Más Vendidos</h5>
		<hr class="divider_bg m_bottom_25">
		<ul>
			@foreach($mas_vendidos as $mv)
			<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
				<div class="clearfix lh_small">
					<a href="{{URL::to('hilados/'.$mv->codigo)}}" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="{{URL::to('prodimag/'.$mv->imagen.'-D.jpg')}}" width="80px" height="80px" alt=""></a>
					<a href="{{URL::to('hilados/'.$mv->codigo)}}" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">{{$mv->descripcion}}</a>
					@if(Auth::check())
					<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">${{$mv->precio}}</b>
					@endif
				</div>
			</li>
			@endforeach                                   
		</ul>
	</section>
    
    
    <!-- productos mas vistos widget -->
	<section class="m_bottom_40 m_xs_bottom_30">
		<h5 class="color_dark tt_uppercase second_font fw_light m_bottom_13">Vistos Recientemente </h5>
		<hr class="divider_bg m_bottom_25">
		<ul>
			@foreach($mas_visitados as $mv)
			<li class="relative t_sm_align_c t_xs_align_l m_bottom_10">
				<div class="clearfix lh_small">
					<a href="{{URL::to('hilados/'.$mv->item()->codigo)}}" class="f_left m_right_15 d_block d_sm_inline_b f_sm_none m_sm_right_0 m_xs_right_15 f_xs_left d_xs_block m_sm_bottom_10 m_xs_bottom_0"><img src="{{URL::to('prodimag/'.$mv->item()->imagen.'-D.jpg')}}" width="80px" height="80px" alt=""></a>
					<a href="{{URL::to('hilados/'.$mv->item()->codigo)}}" class="fs_medium second_font color_dark sc_hover d_block m_bottom_4 d_sm_inline_b d_xs_block p_top_4">{{$mv->item()->descripcion}}</a>
					@if(Auth::check())
					<b class="second_font scheme_color fs_medium d_sm_block d_xs_inline_b">${{$mv->item()->precio}}</b>
					@endif
				</div>
			</li>
			@endforeach                                
		</ul>
	</section>  
</aside>