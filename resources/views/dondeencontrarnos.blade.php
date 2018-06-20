@extends('nube')
@section('contenido')
<?php
$marcadores = [
  ["ADROGUE","Buenos Aires","ESTEBAN ADROGUE 1187, ADROGUE, Buenos Aires","-34.7983719","-58.3906793"  ],
  ["BAHIA BLANCA","Buenos Aires","O´HIGGINS 191, BAHIA BLANCA, Buenos Aires","-38.7214449","-62.2682575"  ],
  ["BAHIA BLANCA","Buenos Aires","ESTOMBA 420, BAHIA BLANCA, Buenos Aires","-38.714802","-62.271032"  ],
  ["BANFIELD","Buenos Aires","MARSELLA 949, BANFIELD, Buenos Aires","-34.7284658","-58.4321464"  ],
  ["BERAZATEGUI","Buenos Aires","AV. 14 Nº 4818, BERAZATEGUI, Buenos Aires","-34.7616078","-58.2091187"  ],
  ["BIGAND","Santa Fé","AV SAN MARTIN 1443, BIGAND, Santa Fé","-33.3747238","-61.1801795"  ],
  ["CHIVILCOY","Buenos Aires","CEBALLOS 115, CHIVILCOY, Buenos Aires","-34.8946399","-60.0217174"  ],
  ["CIUDADELA","Buenos Aires","AV. GRAL PAZ 99 _CIUDADELA (ESQUINA BINGO), CIUDADELA, Buenos Aires","-34.6400337","-58.5300832"  ],
  ["ESCOBAR","Buenos Aires","E. TAPIA DE CRUZ 998, ESCOBAR, Buenos Aires","-34.3500421","-58.7975747"  ],
  ["EZEIZA","Buenos Aires","PASO DE LA PATRIA 346, EZEIZA, Buenos Aires","-34.8557461","-58.5223053"  ],
  ["EZEIZA","Buenos Aires","9 DE JULIO 173, EZEIZA, Buenos Aires","-34.8539543","-58.5206978"  ],
  ["LA PLATA","Buenos Aires","DIAGONAL 74 2271, LA PLATA, Buenos Aires","-34.9297771","-57.954255"  ],
  ["LOMAS DE ZAMORA","Buenos Aires","CARLOS PELLEGRINI 78, LOMAS DE ZAMORA, Buenos Aires","-34.7600994","-58.3982096"  ],
  ["MAR DE LAS PAMPAS","Buenos Aires","LIMAY Y LOS ANDES, MAR DE LAS PAMPAS, Buenos Aires","-37.3285998","-57.0224341"  ],
  ["MAR DEL PLATA","Buenos Aires","ALVARADO 1232, MAR DEL PLATA , Buenos Aires","-38.0168381","-57.5417854"  ],
  ["MAR DEL TUYU","Buenos Aires","CALLE 2 N° 6998, MAR DEL TUYU, Buenos Aires","-36.5720127","-56.6905374"  ],
  ["MATHEU","Buenos Aires","SAN MARTIN 84, MATHEU, Buenos Aires","-34.3844913","-58.8287329"  ],
  ["MERCEDES","Buenos Aires","CALLE 20 N: 285, MERCEDES, Buenos Aires","-34.6539868","-59.4246163"  ],
  ["MONTE HERMOSO","Buenos Aires","AV. ARGENTINA 30, MONTE HERMOSO, Buenos Aires","-38.9884876","-61.2873051"  ],
  ["MORON","Buenos Aires","SARMIENTO 866, MORON, Buenos Aires","-34.6483877","-58.6206987"  ],
  ["MUÑIZ","Buenos Aires","PASO 1602 - ESQUINA: FARIAS, MUÑIZ, Buenos Aires","-34.5525138","-58.7063051"  ],
  //["ONCE","Capital Federal","LARREA 374, ONCE, Capital Federal","-34.605449","-58.402222"  ],
  ["PEHUAJO","Buenos Aires","ALSINA 334, PEHUAJO, Buenos Aires","-35.8121627","-61.8965073"  ],
  ["PIGUE","Buenos Aires","AV. MITRE 356, PIGUE, Buenos Aires","-37.6070981","-62.4048015"  ],
  ["PILAR","Buenos Aires","HIPOLITO IRIGOYEN 457, PILAR, Buenos Aires","-34.4580213","-58.9111558"  ],
  ["PILAR","Buenos Aires","RIVADAVIA 560 LOC. 37, PILAR, Buenos Aires","-34.4578629","-58.9130149"  ],
  ["PUNTA ALTA","Buenos Aires","HUMBERTO I 664, PUNTA ALTA, Buenos Aires","-38.8612699","-62.0873213"  ],
  ["RAFAEL CALZADA","Buenos Aires","20 DE SEPTIEMBRE 1537, RAFAEL CALZADA, Buenos Aires","-34.7940312","-58.3603913"  ],
  ["SAN ANTONIO DE ARECO","Buenos Aires","ZAPIOLA 390, SAN ANTONIO DE ARECO, Buenos Aires","-34.2486071","-59.4702148"  ],
  ["SAN CLEMENTE","Buenos Aires","CALLE 3 Nº 2017, SAN CLEMENTE, Buenos Aires","-36.3578","-56.7199174"  ],
  ["SAN FERNANDO","Buenos Aires","SIMON DE IRIONDO 1138, SAN FERNANDO, Buenos Aires","-34.4531334","-58.5397615"  ],
  ["SAN JUSTO","Buenos Aires","PERU 2369, SAN JUSTO, Buenos Aires","-34.6781419","-58.5588332"  ],
  ["SAN NICOLAS","Buenos Aires","ESPAÑA 291, SAN NICOLAS, Buenos Aires","-33.3362388","-60.2147137"  ],
  ["SUIPACHA","Buenos Aires","MENDOZA 409, SUIPACHA, Buenos Aires","-34.7752638","-59.6883432"  ],
  ["TANDIL","Buenos Aires","BELGRANO 731, TANDIL, Buenos Aires","-37.3282421","-59.1332392"  ],
  ["WILDE","Buenos Aires","CRISOLOGO LARRALDE 6118, WILDE, Buenos Aires","-34.7113998","-58.3281884"  ],
  ["25 DE MAYO","Buenos Aires","CALLE 10 ENTRE 27 Y 28 N° 830, 25 DE MAYO, Buenos Aires","-35.4318818","-60.1721576"  ],
  ["Capital Federal","Capital Federal","SCALABRINI ORTIZ 995, Capital Federal, Capital Federal","-34.5952876","-58.4312054"  ],
  ["CORDOBA","Córdoba","ROSARIO DE SANTA FÉ 163, CORDOBA, Córdoba","-31.4165934","-64.1818379"  ],
  ["RIO CUARTO","Córdoba","SOBREMONTE 1000, RIO CUARTO, Córdoba","-33.1267548","-64.3494546"  ],
  ["RESISTENCIA","Chaco","AMEGHINO 2247, RESISTENCIA, Chaco","-27.4721347","-58.9696175"  ],
  ["RESISTENCIA","Chaco","AV. PARAGUAY 443, RESISTENCIA, Chaco","-27.4508786","-58.9781666"  ],
  ["RESISTENCIA","Chaco","AV. BELGRANO 515, RESISTENCIA, Chaco","-27.4514609","-58.9953456"  ],
  ["PUERTO MADRYN","Chubut","BELGRANO 126, PUERTO MADRYN, Chubut","-42.7674136","-65.0347084"  ],
  ["TRELEW","Chubut","SAN MARTIN 160, TRELEW, Chubut","-43.2493016","-65.3076351"  ],
  ["EMPEDRADO","Corrientes","BUENOS AIRES 457, EMPEDRADO, Corrientes","-27.9510756","-58.803594"  ],
  ["GOYA","Corrientes","JOSE GOMEZ 1015, GOYA, Corrientes","-29.1452361","-59.2632274"  ],
  ["MONTE CASEROS","Corrientes","EL MAESTRO 165, MONTE CASEROS , Corrientes","-30.2551588","-57.6362572"  ],
  ["SANTA LUCIA","Corrientes","BELGRANO 915, SANTA LUCIA, Corrientes","-28.9892038","-59.1011798"  ],
  ["CONC. DEL URUGUAY","Entre Ríos","RUIZ MORENO 651, CONC. DEL URUGUAY, Entre Ríos","-32.4774138","-58.2481799"  ],
  ["CONC. DEL URUGUAY","Entre Ríos","MALVINAS 72, CONC. DEL URUGUAY, Entre Ríos","-32.4867301","-58.2377313"  ],
  ["CONCORDIA","Entre Ríos","BARRIO 708 LA BIANCA BOULEVARD AYUI 50, CONCORDIA, Entre Ríos","-31.3519085","-58.0096382"  ],
  ["FEDERAL","Entre Ríos","HIPOLITO IRIGOYEN 1070, FEDERAL, Entre Ríos","-30.9462792","-58.7843108"  ],
  ["GUALEGUAY","Entre Ríos","25 DE MAYO 740, GUALEGUAY, Entre Ríos","-33.1449949","-59.3136525"  ],
  ["LIBERTADOR SAN MARTIN","Entre Ríos","BERNARDO HOUSSAY 222 CP 3103 , LIBERTADOR SAN MARTIN , Entre Ríos","-32.0700442","-60.4631598"  ],
  ["VILLA ELISA","Entre Ríos","EMILIO FRANCOU 1592, VILLA ELISA, Entre Ríos","-32.1607727","-58.4013905"  ],
  ["VILLAGUAY","Entre Ríos","MORENO 232, VILLAGUAY , Entre Ríos","-31.8677996","-59.0296774"  ],
  ["FORMOSA","Formosa","MORENO 621 , FORMOSA, Formosa","-26.1811536","-58.1683277"  ],
  ["SAN SALVADOR DE JUJUY","Jujuy","PASAJE TEMPERLEY Nº42 LOS PERELES, SAN SALVADOR DE JUJUY, Jujuy","-24.1725446","-65.3096928"  ],
  ["REALICO","La Pampa","AVENIDA MULLALLY Nº 2024 LOCAL: 2, REALICO, La Pampa","-35.0435331","-64.2446327"  ],
  ["SANTA ROSA","La Pampa","LISANDRO DE LA TORRE 113, SANTA ROSA, La Pampa","-36.6219443","-64.2897516"  ],
  ["CHAMICAL","La Rioja","NICOLAS MAJUL AYAN 53, CHAMICAL, La Rioja","-30.3588593","-66.3131443"  ],
  ["LUJAN DE CUYO","Mendoza","FEDERICO SERPA 353, LUJAN DE CUYO, Mendoza","-33.0396162","-68.888451"  ],
  ["MENDOZA","Mendoza","LAVALLE 72, MENDOZA, Mendoza","-32.8885226","-68.8374503"  ],
  ["OBERA","Misiones","AV. SARMIENTO 950, OBERA, Misiones","-27.4857937","-55.1219923"  ],
  ["POSADAS","Misiones","AV. LAVALLE 5206, POSADAS , Misiones","-27.39526","-55.9091512"  ],
  ["POSADAS","Misiones","ENTRE RIOS 2177, POSADAS , Misiones","-27.3693255","-55.8979422"  ],
  ["VILLA LA ANGOSTURA","Neuquén","ARRAYANES 121, VILLA LA ANGOSTURA , Neuquén","-40.7618511","-71.6452227"  ],
  ["NEUQUEN","Neuquén","ALCORTA 163, NEUQUEN, Neuquén","-38.9581219","-68.0615891"  ],
  ["CATRIEL","Río Negro","AVENIDA DEL TRABAJO Y AFGANISTAN, CATRIEL, Río Negro","-37.8732579","-67.7986355"  ],
  ["BARILOCHE","Río Negro","MORENO 818 , BARILOCHE, Río Negro","-41.1357238","-71.2983236"  ],
  ["GENERAL ROCA","Río Negro","TUCUMAN 1448, GENERAL ROCA, Río Negro","-39.0273975","-67.5847228"  ],
  ["EL BOLSON","Río Negro","PADRE FELICIANO 244, EL BOLSON, Río Negro","-41.965207","-71.5328058"  ],
  ["SALTA","Salta","BALCARCE 164, SALTA, Salta","-24.787934","-65.412098"  ],
  ["TARTAGAL","Salta","RIVADAVIA 570, TARTAGAL, Salta","-22.5143299","-63.8064273"  ],
  ["ORAN","Salta","URIBURU 297, ORAN, Salta","-23.1319685","-64.3284245"  ],
  ["SAN JUAN","San Juan","TUCUMAN 22 SUR, SAN JUAN, San Juan","-31.5385507","-68.5686645"  ],
  ["SAN LUIS","San Luis","RIOBAMBA 1780, SAN LUIS, San Luis","-33.2871886","-66.3157259"  ],
  ["LAS HERAS","Santa Cruz","HIPOLITO YRIGOYEN 133, LAS HERAS, Santa Cruz","-46.544039216760126","-68.93075345"  ],
  ["PUERTO DESEADO","Santa Cruz","12 de OCTUBRE 714, PUERTO DESEADO, Santa Cruz","-47.7517614","-65.8915139"  ],
  ["RIO GALLEGOS","Santa Cruz","ZAPIOLA 783, RIO GALLEGOS, Santa Cruz","-51.6171554","-69.2273685"  ],
  ["RECONQUISTA","Santa Fé","HABEGGER 974, RECONQUISTA, Santa Fé","-29.146052","-59.6485253"  ],
  ["ROSARIO","Santa Fé","RIOJA 1319, ROSARIO, Santa Fé","-32.947109","-60.641565"  ],
  ["ROSARIO NORTE","Santa Fé","ZELAYA 3360, ROSARIO NORTE, Santa Fé","-32.9307322","-60.6574203"  ],
  ["SANTA FE","Santa Fé","AV. ARISTOBULO DEL VALLE 7022, SANTA FÉ, Santa Fé","-31.603841","-60.692028"  ],
  ["VENADO TUERTO","Santa Fé","San Martin 280, VENADO TUERTO, Santa Fé","-33.7496678","-61.9625748"  ],
  ["SANTIAGO DEL ESTERO","Santiago del Estero","PELLEGRINI 107 , SANTIAGO DEL ESTERO, Santiago del Estero","-27.7867093","-64.2611694"  ],
  ["USHUAIA","Tierra del Fuego","GIACHINO 2284, USHUAIA, Tierra del Fuego","-54.8095843","-68.3331615"  ],
  ["USHUAIA","Tierra del Fuego","JUAN D. PERON 174, USHUAIA, Tierra del Fuego","-54.8182571","-68.3366328"  ],
  ["Tafi Viejo","Tucumán","25 De Mayo N 26, Tafi Viejo, Tucumán","-26.7306003","-65.2567024"  ],
  ["Tafi Viejo","Tucumán","UTTINGER 110, Tafi Viejo, Tucumán","-26.7323299","-65.2558332"  ],
  ["S.M. DE TUCUMAN","Tucumán","JUNIN 155 LOC. 1, S.M. DE TUCUMAN, Tucumán","-26.8279624","-65.2087132"  ],
  ["CALAFATE","Santa Cruz","9 de Julio 57 Galería Paseo de los Pájaros LOCAL 9, CALAFATE, Santa Cruz","-50.337407669153315", "-72.26499469999999"],
];

