<!doctype html>
<html lang="es">
<head>
		<title>{{ isset($titulo) ? $titulo : '' }}Nube Hilados - Tejer con imaginación</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        
		<!-- meta tags -->
		<meta name="keywords" content="">
		<meta name="description" content="Empresa argentina de comercialización de hilados para tejidos manuales.">
        <meta name="title" content="Nube Hilados - Tejer con imaginación">
        <link rel="image_src" href="http://www.nubehilados.com/images/f.jpg">
        <meta name="keywords" content="nubehilados, nube hilados, hilados, lana, accesorios, trajes de baño, locales, representantes, argentina">
        <meta name="copyright" content="nubehilados.com">
        <meta name="googlebot" content="noarchive">
        <meta name="googlebot" content="noodp">
        <link rel="shortcut icon" href="{{URL::to('favicon.png')}}">
        <meta name="robots" content="index,follow">
        
		<!-- favicon -->
		<link rel="shortcut icon" href="{{URL::to('favicon.png">
        
        <!-- OG TAGS -->
        <meta property="og:title" content="Nube Hilados - Tejer con imaginación">
        <meta property="og:description" content="Empresa argentina de comercialización de hilados para tejidos manuales.">
        <meta property="og:image" content="http://www.nubehilados.com/images/f.jpg')}}">
        
		<!-- google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,400italic,500italic,300italic,100italic,100,700italic,900,900italic,700' rel='stylesheet' type='text/css'>
		
        <!-- stylesheet -->
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::to('plugins/flexslider/flexslider.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::to('plugins/jackbox/css/jackbox.min.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::to('css/animate.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::to('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" media="all" href="{{URL::to('css/style.css')}}">
		
        <!--[if lte IE 10]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css')}}">
			<link rel="stylesheet" type="text/css" media="screen" href="plugins/jackbox/css/jackbox-ie9.css')}}">
		<![endif]-->
		<!--head libs-->
		<!--[if lte IE 8]>
			<style>
				#preloader{display:none !important;}
			</style>
		<![endif]-->
        
        <!-- javascripts -->
		<script src="{{URL::to('js/jquery-2.1.1.min.js')}}"></script>
		<script src="{{URL::to('js/modernizr.js')}}"></script>
		@if(Request::is('locales'))
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        
        <!-- google maps app -->
        <script>
			var map;
			var infowindow;
			var latLongBounds;
			var markers=[];				
			var contentStrings = [];
			function initialize() {
		    var myOptions = {
			    	backgroundColor: "#FFFFFF",
			      scrollwheel: true,
			      streetViewControl:false,
			      mapTypeControl: true,
			      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
			      navigationControl: true,
			      navigationControlOptions: {style: google.maps.NavigationControlStyle.ZOOM_PAN},
			      mapTypeId: google.maps.MapTypeId.TERRAIN,
			    }
			    //latLongBounds = new LatLngBounds();
			    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			   //alert('aaaa');
			   latLongBounds = new google.maps.LatLngBounds();
			    //map.fitBounds(latLongBounds);
			    	
			    $("#markers").find('div.marker').each(function(){
				            var latLng = new google.maps.LatLng($(this).attr('lat'),$(this).attr('lng'));
				        	var marker = createMarker(latLng,$(this));
				        	latLongBounds.extend(latLng);
			            });					
			    function createMarker(latLng,markerxml){
					if ($(markerxml).attr("otros") == "si"){
						var markerImage = 'http://labs.google.com/ridefinder/images/mm_20_red.png';
					} else {
						var markerImage = 'http://labs.google.com/ridefinder/images/mm_20_green.png';
					}
			    	var marker = new google.maps.Marker({position: latLng, map: map, title: $(markerxml).attr('nombre'), icon:markerImage});

			    	var contentString = '<div style="width:150px; height:60px;font-family:arial,verdana;font-size:10px;">' +
			        '<p style="width:130px; padding-bottom:10px;">'+ $(markerxml).attr('nombre')+'<br>'+
			        ' '+ $(markerxml).attr('direccion')+'</p></div>';
			        
			    	contentStrings.push(contentString);
			    	google.maps.event.addListener(marker, "click", function() {
				    	if (infowindow) infowindow.close();
				    	infowindow = new google.maps.InfoWindow({content: contentString});
				    	infowindow.open(map, marker);				    	
			    	});
			    	map.fitBounds(latLongBounds);
			    	markers.push(marker);			    	
			    	return marker; 
			    }			    
			    mapInitialized = 1;			    
			}
			function markerClick(m){
				var marker = markers[m];
				var contentString = contentStrings[m]
				if (infowindow) infowindow.close();
		    	infowindow = new google.maps.InfoWindow({content: contentString});
		    	infowindow.open(map, marker);		    	
			}			
			</script>
			@endif
	
</head>
<body @if(Request::is('locales'))onload="initialize()"@endif class="sticky_menu">

	@if(Request::is('home'))
	<div id="preloader"></div>   
    @endif
		<!-- layout -->
		<div class="wide_layout db_centered bg_white">
			<!--[if (lt IE 9) | IE 9]>
				<div class="bg_red" style="padding:5px 0 12px;">
				<div class="container" style="width:1170px;"><div class="row wrapper"><div class="clearfix color_white" style="padding:9px 0 0;float:left;width:80%;"><i class="fa fa-exclamation-triangle f_left m_right_10" style="font-size:25px;"></i><b>Attention! This page may not display correctly.</b> <b>You are using an outdated version of Internet Explorer. For a faster, safer browsing experience.</b></div><div class="t_align_r" style="float:left;width:20%;"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode" class="button_type_1 d_block f_right lbrown tr_all second_font fs_medium" target="_blank" style="margin-top:6px;">Update Now!</a></div></div></div></div>
			<![endif]-->            
			@include('header')
			
			<!-- main content -->
			@yield('contenido')
                       
                       
		</div>
                    
						<!--</main>
					</div>
				</div>                    
                    
			</div>-->
			@include('footer')
		<!--</div>
        </div>-->

		<!-- back to top -->
		<button class="back_to_top animated button_type_6 grey state_2 d_block black_hover f_left vc_child tr_all"><i class="fa fa-angle-up d_inline_m"></i></button>

		@include('popups')

		@include('jslibs')
	
</body>
</html>