( function( $ ) {
	"use strict";

	var boutique = {
		animate_nivo: function($progress, speed) {
			$progress.find('span').animate({
					'width': '100%'
			}, speed, 'linear');
		},
		reset_nivo: function($progress) {
			$progress.find('span').stop().css('width', '0%');
		},
		resize_menu: function(width) {
			if(width > 979) {
				$('.main-menu').find('ul').removeClass('span3').addClass('span2');
			}
			else {
				$('.main-menu').find('ul').removeClass('span2').addClass('span3');
			}
		}
	};

	var ajax_request;


	var base = $('base').attr('href');
	var share_url = laboutiqueAjax.template_directory_uri+ '/js/sharrre.php';
	var screen_width = $(window).width();
	(function() {
		boutique.resize_menu(screen_width);
	})();

	(function() {
		$(".mobile-nav").change(function() {
			window.location = $(this).find("option:selected").val();
		});
	})();


	(function() {
		var panel_navigation = $('.panel-navigation.primary');
		panel_navigation.children('li').children('a').append('<span class="toggle">&minus;</span>');
		panel_navigation.find('.toggle').on('click', function(event) {
			var $this = $(this);
			var active = $this.hasClass('active');
			$this.toggleClass('active').html(active ? '&minus;' : '&plus;');
			$this.parent('a').next('.panel-navigation.secondary').slideToggle();
			event.preventDefault();
		});
	})();
	(function() {
		$('#checkout-content').on('click', '.shipping-methods .box, .payment-methods .box', function(e) {
			var radio = $(this).find(':radio');
			radio.prop('checked', true);
		});
	})();

	(function() {
		var slider = $('#slider');
		slider.slider({
			range: true,
			min: 0,
			max: slider.data('max'),
			values: [0, slider.data('max')],
			step: slider.data('step'),
			animate: 200,
			slide: function(event, ui) {
				$('#slider-label').find('strong').html(slider.data('currency') + ui.values[0] + ' &ndash; ' + slider.data('currency') + ui.values[1]);
			},
			change: function(event, ui) {
				var products = $('.product-list').find('li').filter(function() {
					return ($(this).data('price') >= ui.values[0]) && $(this).data('price') <= ui.values[1] ? true : false;
				});
				var $product_list = $('.product-list.isotope');
				$product_list.isotope({
					filter: products
				});
			}
		});
	})();
	(function() {
		var $product_list = $('.product-list.isotope');
		$product_list.addClass('loading');
		$product_list.imagesLoaded(function() {
			$product_list.isotope({
				itemSelector: 'li'
			}, function($items) {
				this.removeClass('loading');
			});
		});
	})();


	$("[rel='tooltip']").tooltip();
	$('#sharrre .twitter').sharrre({
		template: '<button class="btn btn-mini btn-twitter"><i class="icon-twitter"></i> &nbsp; {total}</button>',
		share: {
			twitter: true
		},
		enableHover: false,
		enableTracking: false,
		click: function(api, options) {
			//api.simulateClick();
			api.openPopup('twitter');
		},
		url:document.location.href,
		urlCurl: share_url
	});
	$('#sharrre .facebook').sharrre({
		template: '<button class="btn btn-mini btn-facebook"><i class="icon-facebook"></i> &nbsp; {total}</button>',
		share: {
			facebook: true
		},
		enableHover: false,
		enableTracking: false,
		click: function(api, options) {
			//api.simulateClick();
			api.openPopup('facebook');
		},
		url:document.location.href,
		urlCurl: share_url
	});
	$('#sharrre .googleplus').sharrre({
		template: '<button class="btn btn-mini btn-googleplus"><i class="icon-google-plus"></i> &nbsp; {total}</button>',
		share: {
			googlePlus: true
		},		
		enableHover: false,
		enableTracking: false,
		click: function(api, options) {
			//api.simulateClick();
			api.openPopup('googlePlus');
		},
		url:document.location.href,
		urlCurl: share_url
	});
	$('#sharrre .pinterest').sharrre({
		template: '<button class="btn btn-mini btn-pinterest"><i class="icon-pinterest"></i> &nbsp; {total}</button>',
		share: {
			pinterest: true
		},
		enableHover: false,
		enableTracking: false,
		buttons: { 
       		pinterest: {
		        url: document.location.href,
		        media: $('.product-images .images .primary img').attr('src')
		        
        	}
      	},
		click: function(api, options) {
			//api.simulateClick();
			api.openPopup('pinterest');
		},
		url:document.location.href,
		urlCurl: share_url
	});




	if (laboutiqueAjax.shop_zoom!='lightbox' && parseInt($(window).outerWidth())>=800){
		
		var zoomConfig={
			zoomType: "inner",
			cursor: "crosshair",
			easing: true,
			zoomWindowFadeIn: 300,
			zoomWindowFadeOut: 300,
			gallery: 'gallery',
			galleryActiveClass: 'active',
			responsive:true
		};

		$('.product-images .primary img').elevateZoom(zoomConfig);

		
		$('.product-images #gallery li a').on('click', function(){
		    // Remove old instance od EZ
		    $('.zoomContainer').remove();

			var zoomImage=$('.primary img',$(this).parents('.product-images:first'));

		    zoomImage.removeData('elevateZoom');

		    // Update source for images
		    zoomImage.attr('src', $(this).data('image'));
		    zoomImage.data('zoom-image', $(this).data('zoom-image'));

		    // Reinitialize EZ
		    zoomImage.elevateZoom(zoomConfig);
		});


		/*fix for zoom when variation changes*/
		$(window).on('woocommerce_variation_select_change',function(){

			setTimeout(function(){

				var zoomImage=$('.product-images .primary img');								

				$('.zoomContainer').remove();
				
			    zoomImage.removeData('elevateZoom');

			    zoomImage.attr('data-zoom-image',zoomImage.attr('src')).attr('data-o_src',zoomImage.attr('src'));				    
			    zoomImage.data('zoom-image', zoomImage.attr('src'));

			    // Reinitialize EZ
			    zoomImage.elevateZoom(zoomConfig);

								
				
			},250);			

		});

		$(window).resize(function(){
	
			if (laboutiqueAjax.shop_zoom=='' || laboutiqueAjax.shop_zoom==undefined || isNaN(laboutiqueAjax.shop_zoom) || laboutiqueAjax.shop_zoom=='zoomin'){
				$('.zoomContainer').remove();

				if (typeof(zoomConfig)!='undefined'){
					$('.product-images .primary img').elevateZoom(zoomConfig);
				}			
			}
		});

	} else {
		$('.product-images #gallery li a').on('click', function(){
		    
			var zoomImage=$('.primary img',$(this).parents('.product-images:first'));		   

		    // Update source for images
		    zoomImage.attr('src', $(this).data('image'));
		    zoomImage.attr('data-zoom-image', $(this).attr('data-zoom-image'));				 

		    return false;
		});

		$('.product-images .primary img').css('cursor','pointer').on('click',function(){
			var url=$(this).attr('data-zoom-image');


			if (typeof($.prettyPhoto.open)=='function' && url){

				var image_url;
				var api_images=new Array(url);
				var images=$('.product-images #gallery li a');

				if (images.length){
					for(var i=0;i<images.length;i++){
						image_url=$(images[i]).attr('data-zoom-image');

						if (url!=image_url){
							api_images.push(image_url);
						}
					}
				}

				$.prettyPhoto.open(api_images);
			}
			
			return false;
		});
	}

	//set color scheme
	if (typeof($.cookie('color_scheme'))!=undefined){
		var stylesheet = $('#color_scheme');
		stylesheet.attr('href', $.cookie('color_scheme'));
		
		
		$('.options-panel #option_color_scheme').val($.cookie('color_scheme'));
		
		
	}


	$(window).resize(function() {
		"use strict";	
		
		var screen_width = $(window).width();
		
		var $product_list = $('.isotope');
		$product_list.isotope('reLayout');
		
		boutique.resize_menu(screen_width);
	});

	function remove_modal(){
		$('.modal.validate').remove();
	}

	/**
	settings={

			title:'',
			subtitle:'',
			content:'',
			class
		}
	*/

	function validateEmail(email) { 
	    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	} 

	function show_modal(settings){
		remove_modal();

		if (!settings)
			settings={};

		var output='';


		output=output+'<div class="modal validate hide fade" tabindex="-1" style="z-index: 999999;"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';


        if (settings.title || settings.subtitle){
	        output=output+'<div class="hgroup title">';

	        if (settings.title)
	            output=output+'<h3>'+settings.title+'</h3>';

			if (settings.subtitle)
	            output=output+'<h5>'+settings.subtitle+'</h5>';

	        output=output+'</div>';
		}

	    output=output+'</div>';

	    if (settings.content){
	    	output=output+'<div class="modal-body">'+settings.content+'</div>';
	    }


		output=output+'<div class="modal-footer"><div class="pull-left"><button data-dismiss="modal" aria-hidden="true" class="btn btn-small">Close &nbsp; <i class="icon-ok"></i></button></div></div></div>';

		$('body').prepend(output);

		
		$('.modal').addClass(settings.class).modal('show'); 

	}

	function show_ajax_preloader(){
		remove_ajax_preloader();
		$('body').prepend('<div class="ajax_loading_indicator"></div>');
	}

	function remove_ajax_preloader(){
		$('.ajax_loading_indicator').remove();
	}

	function parse_date(date_str) {
		// The non-search twitter APIs return inconsistently-formatted dates, which Date.parse
		// cannot handle in IE. We therefore perform the following transformation:
		// "Wed Apr 29 08:53:31 +0000 2009" => "Wed, Apr 29 2009 08:53:31 +0000"
		return Date.parse(date_str.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i, '$1,$2$4$3'));
	}

	function relative_time(date) {
		var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
		var delta = parseInt((relative_to.getTime() - date) / 1000, 10);
		var r = '';
		if (delta < 1) {
			r = 'just now';
		} else if (delta < 60) {
			r = delta + ' seconds ago';
		} else if(delta < 120) {
			r = 'about a minute ago';
		} else if(delta < (45*60)) {
			r = 'about ' + (parseInt(delta / 60, 10)).toString() + ' minutes ago';
		} else if(delta < (2*60*60)) {
			r = 'about an hour ago';
		} else if(delta < (24*60*60)) {
			r = 'about ' + (parseInt(delta / 3600, 10)).toString() + ' hours ago';
		} else if(delta < (48*60*60)) {
			r = 'about a day ago';
		} else {
			r = 'about ' + (parseInt(delta / 86400, 10)).toString() + ' days ago';
		}
		return r;
	}

	function set_twitter(response,cnt){
		

		if (cnt>(response.length-1))
			cnt=0;

		var avatar_url;
		var tweet_url;
		var tweet_time=parse_date(response[cnt].created_at);


		if (document.location.protocol === 'https:'){
			avatar_url=response[cnt].user.profile_image_url_https;
			tweet_url='https://twitter.com/'+response[cnt].user.screenname+'/status/'+response[cnt].id_str;
		} else {
			avatar_url=response[cnt].user.profile_image_url;		
			tweet_url='http://twitter.com/'+response[cnt].user.screenname+'/status/'+response[cnt].id_str;
		}


		$('#tweets').html('<ul class="tweet_list">'+
			'<li class="tweet_first tweet_odd"><div class="tweet"><div class="avatar">'+
			'<a href="http://twitter.com/'+response[cnt].user.screen_name+'" class="tweet_avatar" target="_blank">'+
			'<img width="60" height="60" border="0" title="'+response[cnt].user.name+'" alt="'+response[cnt].user.name+' avatar" src="'+avatar_url+'">'+
			'</a></div><div class="text"><span class="tweet_text">'+response[cnt].text+'</span>'+
			'<span class="tweet_time"><a title="view tweet on twitter" href="'+tweet_url+'">'+relative_time(tweet_time)+'</a></span></div></div></li></ul>').css('display','none').fadeIn("slow");



		setTimeout(function(){
			set_twitter(response,cnt+1);
		},5000);
	}

	function init_isotope(){	


		$('body').remove('#isotope_content_dummy');
		$('<div id="isotope_content_dummy" style="display: none;"></div>').insertAfter('#isotope_content');
		$('#isotope_content .item').appendTo('#isotope_content_dummy');		

		$('#isotope_content_dummy img').imagesLoaded(function(){		

			
			$('#isotope_content').css({'display':'block'}).isotope({
				itemSelector: '.item',
				masonry:{
					columnWidth:1
			    }								
			}).isotope('insert',$('#isotope_content_dummy .item'),init_nav);
		});		

	}


	function static_page_height(){
		
		$('.static-page').imagesLoaded(function(){

			$('.static-page .row-fluid > .span3.visible-desktop,.static-page .row-fluid > .span9').matchHeight();
		});
		
	}

	function options_panel(){
		var options_panel = $('.options-panel');


		options_panel.find('.options-panel-toggle').on('click', function(event) {
			options_panel.toggleClass('active');
			if (options_panel.hasClass('active')) {
				options_panel.animate({
					'left': 0
				}, 600, 'easeInOutBack');
			} else {
				options_panel.animate({
					'left': '-' + options_panel.find('.options-panel-content').outerWidth()
				}, 600, 'easeInOutBack');
			}
			event.preventDefault();
		});

		options_panel.find('ul.controls li a').on('click', function() {
			var css=$(this).attr('href').substring(1);
			
			
			show_ajax_preloader();
			

			setTimeout(function(){			
				$.ajax({
					url:css,
					success:function(){					
						$('#core-theme-css').attr('href', css);
						$.cookie('core-css', css,{expires: 7,path:'/'});

						remove_ajax_preloader();
						
					}				
				});
			},500);

			return false;

		});

		options_panel.find('ul.controls-background li a').on('click', function() {
			var backgroundcolor='#'+$(this).attr('href').substring(1);
						
			$.cookie('core-backgroundcolor', backgroundcolor,{expires: 7,path:'/'});

			$('body').css({backgroundColor:backgroundcolor});

			return false;

		});

	}

	options_panel();

	static_page_height();
	
	setInterval(static_page_height,1000);

	function init_nav(){
		if (laboutiqueAjax.navigation_sticky){

			$('.navigation.visible-desktop').trigger("sticky_kit:detach").stick_in_parent({
				offset_top:0,
				parent:'.wrapper'
			});
		}
	}



	$(window).load(function() {
		"use strict";


		init_nav();


		$('html').removeClass('no-js').addClass('js');

		if (!laboutiqueAjax.header_delay)
			laboutiqueAjax.header_delay=7;

		if (typeof(laboutiqueAjax.header_arrows)==undefined)
			laboutiqueAjax.header_arrows=true;

		if (typeof(laboutiqueAjax.header_pagination)==undefined)
			laboutiqueAjax.header_pagination=true;

		if (typeof(laboutiqueAjax.header_animation)==undefined)
			laboutiqueAjax.header_animation='fade';

		$('.flexslider').flexslider({
			animation: laboutiqueAjax.header_animation,
			easing: 'swing',
			smoothHeight: true,
			slideshowSpeed: laboutiqueAjax.header_delay*1000,
			animationSpeed: 500,
			pauseOnAction: false,
			controlNav: laboutiqueAjax.header_pagination,
			directionNav: laboutiqueAjax.header_arrows,
			start: function($slider) {
				var $this = $(this)[0];
				$('<div />', {
					'class': $this.namespace + 'progress'
				}).append($('<span />')).appendTo($slider);
				$('.' + $this.namespace + 'progress').find('span').animate({
					'width': '100%'
				}, $this.slideshowSpeed, $this.easing);
			},
			before: function($slider) {
				var $this = $(this)[0];
				$('.' + $this.namespace + 'progress').find('span').stop().css('width', '0%');
			},
			after: function($slider) {
				var $this = $(this)[0];
				$('.' + $this.namespace + 'progress').find('span').animate({
					'width': '100%'
				}, $this.slideshowSpeed, $this.easing);
			}
		});


		//activate tabs
        var url=document.location.href.split('#');

        if (url.length>1 && url[url.length-1]){
        	if (url[url.length-1].substring(0,4)=='tab-'){        		


        		$('li',$('a[href="#'+url[url.length-1]+'"]').parents('ul')).removeClass('active');
        		$('a[href="#'+url[url.length-1]+'"]').parents('li:first').addClass('active');
        		

        		var parent=$('a[href="#'+url[url.length-1]+'"]').parents('.nav-tabs:first').parent();
        		$('.tab-pane',parent).removeClass('active');
        		$('.tab-pane#'+url[url.length-1],parent).addClass('active');        		        
				
        		return false;
        	}
            
        }





		$('#query').blur(function(){
			if ($("#autocomplete-results:hover").length == 0)
				$('#autocomplete-results').html('').css({display:'none'});	
		});

		$('#query').keyup(function(){
				var obj=this;
				var value=$(obj).val();

				if (value.length>2){
					/*$(this).val()*/
					remove_ajax_preloader();
					show_ajax_preloader();


					if (ajax_request)
						ajax_request.abort();

					var data=$(obj).parents('form:first').serialize();

					data=data+'&action=laboutique_search_products';

					
					
					ajax_request=$.ajax({
						url: laboutiqueAjax.ajaxurl,
						type:'POST',
						'data':data,
						success:function(response){
							remove_ajax_preloader();
					
			

							if (response.length){


								var output='<ul>';
								var i;

								

								for(i=0;i<response.length;i++){
					
									if (i<=5){
								
										output=output+'<li><a title="'+escape(response[i].title)+'" href="'+response[i].url+'">';

										if (response[i].thumbnail)
											output=output+'<div class="image">'+response[i].thumbnail+'</div>';

										output=output+'<h6>'+response[i].title+'</h6></a></li>';		
									}

								}
								var output=output+'</ul>';


								$('#autocomplete-results').html(output).css({display:'block'});			
							} else {
								$('#autocomplete-results').html('').css({display:'none'});			
							}
						}
					});
	
				}

			});


		/**twitter*/		
		$.ajax({
			url: laboutiqueAjax.ajaxurl,
			type: 'POST',
			data: {					
				action : 'laboutique_twitter_feed',							

			},
			success: function( response ) {;

				if (typeof(response)=='object'){
					if (response.response.statuses){					
						set_twitter(response.response.statuses,0);

					}
				}
			}
		});


		/**handles comments and reviews*/

		$("#commentform").submit(function() {
						


			var errors=new Array();

			if ($('input[name="author"]',this).length>0 && !$('input[name="author"]',this).val()){
				errors.push(authorRequired.emailNotValid);
			}

			if ($('input[name="email"]',this).length>0 && (!$('input[name="email"]',this).val() || !validateEmail($('input[name="email"]',this).val()))){
				errors.push(laboutiqueAjax.emailNotValid);
			}

			if ($('select[name="rating"]',this).length>0 && !$('select[name="rating"]',this).val()){
				errors.push(ratingRequired.emailNotValid);
			}

			if (!$('textarea[name="comment"]',this).val()){
				errors.push(commentRequired.emailNotValid);
			}

			if (errors.length>0){

				var settings={

				};
				

				settings.title=laboutiqueAjax.errorTitle;
				settings.subtitle=errors.join("<br />");


				show_modal(settings);

				return false;
			} 

			
		});



		/**handles newsletter subscription*/

		$(".footer_widget_widget_newsletter_widget button,.widget_newsletter_widget button").click(function() {
			
			var subscriberEmail=$('input[type="text"]',$(this).parents('form:first')).val();

			
			show_ajax_preloader();

			$.ajax({
				// see tip #1 for how we declare global javascript variables
				url: laboutiqueAjax.ajaxurl,
				type: 'POST',
				data: {					
					action : 'laboutique_newsletter',
					subscriberEmail: subscriberEmail,
					newsletterSubscribeNonce : laboutiqueAjax.newsletterSubscribeNonce,

				},
				success: function( response ) {

					remove_ajax_preloader();

					var settings={

					};
					
					// console.log( response );
					if( ! response.success ) {

						settings.title=laboutiqueAjax.errorTitle;

						if( ! response.emailvalid ) {
							settings.subtitle=laboutiqueAjax.emailNotValid;							
						} else {
							settings.subtitle=laboutiqueAjax.somethingWrong;							
						}

						//settings.class='alert';
			
					} else {
						settings.title=laboutiqueAjax.succesTitle;
						settings.subtitle=laboutiqueAjax.newsletterOk;
						settings.class='success';
	
					}

					show_modal(settings);

				}

			});

			

			return false;
		});

	

		init_isotope();
	

		/**handles loading posts with ajax*/
		$('.nav-links .nav-previous a').live('click',function(){

			var obj=this;

			$(obj).addClass('loading');

			if (ajax_request)
				ajax_request.abort();

			ajax_request=$.ajax({
				url:$(obj).attr('href'),
				success:function(response){					

					var html = $($.parseHTML($('.post-list',$(response)).html())).filter(function() {
						return this.nodeType == 1;
					});

			
					$('img',html).imagesLoaded(function() {
						
						if ($('.post-list').attr('id')=='isotope_content'){
							$('.post-list').isotope({
								itemSelector: '.item'
							}).isotope('insert',html,init_nav);		


						} else {							
							$('.post-list').append(html);
							init_nav();
							
						}
						


						var show_more_obj=$('.nav-links .nav-previous a',$(response));
					
						if (show_more_obj.length>0){
							$(obj).attr('href',$(show_more_obj).attr('href'));
							$(obj).removeClass('loading');
						} else {
							$(obj).remove();
						}

						
						
												

					});

						
				}

			});
			return false;
		});


		$('body').bind('price_slider_change',function(e,ui){

			show_ajax_preloader();
	

			var url=$('.price_slider').parents('form:first').attr('action');

			if (url.indexOf('?')==-1)
				url=url+'?';

			url=url+'&'+$('.price_slider').parents('form:first').serialize();
				

			if (ajax_request)
				ajax_request.abort();

			ajax_request=$.ajax({
				'url':url,
				success:function(response){
					remove_ajax_preloader();

					var html=$('#content',$(response)).html();						

					$('#content').html(html);


					var widget_layered_nav_filters=$('.widget_layered_nav_filters',$(response)).html();
					$('.widget_layered_nav_filters').html(widget_layered_nav_filters);
					

					$('.isotope').isotope('destroy');
					init_isotope();

				
				}

			});

		});

		$('#reviews .well .btn').click(function(){
			$('#review_form').modal('show');
			return false;
		});

		
		var menu_class='.main-menu.selected';

		function reset_mega(){
			
			
            $(menu_class).css('right',0);

			$('.main-menu li').removeClass('selected');            
            $('.main-menu li.back').remove();
            $('.megamenu_container').attr('style','');    
            $('.main-menu li ul.megamenu-sub-menu').css('position','');

			
		}
		

		$('.main-menu-button').click(function(){
			

			if (!$('ul:first-child',$(this).parents(':first')).hasClass('selected'))
				reset_mega();
			else 
				$('.megamenu_container').attr('style','');		

			$('ul:first-child',$(this).parents(':first')).toggleClass('selected');						
			

			if ($('ul:first-child',$(this).parents(':first')).hasClass('selected')){

				$(menu_class+' li').each(function(){


					if ($('>ul',$(this)).length>0){
						if ($('.back',$('>ul',$(this))).length<=0)
							$('>ul',$(this)).prepend('<li class="back"><a href="#">Back</a></li>');
					}
				});
			}

			return false;
		});

		
		/*
		$(window).resize(function(){
			reset_mega();

			$('.main-menu').attr('style','').removeClass('selected');

			$(parent).removeClass('.main-menu li.selected').attr('style','');
		
		});
*/

    	$(window).resize({settings:this},function(event){
            reset_mega();

            $(menu_class).removeClass('selected').attr('style','');            
        });


		$(menu_class+' a').live('click',function(){

			if ($('.main-menu').hasClass('selected')){

				$(menu_class).css({overflow:'visible'});

				if ($(this).parents('li:first').hasClass('back')){
					

					var obj=$(this);

	 				if ($(obj).parents('li:first').parents('ul:first').parents('li:first').hasClass('selected')){
	                            

	                    var level=$(this).parentsUntil(menu_class).parents('ul').length-2;
	                    

	                    $(this).parents(menu_class).animate({
							'right':(100*level)+'%'					
						},250,function(){

							$(obj).parents('li:first').parents('ul:first').parents('li:first').removeClass('selected');
						});
	                                              
	                    var height=parseInt($(obj).parents('li:first').parents('ul:first').parents('li:first').parents('ul:first').outerHeight());
	                                                                                                              
	                    $(menu_class).parents('.megamenu_container:first').animate({
	                        'height':height
	                    });

	                }
							
												
					return false;

				} else if ($('>ul',$(this).parents('li:first')).length>0){

					if (!$(this).parents('li:first').hasClass('selected')){
	                    $(this).parents('li:first').addClass('selected');

	                    var level=$(this).parentsUntil(menu_class).parents('ul').length;
	                   
	                
	                    $(this).parents(menu_class).animate({
							'right':(100*level)+'%'					
						},250,function(){

						});

	                    var height=parseInt($('>ul',$(this).parents('li:first')).outerHeight());
	                
	                    
	                    $(menu_class).parents('.megamenu_container:first').animate({
	                        'height':height
	                    });
	                }            
					
					return false;
				}
			}
			
			
		});

	});

} )( jQuery );

