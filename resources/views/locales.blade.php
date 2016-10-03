@extends('nube')
@section('contenido')
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container color_dark">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Locales</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container numbered_title_init">
					<h2 class="fw_light second_font color_dark m_bottom_12 tt_uppercase">Locales Nube</h2>
                    <hr class="divider_bg m_bottom_13">
					
                   <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30">
							<h5 class="fw_light second_font tt_uppercase color_dark m_bottom_13"></h5>
							<p class="fw_light">Las características de los locales fueron estratégicamente delineadas para lograr la correcta comunicación de la marca, otorgándole alto grado de posicionamiento en el mercado, y ofreciendo la mejor alternativa para la exhibición y venta de los productos</p>
						</div>
                        
               
         <div class="col-lg-6 col-md-6 col-sm-6 m_bottom_30">   
         <p class="fw_light d_inline_m m_right_5">Representantes exclusivos Nube</p> <img src="images/mm_20_green.png" width="12px" height="20px" alt=""> 
         <p class="fw_light d_inline_m m_right_5 m_left_30">Otros Locales Nube</p> <img src="images/mm_20_red.png" width="12px" height="20px" alt="">         
         </div> 
              
         <div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30">   
         <h5 class="fw_light second_font tt_uppercase color_dark m_bottom_13">Encuentre su Local más cercano</h5> 
         <hr class="divider_bg m_bottom_25">
                 
         <!--<markers>
         <div class="marker" id="1" link="" otros="si"  nombre="CAPITAL FEDERAL" direccion="Scalabrini Ortiz 999" lat="-34.5950729" lng="-58.43119469999999"></div>
         <div class="marker" id="2" link="" otros="si"  nombre="BARILOCHE" direccion="Perito Moreno 818" lat="-41.1357701" lng="-71.29843519999997"></div>
         <div class="marker" id="3" link="" otros="si"  nombre="NEUQU&Eacute;N" direccion="Lainez 141" lat="-38.9566355" lng="-68.06622970000001"></div>
         <div class="marker" id="4" link="" otros="si"  nombre="LINIERS" direccion="Cuzco 306" lat="-34.6362244" lng="-58.528069200000004"></div>
         <div class="marker" id="5" link="" otros="si"  nombre="LOMAS DE ZAMORA" direccion="C. Pellegrini 78" lat="-34.7600947" lng="-58.39797250000004"></div>
		 </markers>
         -->
	<div id="markers" style="display:none;">
    <div class="marker" id="1" link="" otros="no" nombre="CAPITAL FEDERAL" direccion="Scalabrini Ortiz 999" lat="-34.5950729" lng="-58.43119469999999"></div>
	<div class="marker" id="2" link="" otros="no" nombre="LOMAS DE ZAMORA" direccion="C. Pellegrini 78" lat="-34.7600947" lng="-58.39797250000004"></div>
	<div class="marker" id="3" link="" otros="no" nombre="MORON" direccion="Sarmiento 866" lat="-34.6480689" lng="-58.62061249999999"></div>
	<div class="marker" id="4" link="" otros="no" nombre="ESCOBAR" direccion="E Tapia de Cruz 998" lat="-34.3501471" lng="-58.79753049999999"></div>
    <div class="marker" id="5" link="" otros="no" nombre="BARILOCHE" direccion="Perito Moreno 818" lat="-41.1357701" lng="-71.29843519999997"></div>
	<div class="marker" id="6" link="" otros="no" nombre="CORDOBA" direccion="Rosario de Sta Fé 163" lat="-31.4165934" lng="-64.18207389999998"></div>
	<div class="marker" id="7" link="" otros="no" nombre="CORRIENTES" direccion="9 de Julio 1247" lat="-27.4665347" lng="-58.83616129999996"></div>
	<div class="marker" id="8" link="" otros="no" nombre="MENDOZA" direccion="Lavalle 72" lat="-32.888527" lng="-68.843170"></div>
    <div class="marker" id="9" link="" otros="no" nombre="NEUQUÉN" direccion="Lainez 141" lat="-38.9566355" lng="-68.837507"></div>
	<div class="marker" id="10" link="" otros="no" nombre="RIO CUARTO" direccion="Sobremonte 1000" lat="-33.1266093" lng="-64.34928330000002"></div>
	<div class="marker" id="11" link="" otros="no" nombre="ROSARIO" direccion="Rioja 1319" lat="-32.9470831" lng="-60.641536599999995"></div>
	<div class="marker" id="12" link="" otros="no" nombre="MONTE GRANDE" direccion="Anacleto Rojas 64" lat="-34.8271786" lng="-58.46201239999999"></div>
    <!--<div class="marker" id="13" link="" otros="no"  nombre="LINIERS" direccion="Cuzco 306" lat="-34.6362244" lng="-58.528069200000004"></div>-->
	<div class="marker" id="14" link="" otros="no" nombre="ONCE" direccion="Larrea 374" lat="-34.6051333" lng="-58.40213589999996"></div>
	<div class="marker" id="15" link="" otros="no" nombre="SALTA" direccion="Balcarce 164" lat="-24.7878541" lng="-65.41220859999999"></div>
	<div class="marker" id="16" link="" otros="no" nombre="VENADO TUERTO" direccion="San Martín 280" lat="-33.7496112" lng="-61.96266059999999"></div>
	<div class="marker" id="17" link="" otros="si" nombre="ADROGUÉ - STRICK LANAS" direccion="Esteban Adrogué 1151" lat="-34.7985367" lng="-58.39089969999998"></div>
	<div class="marker" id="18" link="" otros="si" nombre="BAHIA BLANCA - CAREL LANAS" direccion="Estomba 420" lat="-38.7147624" lng="-62.271095400000036"></div>
	<div class="marker" id="19" link="" otros="si" nombre="MERCEDES - VARIEDADES LANAS Y MERCERIA" direccion="Calle 20 585" lat="-34.6528166" lng="-59.43037049999998"></div>
	<div class="marker" id="20" link="" otros="si" nombre="MONTE GRANDE LANERA" direccion="Leandro N. Alem 161" lat="-34.8159339" lng="-58.468605300000036"></div>
	<div class="marker" id="21" link="" otros="si" nombre="CONCEPCIÓN DEL URUGUAY - LANERÍA ANA BELÉN" direccion="Malvinas 72" lat="-32.48247" lng="-58.233032"></div>
    <!--<div class="marker" id="23" link="" otros="si"  nombre="LANAS PERGAMINO" direccion="Av Julio A. Roca 591" lat="-33.8929671" lng="-60.57227499999999"></div>-->
	<div class="marker" id="24" link="" otros="si" nombre="SAN JUSTO JAQUELINE HILADOS" direccion="Perú 2369" lat="-34.6783349" lng="-58.5587865"></div>
	<div class="marker" id="25" link="" otros="si" nombre="SAN NICOLAS - R Y M" direccion="España 291" lat="-33.336297" lng="-60.2147243"></div>
	<div class="marker" id="26" link="" otros="si" nombre="CRUZ DEL EJE - EL REGALO" direccion="San Martín 23" lat="-30.7211227" lng="-64.80989840000001"></div>
	<div class="marker" id="28" link="" otros="si" nombre="PARANA - LA MADEJA" direccion="Gral. San Martín 1278" lat="-31.7213684" lng="-60.52581709999998"></div>
	<div class="marker" id="29" link="" otros="si" nombre="VILLA VILLAGUAY - ARCO IRIS" direccion="Moreno 232" lat="-31.849369" lng="-59.01580809999996"></div>
	<div class="marker" id="31" link="" otros="si" nombre="OBERÁ - LA MODERNA" direccion="Sarmiento 944" lat="-27.4815311" lng="-55.123493199999984"></div>
	<!--<div class="marker" id="32" link="" otros="si"  nombre="SAN LUIS - MERCERIAS DINKY" direccion="Pedernera 984" lat="-33.3003504" lng="-66.33789439999998"></div>-->
	<div class="marker" id="33" link="" otros="si" nombre="SANTIAGO DEL ESTERO - SPECIALE HILADOS" direccion="Absalón Rojas 81" lat="-27.786751" lng="-64.261187"></div>
	<div class="marker" id="34" link="" otros="no" nombre="SAN LUIS - VILLA MERCEDES" direccion="Balcarce 264" lat="-33.687733" lng="-65.468341"></div>
	<div class="marker" id="35" link="" otros="si" nombre="TAFI VIEJO - ARACELI MERCERIA" direccion="Uttinger 110" lat="-26.7322935" lng="-65.2556146"></div>
	<div class="marker" id="36" link="" otros="si" nombre="TUCUMAN - FABE LANAS" direccion="Junín 155" lat="-26.828094" lng="-65.20861550000001"></div>
	<div class="marker" id="37" link="" otros="si" nombre="TUCUMAN - VALLES CALCHAQUIES" direccion="Shopping Loc. 254 Planta A." lat="-26.9468463" lng="-65.28570819999999"></div>
	<div class="marker" id="38" link="" otros="si" nombre="SAN JUAN - PUNTO Y PUNTADA" direccion="Tucumán Sur 22" lat="-31.5341882" lng="-68.52338329999998"></div>
	<div class="marker" id="39" link="" otros="si" nombre="SAN LUIS - DISTRIBUIDORA DEL INTERIOR" direccion="Riobamba 1780" lat="-33.2875085" lng="-66.3157729"></div>
	<div class="marker" id="40" link="" otros="si" nombre="WILDE - ESTILO PROPIO" direccion="Crisologo Larralde 6118" lat="-34.711563" lng="-58.328184"></div>
	<div class="marker" id="41" link="" otros="si" nombre="TANDIL - TEJIENDO AMOR" direccion="Belgrano 731" lat="-37.328252" lng="-59.133443"></div>
	<div class="marker" id="42" link="" otros="si" nombre="TAFI VIEJO - MERCERIA COLORES" direccion="25 de Mayo nro 26" lat="-26.730806" lng="-65.256459"></div>
	<div class="marker" id="43" link="" otros="si" nombre="BERAZATEGUI - LANTEX" direccion="AV. 14 Nº 4818" lat="-34.761632" lng="-58.209072"></div>
	<div class="marker" id="44" link="" otros="si" nombre="PUERTO MADRYN - LA CASA DE LAS LANAS" direccion="BELGRANO 126" lat="-42.767205" lng="-65.034714"></div>
	<div class="marker" id="45" link="" otros="si"  nombre="EL CALAFATE - MANOS DEL SUR" direccion="Paseo de los Pájaros, local 9" lat="-50.337969" lng="-72.264798"></div>

</div>      
   
            <div id="map_canvas" style="width:100%;height:435px;"></div>    
            
                     
                    
						</div>                         
					</div> 
				</div>
			</div>
@endsection			