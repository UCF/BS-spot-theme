!function(e,n,t){function o(e,n){return typeof e===n}function s(){var e,n,t,s,a,i,r;for(var l in c){if(e=[],n=c[l],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=o(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],r=i.split("."),1===r.length?Modernizr[r[0]]=s:(!Modernizr[r[0]]||Modernizr[r[0]]instanceof Boolean||(Modernizr[r[0]]=new Boolean(Modernizr[r[0]])),Modernizr[r[0]][r[1]]=s),f.push((s?"":"no-")+r.join("-"))}}function a(e){var n=p.className,t=Modernizr._config.classPrefix||"";if(h&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),h?p.className.baseVal=n:p.className=n)}function i(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):h?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function r(){var e=n.body;return e||(e=i(h?"svg":"body"),e.fake=!0),e}function l(e,t,o,s){var a,l,f,c,d="modernizr",u=i("div"),h=r();if(parseInt(o,10))for(;o--;)f=i("div"),f.id=s?s[o]:d+(o+1),u.appendChild(f);return a=i("style"),a.type="text/css",a.id="s"+d,(h.fake?h:u).appendChild(a),h.appendChild(u),a.styleSheet?a.styleSheet.cssText=e:a.appendChild(n.createTextNode(e)),u.id=d,h.fake&&(h.style.background="",h.style.overflow="hidden",c=p.style.overflow,p.style.overflow="hidden",p.appendChild(h)),l=t(u,e),h.fake?(h.parentNode.removeChild(h),p.style.overflow=c,p.offsetHeight):u.parentNode.removeChild(u),!!l}var f=[],c=[],d={_version:"3.0.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){c.push({name:e,fn:n,options:t})},addAsyncTest:function(e){c.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=d,Modernizr=new Modernizr;var u=d._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):[];d._prefixes=u;var p=n.documentElement,h="svg"===p.nodeName.toLowerCase(),m=d.testStyles=l;Modernizr.addTest("touchevents",function(){var t;if("ontouchstart"in e||e.DocumentTouch&&n instanceof DocumentTouch)t=!0;else{var o=["@media (",u.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");m(o,function(e){t=9===e.offsetTop})}return t}),s(),a(f),delete d.addTest,delete d.addAsyncTest;for(var v=0;v<Modernizr._q.length;v++)Modernizr._q[v]();e.Modernizr=Modernizr}(window,document);

