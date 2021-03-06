(function($){
	"use strict";

	var Core = {

		initialized : false,

		initialize : function(pageLoad){
			if(this.initialized) return;

			if(pageLoad == "DOM"){
				this.buildAfterDomReady();
			}
			else if(pageLoad == "images"){
				this.buildAfterWindowLoad();
				this.initialized = true;
			}
		},

		buildAfterDomReady : function(){
			this.plugins();
			$.responsiveMenu();
			$.backToTop(100,'bounceInRight','bounceOutRight');
			$.animatedContent();
			$.styledSelect();
			$.oldBrowsersPlaceholder();
			$.fullWidthMasonry();
			$.scrollSidebar();
			this.events.categories();
			this.sliders();
			this.events.openDropdown();
			this.events.openSearchForm();
			this.owlCarousel();
			this.simpleSlideshow();
			this.events.contactForm();
			this.events.newsletter();
			this.events.quantity();
			this.events.reset();
			this.events.isotopeChangeLayout();
		},

		buildAfterWindowLoad : function(){
			$.stickyMenu();
			$.megaMenu();
			this.isotope();
			this.events.progressBar();
			$.correctResponsiveImagesPosition();
			this.events.popupButtons();
			this.pluginsWLOAD();
			this.events.offer();
			$.counters();
		},

		events : {

			openDropdown : function(){

				$.openDropdown();

				// close button

				$('[class*="_layout"]').on('click','[class*="close"],.alert_box i[class^="fa "]',function(){
					$(this).parent().animate({
						'opacity': 0
					},function(){
						$(this).slideUp();
					});
				});

			},

			openSearchForm : function(){
				var form = $('[role="search"]'),
					field = form.children('input[type="text"]');

				if(!field.hasClass('hidden')) return false;



				form.on("mouseenter mouseleave",function(event){
					if($(window).width() < 767) return false;
					$(this).stop().animate({
						"width" : event.type === "mouseenter" ? 242 : 40
					}).children('input[type="text"]').toggleClass('hidden');

					if(event.type === "mouseleave"){
						$(this).children('input[type="text"]').trigger("blur");
					}
				});
			},

			progressBar : function(){

				var skill = $('[data-progress]');

				skill.each(function(){
					var $this = $(this),
						percent = $this.data('progress'),
						offset = $this.offset().top - 850;

					$(window).on("scroll",function(){

						if($this.children().width() > 0) return false;

						if($(window).scrollTop() >= offset){
							$this.children().stop().animate({
								width : percent + "%"
							});
							return false;
						}
					});

				});

			},

			popupButtons : function(){

				var ulWithButtons = $('.open_buttons_container:not(.in_masonry)');

				ulWithButtons.each(function(){
					var $this = $(this);
					$this.css({
						'margin-left' : $this.outerWidth() / -2,
						'margin-top' : $this.outerHeight() / -2
					});
				});

			},

			categories : function(){
				var list = $('.categories_list');

				list.on('click','.open_sub_categories',function(){
					var $this = $(this);

					if(!$this.next('ul').length) return false;

					$this.toggleClass('active').prev("a").toggleClass("fw_bold").siblings("ul").stop().slideToggle();
					$this.prev('a').toggleClass('scheme_color bg_grey_light_2');
				});
			},

			sortIsotope : function(container){
				$('.sort').on('click','[data-filter]',function(e){
					var self = $(this),
					selector = self.attr('data-filter');
				  	// self.closest('li').addClass('active').siblings().removeClass('active');
				  	container.isotope({ filter: selector });
				  	e.preventDefault();
				});
			},

			contactForm : function(){
				return true;
				var cf = $('#contactform');
				cf.append('<div class="message_container d_none m_top_20"></div>');
				var message = cf.children('.message_container');

				cf.on("submit",function(event){
					event.preventDefault();
					if(message.hasClass('opened')) return;
					var self = $(this),text;

					var request = $.ajax({
						url:"#",
						type : "post",
						data : self.serialize()
					});

					request.then(function(data){
						if(data == "1"){
							message.addClass('opened');
							text = "Su consulta ha sido enviada.";

							cf.find('input:not([type="submit"]),textarea').val('');

							$('.message_container').html('<div class="alert_box r_corners color_green success"><p>'+text+'</p></div>')
								.delay(150)
								.slideDown(300)
								.delay(4000)
								.slideUp(300,function(){
									$(this).html("");
									message.removeClass('opened');
								});

						}
						else{
							message.addClass('opened');
							if(cf.find('textarea').val().length < 5){
								text = "La consulta ingresada es demasiado corta"
							}
							if(cf.find('input').val() == ""){
								text = "Por favor, complete todos los campos requeridos (*)";
							}
							$('.message_container').html('<div class="alert_box error relative m_bottom_10 fw_light"><p>'+text+'</p></div>')
								.delay(150)
								.slideDown(300)
								.delay(4000)
								.slideUp(300,function(){
									$(this).html("");
									message.removeClass('opened');
								});
						}
					},function(){
						message.addClass('opened');
						$('.message_container').html('<div class="alert_box error relative m_bottom_10 fw_light"><p>Connection to server failed!</p></div>')
								.delay(150)
								.slideDown(300)
								.delay(4000)
								.slideUp(300,function(){
									$(this).html("");
									message.removeClass('opened');
								});
					});
				});

			},

			newsletter : function(){
				var subscribe = $('.newsletter');

				subscribe.each(function(){
					var $this = $(this);
					$this.append('<div class="message_container_subscribe d_none m_top_20"></div>');
					var message = $this.find('.message_container_subscribe'),text;

					$this.on('submit',function(e){
						e.preventDefault();
						if(message.hasClass('opened')) return;
						
						if($this.find('input[type="email"]').val() == ''){
							message.addClass('opened');
							text = "Por favor, ingrese un E-Mail válido.";
							message.html('<div class="alert_box error relative m_bottom_10 fw_light"><p>'+text+'</p></div>')
								.slideDown()
								.delay(4000)
								.slideUp(function(){
									$(this).html("");
									message.removeClass('opened');
								});

						}else{
							$this.find('span.error').hide();
							$.ajax({
								type: "POST",
								url: "newsletter.php",
								data: $this.serialize(),
								success: function(data){
									if(data == '1'){
										message.addClass('opened');
										text = "Su E-Mail ha sido agregado.";
										message.html('<div class="alert_box r_corners color_green success"><p>'+text+'</p></div>')
											.slideDown()
											.delay(4000)
											.slideUp(function(){
												$(this).html("");
												message.removeClass('opened');
											})
											.prevAll('input[type="email"]').val("");
									}else{
										message.addClass('opened');
										text = "Ingrese un E-Mail válido.";
										message.html('<div class="alert_box error relative m_bottom_10 fw_light"><p>'+text+'</p></div>')
											.slideDown()
											.delay(4000)
											.slideUp(function(){
												$(this).html("");
												message.removeClass('opened');
											});
									}
								}
							});
						}
					});

				});
			},

			quantity : function(){

				var q = $('.quantity');

				q.each(function(){
					var $this = $(this),
						button = $this.children('button'),
						input = $this.children('input[type="text"]'),
						val = +input.val();

					button.on('click',function(){
						if($(this).hasClass('minus')){
							if(val === 1) return false;
							input.val(--val);
						}
						else{
							input.val(++val);
						}
						input.trigger('change');
					});
				});

			},

			// offer

			offer : function(){

				$('.offer_container').each(function(){

					var $this = $(this),
						offer = $this.find('.offer');

					$this.on('mouseenter mouseleave',function(){
						offer.toggleClass('hidden visible');
					});

					$this.on('mousemove',function(event){

						var left = $this.offset().left,
							top = $this.offset().top;

						offer.css({
							top : Math.abs(top - event.pageY - 20),
							left : Math.abs(left - event.pageX - 20)
						});

					});

				});

			},

			reset : function(){

				$('.filter_reset').on('click',function(){
					var range = $(this).closest('form').find('.range_slider'),
						data = range.data();

					range.slider('option','values', [data.firstValue, data.secondValue]);

					setTimeout(function(){
						range.next().children('.range_min').val("$" + data.firstValue)
							.next().val("$" + data.secondValue);
					},0);

				});

			},

			isotopeChangeLayout : function(){

				var button = $('[data-isotope-container]');

				button.each(function(){

					var $this = $(this),
						container = $($this.data('isotope-container')),
						layout = $this.data('isotope-layout');

					$this.on('click',function(){

						$(this).addClass('black_button_active').siblings().removeClass('black_button_active').addClass('black_hover');

						if(layout == "list"){
							container.children("[class*='isotope_item']").addClass('list_view_type');
							container.removeClass('m_bottom_20').addClass('m_bottom_10');
						}
						else{
							container.children("[class*='isotope_item']").removeClass('list_view_type');
							container.addClass('m_bottom_20').removeClass('m_bottom_10');
							$.correctResponsiveImagesPosition();
						}

						container.isotope('layout');

						container.find('.tooltip_container').tooltip('.tooltip').tooltip('.tooltip');

					});



				});

			}

		},

		sliders : function(){

			var slidersArray = ['.layerslider','.layerslider_video','.royalslider','.r_slider','.flexslider'];

			// layerslider 

			if($(slidersArray[0]).length){
				$(slidersArray[0]).layerSlider({
					responsiveUnder : 1140,
					layersContainer : 1140,
					navStartStop : false,
					showBarTimer : false,
					showCircleTimer : false,
					skinsPath : './plugins/layerslider/skins/',
					skin : 'defaultskin',
					cbInit : function(){
						$(slidersArray[0]).find('.ls-nav-prev').append('<i class="fa fa-angle-left"></i>').end().
							find('.ls-nav-next').append('<i class="fa fa-angle-right"></i>');
					}
				});
			}

			// video slider (layer)

			if($(slidersArray[1]).length){
				$(slidersArray[1]).layerSlider({
					pauseOnHover:false,
					responsive:true,
					responsiveUnder:1170,
					layersContainer : 1170,
					animateFirstSlide:false,
					twoWaySlideshow:true,
					skinsPath:'plugins/layerslider/skins/',
					skin:'borderlessdark',
					globalBGColor:'transparent',
					navPrevNext : true,
					hoverPrevNext : false,
					navStartStop:false,
					navButtons:false,
					showCircleTimer:false,
					thumbnailNavigation:'disabled',
					lazyLoad:false,
					cbInit : function(){
 						$(slidersArray[1]).find('.ls-nav-next').addClass('button_type_11 black_hover grey state_2 t_align_c vc_child d_block tr_all')
 							.append('<i class="fa fa-angle-right d_inline_m"></i>').end()
 						.find('.ls-nav-prev').addClass('button_type_11 black_hover grey state_2 t_align_c vc_child d_block tr_all')
 											.append('<i class="fa fa-angle-left d_inline_m"></i>');

 					}
				});
			}

			// royal slider

			if($(slidersArray[2]).length){
				$(slidersArray[2]).royalSlider({
		            keyboardNavEnabled: true,
		            autoScaleSlider : true,
		            imageScaleMode : 'fill',
		            slidesSpacing : 0,
		            transitionSpeed : 500,
		            fadeinLoadedSlide : false,
		            loop : true
		        });
		        var slider = $(slidersArray[2]).data('royalSlider');

				slider.slides[0].holder.on('rsAfterContentSet', function(e, slideObject) {
				    $(slidersArray[2]).find('.rsArrowLeft').append('<i class="fa fa-angle-left"></i>').end()
				    	.find('.rsArrowRight').append('<i class="fa fa-angle-right"></i>');
				});
			}

			// revolution slider

			if($(slidersArray[3]).length){
				var api = $(slidersArray[3]).revolution({
					delay:5000,
					startwidth:1170,
					startheight:570,
					hideThumbs:0,
					fullWidth:"on",
		     		hideTimerBar:"on",
		     		soloArrowRightHOffset:20,
		     		soloArrowLeftHOffset:20,
		     		navigationVOffset : 15,
		     		shadow:0
				});
				api.bind('revolution.slide.onloaded',function(){
	      		$(slidersArray[3]).parent().find('.tp-leftarrow').append('<i class="fa fa-angle-left"></i>').end()
				    	.find('.tp-rightarrow').append('<i class="fa fa-angle-right"></i>');
	      		});
			}

			// flexslider

			if($(slidersArray[4]).length){
				$(slidersArray[4]).flexslider({
					animation : "fade",
					animationSpeed : 500,
					prevText: '<i class="fa fa-angle-left"></i>',
					nextText: '<i class="fa fa-angle-right"></i>'
				});
			}
		},

		pluginsWLOAD : function(){
			var pluginsArray = ['.tooltip_container','.sh_container'];

			// tooltip container

			if($(pluginsArray[0]).length){
				$(pluginsArray[0]).tooltip('.tooltip');
			}

			// same height

			if($(pluginsArray[1]).length){
				$(pluginsArray[1]).sameHeight();
			}
		},

		plugins : function(){
			var pluginsArray = ['.tabs',
								'.tweets_list_container',
								'[data-popup]',
								'.accordion:not(.toggle)',
								'.toggle',
								'.jackbox[data-group]',
								'.countdown',
								'.range_slider',
								'#zoom'];

			// tabs

			if($(pluginsArray[0]).length){
				$(pluginsArray[0]).easytabs({
					tabActiveClass : 'color_dark',
					tabs : '> nav > ul > li',
					updateHash : false
				}).bind('easytabs:after', function() {
				    $(pluginsArray[0]).find('.tooltip_container').tooltip('.tooltip').tooltip('.tooltip');
				});
			}

			// twitter

			if($(pluginsArray[1]).length){
				$(pluginsArray[1]).tweet({
					username : 'fanfbmltemplate',
					modpath: 'plugins/twitter/',
					loading_text : '<span class="fw_light">Loading tweets...</span>',
					template : '<li class="relative"><p class="fw_light lh_small"><i>{time}</i></p><p class="second_font">{text}</p></li>'
				});
				$(pluginsArray[1]).find('.tweet_odd').remove();
				$(pluginsArray[1]).find('.tweet_list').owlCarousel({
					items : 1,
					autoplay : true,
					loop:true,
					animateIn : "flipInX",
					animateOut : "slideOutDown",
					autoplayTimeout : 4000
				});
			}

			// popup init

			if($(pluginsArray[2]).length){
				$(pluginsArray[2]).popup({
					afterOpen : function(){
						if($(this).find('.tooltip_container').length){
							$(this).find('.tooltip_container').tooltip('.tooltip').tooltip('.tooltip');
						}
						$('.addthis_button_compact').off('mouseenter.top').off('mousemove.top').on('mouseenter.top mousemove.top',function(){
							var $this = $(this);
							setTimeout(function(){$('#at15s').css('top',$this.offset().top + 34)},4);
						});
					}
				});
			}

			// accordion

			if($(pluginsArray[3]).length){
				$(pluginsArray[3]).accordion();
			}

			// toggle

			if($(pluginsArray[4]).length){
				$(pluginsArray[4]).accordion(450,true);
			}

			// jackbox

			if($(pluginsArray[5]).length){
				$(pluginsArray[5]).jackBox("init",{
					baseName: "plugins/jackbox"
				});
			}




			// range slider

			if($(pluginsArray[7]).length){
				$(pluginsArray[7]).slider({
					range : true,
					min : 0,
					max : 5400,
					values : [0,5250],
					slide : function(event, ui){
						$(this).next().children('.range_min').val("$" + ui.values[0])
								.next().val("$" + ui.values[1]);
					},
					create : function(event, ui){
						var $this = $(this);
						$this.next().children('.range_min').val("$" + $this.slider("values",0))
								.next().val("$" + $this.slider("values",1));
						$this.attr({
							'data-first-value' : $this.slider("values",0),
							'data-second-value' : $this.slider("values",1)
						});
					}
				});
			}



		},

		owlCarousel : function(){

			$('.owl-carousel').each(function(){

				var _this = $(this),
					options = _this.data('owl-carousel-options') ? _this.data('owl-carousel-options') : {},
					buttons = _this.data('nav'),
					config = $.extend(options,{
						dragEndSpeed : 500,
						smartSpeed : 500
					});
					
				var owl = _this.owlCarousel(config);

				$('.' + buttons + 'prev').on('click',function(){
					owl.trigger('prev.owl.carousel');
				});
				$('.' + buttons + 'next').on('click',function(){
					owl.trigger('next.owl.carousel');
				});

			});
		},

		flickr : function(){

			// flickr 
	
			var flickr = $('.flickr_list');

			flickr.each(function(){

				var self = $(this),
					options = self.data('flickr-options'),config,defaults,
					group = self.data('flickr-group'),
					counter = 1;

				defaults = {
					flickrbase:'http://api.flickr.com/services/feeds/',
					feedapi:'photos_public.gne',
					limit: 6,
					qstrings:{lang:'en-us',format:'json',jsoncallback:'?'},
					cleanDescription:true,
					useTemplate:true,
					itemTemplate: '<li class="f_left r_corners m_right_5 m_left_5 m_bottom_10 tr_all"><a data-group="'+group+'" data-title="{{title}}" href="{{image}}" class="jackbox d_block frame_container mini"><img alt="" width="80" height="80" src="{{image_s}}"/></a></li>',
					itemCallback:function(){
						counter++;
						// if(counter == defaults.limit) $('.jackbox.temporary').eq(0).jackBox('removeItem');
					}
				}

				config = $.extend({}, defaults, options);

				self.jflickrfeed(config,function(data){
					self.find('.jackbox[data-group='+group+']').jackBox("newItem", {
				        group: group
				    });
				});


			});

		},

		isotope : function(){

			var cthis = this;
			$('[data-isotope-options]').each(function(){

				var self = $(this),
					options = self.data('isotope-options');

				var isotope = self.isotope(options);

				isotope.isotope('layout');

				cthis.events.sortIsotope(self);	

			});

		},

		simpleSlideshow : function(){

			var slideshow = $('.simple_slideshow');
			if(!slideshow.length) return false;

			slideshow.each(function(){

				var $this = $(this),
					options = $this.data('flexslider-options'),
					all = {
						animationSpeed : 500,
						slideshow : false,
						controlNav : false,
						prevText : "",
						nextText : "",
						start : function(){
							var p = $this.find('.flex-prev'),
								n = $this.find('.flex-next');
							p.append('<i class="fa fa-angle-left d_inline_m"></i>');
							n.append('<i class="fa fa-angle-right d_inline_m"></i>');
							p.add(n).addClass('b_none button_type_11 grey state_2 t_align_c vc_child d_block tr_all');
						}
					},
					config = $.extend({}, $.flexslider.defaults , all,  options);

				slideshow.flexslider(config);

			});

		}

	}

	window.globalCore = Core;

	//DOM ready

	$(function(){
		Core.initialize("DOM");
		$(window).afterResize(function(){
			$.correctResponsiveImagesPosition();	
			$.megaMenu();
		});
	});


	// after all images been loaded

	$(window).load(function(){
		Core.initialize('images');
	});

	$(window).on('load',function(){
		$('#preloader').fadeOut(1000,function(){
			// page loaded
			$('[data-popup="#subscribe_popup"]').trigger('click');
		});
		$('[data-popup="#quick_view"]').click(function(event){
			event.preventDefault();
			var d = $(this).data('color');
					    
			if($(window).width() < 768){
				$.get( $(this).data('url'), { precio:d.precio*3, descripcion: d.descripcion, cantidad: 1, codigo: d.codigo+'-'+d.codigo } )
					  .done(function( data ) {
					  	actualizarCarritoEnHeader(data);
					  });
				  return true;
			}
			
			$("#qv_precio").empty().html('$'+d.precio+' x Kg.');
			$("#qv_color").empty().html(d.color);
			$("#qv_codigo").empty().html(d.codigo);
			$("#qv_nombre").empty().html(d.descripcion);
			$("#qv_image > img#zoom").attr('src',d.img);
			$("#qv_image > img#zoom").attr('alt',d.descripcion);
			return true;
		});
		$('[data-popup="#quick_view_tb"]').click(function(event){
			event.preventDefault();
			var d = $(this).data('color');
			$("#qvtb_precio").empty().html('$'+d.precio);
			$("#qvtb_colores").empty()
			var colores = '';
			for(var i=0; i < d.colores.length; i++){
				colores += '<option value="'+d.colores[i].codcolor+'">'+d.colores[i].color+'</option>';
			}
			
			$("#qvtb_colores").html(colores);
			$("#qvtb_talles").empty();
			var talles = '';
			for(var i=0; i < d.talles.length; i++){
				talles += '<option value="'+d.talles[i].codtalle+'">'+d.talles[i].talle+'</option>';
			}
			
			$("#qvtb_talles").html(talles);
			$("#qvtb_codigo").empty().html(d.codigo);
			$("#qvtb_nombre").empty().html(d.descripcion);
			$("#qvtb_image > img#zoom").attr('src',d.img);
			$("#qvtb_image > img#zoom").attr('alt',d.descripcion);
			return true;
		});
		$('[data-popup="#quick_view_acc"]').click(function(event){
			event.preventDefault();
			var d = $(this).data('color');
					    
			if($(window).width() < 768){
				$.get( $(this).data('url'), { precio:d.precio, descripcion: d.descripcion, cantidad: 1, codigo: d.codigo+'-'+d.codigo } )
					  .done(function( data ) {
					  	actualizarCarritoEnHeader(data);
					  });
				  return true;
			}
			
			$("#qv_precio").empty().html('$'+d.precio);
			$("#qv_color").empty().html(d.color);
			$("#qv_codigo").empty().html(d.codigo);
			$("#qv_nombre").empty().html(d.descripcion);
			$("#qv_image > img#zoom").attr('src',d.img);
			$("#qv_image > img#zoom").attr('alt',d.descripcion);
			return true;
		});

		//zoom

		$("img.imagezoom").elevateZoom({
			borderSize: 1,
			borderColour: '#ccc',
			responsive: true,
			zoomWindowOffetx: -250,
			zoomWindowOffety: 50,
		});

		//agregar un paq de cada uno
		$("a[data-cargar-todos]").click(function(event){
			event.preventDefault();
			$.get( $(this).data('cargar-todos') )
			  .done(function( data ) {
			    actualizarCarritoEnHeader(data);
			  });
		});

		// functiones de carrito

		$("#qv_agregar").click(function(event){
			event.preventDefault();
			$.get( $(this).data('url'), { precio:$("#qv_precio").text().replace("$","").replace(" x Kg.","")*3, descripcion: $("#qv_nombre").text(), cantidad: $("#qv_cant").val(), codigo: $("#qv_codigo").text()+'-'+$("#qv_color").text() } )
			  .done(function( data ) {
			    actualizarCarritoEnHeader(data);
			  });
		});
		$("#qv_agregar_tb").click(function(event){
			event.preventDefault();
			$.get( $(this).data('url'), { precio:$("#qvtb_precio").text().replace("$",""), descripcion: $.trim($("#qvtb_nombre").text())+' '+$.trim($('#qvtb_colores').find('option:selected').text())+ ' talle '+ $('#qvtb_talles').val(), cantidad: $("#qv_cant").val(), codigo: $.trim($("#qvtb_codigo").text())+'-'+$.trim($("#qvtb_colores").val())} )
			  .done(function( data ) {
			    actualizarCarritoEnHeader(data);
			  });
		});

		$(document).on('click',"span.header_cart_remove",function(event){
			event.preventDefault();
			var rowId = $(this).data('itemid');
			$.get( $(this).data('url'))
			  .done(function( data ) {
			    actualizarCarritoEnHeaderTotales(data);
			  });
		});
		$(document).on('click',"button.shoping-cart-remove",function(event){
			event.preventDefault();
			var rowId = $(this).data('itemid');
			var self = $(this);
			$.get( $(this).data('url'))
			  .done(function( data ) {
			  	if (data.count == 0){
			  		$("a.shoping-cart-confirmar-button").remove();
			  	}
			  	self.closest('tr').remove();
			    actualizarCarritoEnHeaderTotales(data);
			    actualizarCarritoTotales(data);
			  });
		});
		$(document).on('click',"button.shoping-cart-update",function(event){
			event.preventDefault();
			var self = $(this);
			var qty = self.closest('tr').find('input.item-qty').val();
			if(qty == 0){
				self.closest('tr').find('button.shoping-cart-remove').click();
				return false;
			}
			$.get( $(this).data('url')+'/'+qty)
			  .done(function( data ) {
			  	self.closest('tr').find('b.item-subtotal').text('$'+data.item_subtotal);
			  	actualizarCarritoTotales(data);
			  	$.get( self.data('urlheader'))
			  		.done(function( data ) {
			  			actualizarCarritoEnHeader(data);
			  		});
			  });
		});
		$("input.item-qty-carrito").on('change',function(event){
			var self = $(this);
			var qty = self.closest('tr').find('input.item-qty').val();
			var rowid = self.data('rowid');
			if(qty == 0){
				if(confirm('quitar del carrito?')){
					self.closest('tr').find('button.shoping-cart-remove').click();
					return false;
				}
			}
			//self.closest('tr').find('button.shoping-cart-update').click();
			$.get( $(this).data('url')+'/'+qty)
			  .done(function( data ) {
			  	self.closest('tr').find('b.item-subtotal').text('$'+data.item_subtotal);
			  	actualizarCarritoTotales(data);
			  	$.get( self.data('urlheader'))
			  		.done(function( data ) {
			  			actualizarCarritoEnHeader(data);
			  		});
			  });
		});


		$(document).on('click',"a.confirmar-pedido-button",function(event){
			event.preventDefault();
			
			if(confirm('Esto enviará su pedido, está seguro?')){
				window.location.href=$(this).attr('href');
			}
		});
		$(document).on('click',"button.filtro_hilados_button",function(event){
			event.preventDefault();
			var temp = $(".temporada_valor").text();
			if(temp.substr(0,4)=="Sele"){
				temp = '';
			}
			var tipo = $(".tipo_valor").text();
			if(tipo.substr(0,4)=="Sele"){
				tipo = '';
			}
			var url = $(this).data("url");
			var cat = $(".categoria_valor").text();
			if(cat.substr(0,4)=="Sele"){
				cat = '';
			}
			window.location.href=url+"?temporada="+temp+"&tipo="+tipo+'&cat='+cat;
			
		});
		
	});

	//actualizar carrito en header

	var actualizarCarritoEnHeader = function(cart){
		 $("li#header-cart").remove();
		 $('ul.shop_list').append(cart);

	};

	var actualizarCarritoEnHeaderTotales = function(cart){
		 $('.header-cart-total').empty().append('$'+cart.total);
		 $('.header-cart-count').empty().append(cart.count);

	};
	var actualizarCarritoTotales = function(cart){
		 $('.shoping-cart-total').empty().append('$'+cart.total);
	};

})(jQuery);

