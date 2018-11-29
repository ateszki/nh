@extends('nubepdf')
@section('contenido')
<!-- breadcrumbs -->
			@foreach($hilados as $hilado)
			<?php 
				$h = \App\Item::where('codigo','=',$hilado->codigo)->first();
				$colores = $h->colores();
			?>
			<!-- main content -->
			<div class="page_section bg-body" @if(!$loop->first)style="page-break-before:always" @endif>
				<p>&nbsp;</p>

				@include('headerpdf')

				<div class="container">
					<div class="row">
                    
                        
						<main class="col-lg-12 col-md-12 col-sm-12 m_bottom_30 m_xs_bottom_10">
							<h4 class="second_font color_dark tt_uppercase fw_default m_bottom_10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{preg_replace('/\*[a-zA-Z0-9 ]*/','',$hilado->descripcion)}} </h4>  
                                                
                            <hr class="divider_bg m_bottom_23">	 
                            
                            @if(count($colores) > 1 && $detalle)
						  	<div class="bg_grey_light_2">
                              <div class="container">
                                  <div class="row">
                                      <div class="col-lg-8 col-lg-offset-2 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                                      	<img src="{{URL::to('prodimag/'.$hilado->imagen.'-Z.jpg')}}" />
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif
							<!-- isotope -->
							<div id="can_change_layout" class="category_isotope_container five_columns wrapper m_bottom_10 m_xs_bottom_0" data-isotope-options='{
								"itemSelector": ".category_isotope_item",
					  			"layoutMode": "fitRows"
							     }' >
							     <table width="100%" border="0" cellpadding="4" cellspacing="4">
							     	<tr>
							     		<?php $i = 0;?>
							     	@foreach($colores as $color)
							     		<td width="18%" style="border:none;">
							     			<!-- producto single -->
											
															<img src="{{URL::to('prodimag/'.$color['codigo'].'-G.jpg')}}" alt="" class="c_image_1 tr_all imagezoom" data-zoom-image="@if(file_exists('prodimag/'.$color['codigo'].'-Z.jpg')){{URL::to('prodimag/'.$color['codigo'].'-Z.jpg')}}@else{{URL::to('prodimag/'.$color['codigo'].'-G.jpg')}}@endif">
														
															<div>
																{{substr($color["descripcion"],strpos($color["descripcion"],"-")+2)}}<br>({{substr($color["codigo"],-3)}})
															</div>
															
			                                <!-- /producto single --> 
							     		</td>
							     		<?php $i++;
							     		if($i==5){
							     			$i = 0;
							     			?>
							     		</tr><tr>
							     			<?php
							     		}
							     		?>
							     	@endforeach
							     	</tr>
							     </table>

								                           
                                
							</div>
                            
						</main>
					</div>
				</div>
			</div>
			@endforeach
@endsection