var $=jQuery;
var WPTHEME = '/wp-content/themes/kphew-v1.0/';
var DOMAIN = location.protocol + "//" + location.host;

// Requires JS libraries to be loaded via WordPress
initBreakPoint();
initBrowserDetection();

// Functions after pages loads
jQuery(document).ready(function($){
	
	initMobileNav()
	initDesktopSubNav();
	initSearch();
	
	
	if (isPage('home')){
		initHomeSlider();
		initHomeWellnessExpand();
	}

	if (isPage('classes')){
		initDropDown();
	}

	if (isPage('about')){
		initAboutCarousel();
	}	
	
});

// ===================================================================
// About Page - Testimonials Carousel
// ===================================================================
function initAboutCarousel(){

	//github.com/kenwheeler/slick/
	$.ajax({
		url: WPTHEME+"js/jquery.slick.min.js",
		dataType: "script",
		cache: true
	}).done(function(){

		$('#about ul.slider').slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			touchThreshold: 8,
			speed: 600,
			autoplay: true,
			autoplaySpeed: 2000,
			prevArrow: "<div class='slick-prev slick-arrow'></div>",
			nextArrow: "<div class='slick-next slick-arrow'></div>"
		});
				
	});


}


// ===================================================================
// Classes Page - Courses drop-down Menus
// ===================================================================
function initDropDown(){
	$('.title span').click(function(){
	
		if ($(this).closest('.item').hasClass('open')){
			$(this).parent().next('.dropdown').slideUp('slow',function(){
				$(this).parent().removeClass('open');
			});		
		} else {
			$(this).parent().next('.dropdown').slideDown('slow',function(){
				$(this).parent().addClass('open');
			});
		}
	
	});
}


// ===================================================================
// Home Wellness Box - Mobile Expand
// ===================================================================
function initHomeSlider(){

	$.ajax({
		url: WPTHEME+"js/jquery.slick.min.js",
		dataType: "script",
		cache: true
	}).done(function(){
		$('.slider').slick({
			 autoplay:true,
			 autoplaySpeed:5000,
			 arrows:false,
			 draggable:false
		});
	});
	
}


// ===================================================================
// Home Wellness Box - Mobile Expand
// ===================================================================
function initHomeWellnessExpand(){

	// Updates the click event when breakpoint change occurs	
	$(window).on('breakPointChange', function(){
		if (breakPoint() <= 480){
			HomeWellnessExpand();
		} else {
			$('.box.wellness .title').unbind('click');
			$('.box.wellness ul').removeAttr('style');
		}
	});


	function HomeWellnessExpand(){
		$('.box.wellness .title').click(function(){
			var box = $(this).closest('.box');	
			if (box.hasClass('open')){
				$('ul',box).slideUp(300,function(){
					box.removeClass('open');
				});
			} else {
				$('ul',box).slideDown(300,function(){
					box.addClass('open');
				});
			}
		});
	}

}


// ===================================================================
// Collapsible Search Field - Desktop
// ===================================================================
function initSearch(){
	$('header .search .overlay').click(function(){
		showSearch();	
	});
	
	$('header .search input').focusout(function(){
		hideSearch();
	});

	$('header .search div.button').click(function(event){
		event.preventDefault();
		execSearch()
	});
	
	$('header .search').keydown(function(event){ 
		var keyCode = (event.keyCode ? event.keyCode : event.which);   
		if (keyCode == 13) {
			execSearch()
		}
	});
	
	function showSearch(){
		$('header .search .overlay').fadeOut(300,function(){
			$('header .search .show').fadeIn(300, function(){
				$(this).animate({width:'240px'},300);
				setTimeout(hideSearch, 3000);
			});		
		});
	}
	
	function hideSearch(){
		if ($('header .search input').is(":focus") === false && $('header .search input').val().length == 0){
			$('header .search .show').animate({width:'30px'},300,function(){
				$('header .search .show input').val('');
				$('header .search .show').fadeOut(300, function(){
					$('header .search .overlay').fadeIn(300);
				});
			});
		}
	}
	
	function execSearch(){
		if ($('header .search input').val()){
			window.location.href = DOMAIN+"/search/"+$('header .search input').val();
		}	
	}

}


// ===================================================================
// Drop-down Navigation - Desktop
// ===================================================================
function initDesktopSubNav(){
	/* Hover
	$('nav.desktop li').hover(function(){	
		$('ul',this).css('opacity',0).slideDown(300).animate({opacity:1},{queue:false, duration:300});
	},function(){
		$('ul',this).fadeOut(300);
	});
	*/
	
	$('nav.desktop li.sub > a').click(function(event){	
		event.preventDefault();
		var menu = $(this).parent();
		if (menu.hasClass('open')){
			$('ul',menu).slideUp(300,function(){
				menu.removeClass('open');
			});
		} else {
			$('ul',menu).slideDown(300,function(){
				menu.addClass('open');
			});	
		}
		
	});

}


