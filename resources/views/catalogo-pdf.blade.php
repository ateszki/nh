@extends('nubepdf')
@section('contenido')
<!-- breadcrumbs -->
			@foreach($hilados as $hilado)
			
			<!-- main content -->
			<div class="page_section" @if(!$loop->first) style="page-break-before:always" @endif>
				<div class="container">
					<div class="row">
                    
                        
						<main class="col-lg-12 col-md-12 col-sm-12">
							
                            @if(count($hilado->colores) > 1 && $detalle)
						  	<div>
                              <div>
                                  <table width="100%" border="0" cellpadding="4" cellspacing="4">
							     	<tr>
							     		<td style="border:none;" width="50%" valign="middle" align="center">
                                  		<h1 class="m_bottom_10" style="font-size: 48px;">{{preg_replace('/\*[a-zA-Z0-9 ]*/','',$hilado->descripcion)}} </h1>
                                  		<h4 style="font-size: 36px;" class="m_bottom_10">CÓDIGO: {{$hilado->codigo}}</h4>
                                  		</td>
                                      <td style="border:none;" width="50%" valign="middle">
                                      	<img src="{{URL::to('prodimag/'.$hilado->imagen.'-Z.jpg')}}" width="{{($presentacion == 'MADEJA') ? '350px' : '150px'}}" />
                                      </td>
                                  	</tr>
                              	</table>
                              </div>
                          </div>
                          @endif
							<!-- isotope -->
							<div class="" >
							     <table width="100%" border="0" cellpadding="4" cellspacing="4">
							     	<tr>
							     		<?php $i = 0;?>
							     	@foreach($hilado->colores as $color)
							     		<td width="18%" style="border:none;" align="center">
							     			<!-- producto single -->
											
															<img src="{{URL::to('prodimag/'.$color['codigo'].'-G.jpg')}}" @if($presentacion == 'OVILLO') width='70px' @else width='140px' @endif>
														
															<div>
															
															<h2 class="m_bottom_10">{{substr($color["descripcion"],strpos($color["descripcion"],"-")+2)}}<br>({{substr($color["codigo"],-3)}})</h2>
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
							     	<?php 
							     		if($i > 0){
							     			?>
							     			<td style="border:none;" colspan="{{5-$i}}">&nbsp;</td>
							     			<?php
							     		}
							     	?>
							     	</tr>
							     </table>
							</div>
						</main>
					</div>
				</div>
			</div>
			@endforeach
@endsection