jQuery(document).ready(function($) {
	
	/* Mobile Menu Open */
	$( '#header .open_menu' ).on( 'click', function(e) {
		e.preventDefault();
		$( '.open_menu' ).toggleClass( 'active' );

		if ( $( '.open_menu' ).hasClass( 'active' ) ) {
			$( '.mobile-menu' ).slideDown( 200 );
		} else {
			$( '.mobile-menu' ).slideUp( 200 );
		}
	} );

	/* Smooth Scroll To Top */
	$( 'footer .footer-up' ).on( 'click', function(e) {
		e.preventDefault();

		$( 'html, body' ).animate({
	        scrollTop: $( '#wrap' ).offset().top
	    }, 1000 );
	});

	// function initializeGoogleMap( mapElement, panByNum, panByLeft ) {

	// 	//Latitude/Longitude
	// 	var ll1 = new google.maps.LatLng( 28.6030657, -81.20150739999997 );

	// 	//Set up Map Style
 //        var mapstyle = [{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"visibility" : "off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}];
 //        var SPRY_MAP_STYLE = 'spry_style';

	// 	//Map Settings
 //        var mapOptions = {
 //            center: ll1,
 //            zoom: 15,
 //            scrollwheel: false,
 //            streetViewControl: false,
	// 		mapTypeControl: false,
	// 		panControl: false,
	// 		mapTypeId: SPRY_MAP_STYLE,
	// 		zoomControlOptions: {
	// 	        style: google.maps.ZoomControlStyle.LARGE,
	// 	        position: google.maps.ControlPosition.LEFT_CENTER
	// 	    },
 //        };

 //        //Activate Map
 //        var map = new google.maps.Map(document.getElementById( mapElement ), mapOptions);

 //        //Activate map style
	// 	var mapType = new google.maps.StyledMapType(mapstyle, {name:"Spry"});    
	// 	map.mapTypes.set(SPRY_MAP_STYLE, mapType);
	// 	map.panBy( panByNum, panByLeft );

	// 	//Markers
	// 	var markerIcon = new google.maps.MarkerImage(
	// 		SPRY.themeUrl + '/library/images/map-cash-pin.png',
	// 		new google.maps.Size(34, 48)
	// 	);

	// 	var marker = new google.maps.Marker({
	// 		position: ll1,
	// 		map: map,
	// 		title: 'Location 1',
	// 		icon: markerIcon
	// 	});

	// 	//Info Boxes JSON
	// 	var IB_defaults = {
	// 		map: map,
	// 		shadowstyle: 2,
	// 		padding: 0,
	// 		backgroundColor: 'rgb(255,255,255)',
	// 		borderRadius: 0,
	// 		maxWidth: 230,
	// 		minWidth: 230,
	// 		minHeight: 230,
	// 		borderWidth: 0,
	// 		hideCloseButton: true,
	// 		animation: null,
	// 		disableAutoPan: true,
	// 		pixelOffset: new google.maps.Size( -220, 0 ),
	// 	};

	// 	var InfoWindow = new InfoBubble( IB_defaults );

	// 	var the_html = '<div class="info-box-wrapper" style="position: relative;min-height: 230px; width: 230px; max-width: 230px;">';

	// 		the_html += '<div class="body" style="position: relative;padding: 15px;width: 230px; max-width: 230px;">';

	// 			the_html += '<div class="logo-container" style="position: relative;background: #72ac35;height: 110px;width: 100%;z-index: 5;">';
	// 				the_html += '<div class="outer" style="display: table;position: relative;height: 100%;width: 100%;">';
	// 					the_html += '<div class="inner" style="display: table-cell;vertical-align: middle;text-align: center;position: relative;width: 100%;">';
	// 						the_html += '<a href="#" class="map-logo" style="position: relative;background: url(http://ucfthespot.flywheelsites.com/wp-content/themes/UCFSPOT/library/images/map-logo.png) no-repeat;display: block;width: 110px;height: 90px;margin: 0 auto;"></a>';
	// 					the_html += '</div>';
	// 				the_html += '</div>';
	// 			the_html += '</div>';

	// 			the_html += '<div class="address-container">';
	// 				the_html += '<h3 style="color: #777777;font-size: 16px;margin: 20px 0 0 0;font-family: \'aktiv-grotesk-n7\', \'aktiv-grotesk\', Helvetica, sans-serif;font-style: normal;font-weight: 700;">Address</h3>';
	// 				the_html += '<div style="color: #777777;font-size: 16px;margin: 5px 0 0 0;line-height: 1.2em;font-family: \'aktiv-grotesk-n4\', \'aktiv-grotesk\', Helvetica, sans-serif;font-style: normal;font-weight: 400;" class="address">106 Aquarius Agora Drive<br />Orlando, FL 32816</div>';
	// 			the_html += '</div>';

	// 		the_html += '</div>';

	// 	the_html += '</div>';

	// 	InfoWindow.setContent( the_html );

	// 	setTimeout( function() {
	// 		InfoWindow.open( map, marker );
	// 	}, 1000 );

	// }

	// if ( $( '#map' ).length ) {
	// 	google.maps.event.addDomListener( window, 'load', initializeGoogleMap( 'map', 0, -150 ) );
	// 	$( '.printMap' ).on( 'click', function( e ) {
	// 		e.preventDefault();
	// 		newWindow = window.open( SPRY.themeUrl + '/library/images/' + 'print-map.png' );
 //    		newWindow.print();
	// 	} );
	// }

	if ( $( '.faq-list' ).length ) {
		$( '.faq-title' ).on( 'click', function(e) {
			e.preventDefault();
			$(this).toggleClass( 'active' );
			if ( $(this).hasClass( 'active' ) ) {
				$(this).parent().find( '.faq-info' ).slideDown( 500 );
			} else {
				$(this).parent().find( '.faq-info' ).slideUp( 500 );
			}
		} );
	}

	if ( $( '.shipping-form' ).length ) {
		$( '#showForm' ).on( 'click', function(e) {
			e.preventDefault();

			$( '.hide-this' ).fadeOut( 500, function() {
				$(this).addClass( 'hide' );
				$( '.shipping-form' ).hide().removeClass( 'hide' ).fadeIn( 500 );
			} );

		} );
	}

	if ( $( '#scrollFullQuote' ).length ) {
		$( '#scrollFullQuote' ).on( 'click', function() {
			$('html, body').animate({
		        scrollTop: $( '#gform_fields_6' ).offset().top
			}, 1000);
		} );
	}

	/* Window Resize Functions */
	$(window).resize( function() {
		stickyFooter();
	} );

	/* Sticky Footer */
	stickyFooter();

	function stickyFooter() {
		$( '#wrap' ).css( { 'padding-bottom' : $( '#footer' ).outerHeight() } );
	}
	
});