// ===================================================================
// Side Navigation - Mobile
// ===================================================================
function initMobileNav(){
	$('#menu-button').click(function(){	
		if ($('body').hasClass('show-nav')){
			$('body').removeClass('show-nav');
		} else {
			$('body').addClass('show-nav');
		}
	});
	
	$('nav.mobile li.sub > a').click(function(event){
		event.preventDefault();
		var menu = $(this).parent();
		if (menu.hasClass('open')){
			menu.removeClass('open');
			$('ul',menu).slideUp(300);
		} else {
			menu.addClass('open');
			$('ul',menu).slideDown(300);		
		}
	});
}


// ===================================================================
// Breakpoint Change Listener - JS file loaded via WordPress
// ===================================================================
function initBreakPoint(){
	//github.com/xoxco/breakpoints
	$(window).setBreakpoints({distinct:true, breakpoints:[320,480,768,1024]});	
	$(window).bind('enterBreakpoint1024',breakPointChange);
	$(window).bind('enterBreakpoint768',breakPointChange);
	$(window).bind('enterBreakpoint480',breakPointChange);
	$(window).bind('enterBreakpoint320',breakPointChange);

	function breakPointChange(){
		$(window).trigger('breakPointChange');
	}	
}

// ===================================================================
// Browser Detection - JS file loaded via WordPress
// ===================================================================
function initBrowserDetection(){
	//github.com/gabceb/jquery-browser-plugin
	
	// OS Class
	if (jQBrowser.mac){
		$('html').addClass('mac');
	} else if (jQBrowser.win){
		$('html').addClass('win');
	} else if (jQBrowser.android){
		$('html').addClass('android');
	} else if (jQBrowser.ipad || jQBrowser.iphone || jQBrowser.ipod){
		$('html').addClass('ios');
	}
	
	// Browser
	if (jQBrowser.chrome){
		$('html').addClass('chrome');
	} else if (jQBrowser.mozilla){
		$('html').addClass('firefox');
	} else if (jQBrowser.safari){
		$('html').addClass('safari');
	} else if (jQBrowser.msie){
		$('html').addClass('msie');
		if (jQBrowser.version >= 8 && jQBrowser.version < 9){
			$('html').addClass('ie8');
		} else if (jQBrowser.version >= 9 && jQBrowser.version < 10){
			$('html').addClass('ie9');
		} else if (jQBrowser.version >= 10 && jQBrowser.version < 11){
			$('html').addClass('ie10');
		} else if (jQBrowser.version >= 11){
			$('html').addClass('ie11');
		}
	} else if (jQBrowser.msedge){
		$('html').addClass('msedge');
	}

}

// ===================================================================
// Function that returns what the current breakpoint is
// ===================================================================
function breakPoint(){
	var breakpoint;
	if ($('body').hasClass('breakpoint-1024')){
		breakpoint = 1024;
	} else if ($('body').hasClass('breakpoint-768')){
		breakpoint = 768;
	} else if ($('body').hasClass('breakpoint-480')){
		breakpoint = 480;
	} else if ($('body').hasClass('breakpoint-480')){
		breakpoint = 320;
	} else {
		//Fallback method: Calculates browser width without scrollbars
		$('body').css('overflow', 'hidden');
		var width = $(window).width();
		$('body').css('overflow', 'auto');
		if (width >= 1024){breakpoint = 1024;}
		else if (width >= 768){breakpoint = 768;}
		else if (width >= 480){breakpoint = 480;}
		else {breakpoint = 320;}
	}	
	return breakpoint;	
}

// ===================================================================
// Global Function to determine what page is viewed based on body ID
// ===================================================================
function isPage(a){

	var array = a.split(':');
	if (array.length == 2){
		if($("body#"+array[0]).length && $("body").attr("data-sub") == array[1]){return true;}
		else{return false;}
	} else {
		if($("body#"+a).length){return true;}
		else{return false;}
	}
	
}

// ===================================================================
// Function to send Google Analytics event data
// ===================================================================
function recordGAEvent(category, action, label, url){

	if (ga.hasOwnProperty('loaded') && ga.loaded === true) {
		if (url === undefined){	
			ga('send', 'event', category, action, label);
		} else {
			ga('send', 'event', {
				'eventCategory' : category,
				'eventAction'   : action,
				'eventLabel'    : label,
				'hitCallback'   : function (){document.location = url;}
			});		
		}
	} else if (url !== undefined){	
		document.location = url;
	}
	
}