@if ($paginator->lastPage() > 1)
<nav class="d_inline_b f_right">
	<ul class="hr_list">
		<li class="m_right_3 {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
			<a href="{{ $paginator->url(1) }}&orderby={{$orderby}}" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small"><i class="fa fa-angle-left d_inline_m"></i></a>
		</li>
		@for ($i = 1; $i <= $paginator->lastPage(); $i++)
	        <li class="m_right_3">
	            <a class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c {{ ($paginator->currentPage() == $i) ? ' border_black' : '' }}"" href="{{ $paginator->url($i) }}&orderby={{$orderby}}"><span class="d_inline_m fs_small">{{ $i }}</span></a>
	        </li>
    	@endfor
		<li class="m_right_3 {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
			<a href="{{ $paginator->url($paginator->currentPage()+1) }}&orderby={{$orderby}}" class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small"><i class="fa fa-angle-right d_inline_m"></i></a>
		</li>
	</ul>
</nav>
@endif