$provincias = [];

foreach($marcadores as $m){
	$p = $m[1];

	if (!isset($provincias[$p])){
		$provincias[$p] = $p;
	}
}

sort($provincias)
?>
<!-- breadcrumbs -->
			<div class="breadcrumbs bg_grey_light_2 fs_medium fw_light">
				<div class="container color_dark">
					<a href="/" class="sc_hover">Home</a> / <span class="color_light">Donde Encontrarnos</span>
				</div>
			</div>
            
			<!-- main content -->
			<div class="page_section_offset bg-body">
				<div class="container numbered_title_init">
					<h2 class="fw_light second_font color_dark m_bottom_12 tt_uppercase">Donde encontrarnos</h2>
                    <hr class="divider_bg m_bottom_13">
					
                   <div class="row">
						
                   <div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30">
                   	<p>Provincia: 
                   	<select name="provincias" id="provincias" onchange="cambiarProvincia(this)">
                   		<option value="todas" selected="selected">Todas</option>
                   		@foreach($provincias as $provincia)
                   		<option value="{!! $provincia !!}">{{$provincia}}</option>
                   		@endforeach
                   	</select>
                   </p>
                   </div>
               
         
              
         <div class="col-lg-12 col-md-12 col-sm-12 m_bottom_30">   
         
        
	<div id="markers" style="display:none;">

    @foreach($marcadores as $id => $marcador)
    <div class="marker" id="{{$id+1}}" provincia="{!!$marcador[1]!!}"   direccion="{!!$marcador[2]!!}" lat="{{$marcador[3]}}" lng="{{$marcador[4]}}"></div>
	@endforeach
</div>      
   
            <div id="map_canvas" style="width:100%;height:435px;"></div>    
            
                     
                    
						</div>                         
					</div> 
				</div>
			</div>
@endsection			