jQuery(document).ready( function($) {

	var map,
		mapBounds = new google.maps.LatLngBounds(
	    	new google.maps.LatLng( 28.580288, -81.212710 ),
	    	new google.maps.LatLng( 28.615847, -81.180345 ) 
		),
		mapMinZoom = 13,
		mapMaxZoom = 17,
		maptiler = new google.maps.ImageMapType( {
		    getTileUrl : function( coord, zoom ) { 
		        var proj = map.getProjection(),
		        	z2 = Math.pow( 2, zoom ),
		        	tileXSize = 256 / z2,
		        	tileYSize = 256 / z2,
		        	tileBounds = new google.maps.LatLngBounds(
		            	proj.fromPointToLatLng( new google.maps.Point( coord.x * tileXSize, ( coord.y + 1 ) * tileYSize ) ),
		            	proj.fromPointToLatLng( new google.maps.Point( ( coord.x + 1 ) * tileXSize, coord.y * tileYSize ) )
		        	),
		        	y = coord.y,
		        	x = coord.x >= 0 ? coord.x : z2 + coord.x;

		        if ( mapBounds.intersects( tileBounds ) && ( mapMinZoom <= zoom ) && ( zoom <= mapMaxZoom ) ) {
		            return SPRY.themeUrl + '/library/images/maptiles/' + zoom + "/" + x + "/" + y + ".png?" + new Date().getTime() + '")';
		        } else {
		        	return 'http://cdn.ucf.edu/map/tiles/white.png?' + new Date().getTime() + '")';
		        }
		    },
		    tileSize : new google.maps.Size( 256, 256 ),
		    isPng : true,
		    opacity : 1.0
		} );

    var styles = [{stylers:[{ color: "#ffffff" }]},{"featureType": "poi","stylers":[{ "visibility": "off" }]}],
    	styledMap = new google.maps.StyledMapType( styles ),
    	opts = {
    		scaleControl: false,
    		scrollwheel : false,
	        tilt : 0,
	        streetViewControl: false,
	        center: new google.maps.LatLng( 28.601400, -81.201200 ),
	        zoom: 17,
	        disableDefaultUI : true,
	        mapTypeId: 'map_style',
	        disableDoubleClickZoom: true
	    },
	    map = new google.maps.Map( document.getElementById( 'map-side' ), opts );

    map.mapTypes.set( 'map_style', styledMap );
	map.overlayMapTypes.insertAt( 0, maptiler );

	var IB_defaults = {
		map: map,
		shadowstyle: 2,
		padding: 0,
		backgroundColor: 'rgb(255,255,255)',
		borderRadius: 0,
		borderWidth: 0,
		hideCloseButton: true,
		animation: null,
		disableAutoPan: true,
		pixelOffset: new google.maps.Size( 230, 230 )
	},

	InfoWindow = new InfoBubble( IB_defaults ),
	JTWC_bubble = new InfoBubble( IB_defaults ),
	METER_bubble = new InfoBubble( IB_defaults );

	function make_marker( lat, lng, which_map, type, coords, has_iw, garage_num ) {
		var image_link = '';

		if ( type == 'garage' ) {
			image_link = SPRY.themeUrl + '/library/images/icon-map-parking-garage.png';
		} else if ( type == 'metered' ) {
			image_link = SPRY.themeUrl + '/library/images/icon-map-metered.png';
		}

		if ( coords != null ) {
			var marker = new google.maps.Marker( {
				position : coords,
				map : which_map,
				icon : image_link
			} );
		} else {
			var point = new google.maps.LatLng( lat, lng );
			var marker = new google.maps.Marker( {
				position: point,
				map: which_map,
				icon: image_link
			} );
		}

		if ( marker != null && has_iw && garage_num != null ) {
			var the_html = '<div class="info-box-wrapper">';
				the_html += '<div class="body">';
					the_html += '<div class="logo-container">';
						the_html += '<div class="outer">';
							the_html += '<div class="inner">';
								the_html += '<a href="#" class="map-logo"></a>';
							the_html += '</div>';
						the_html += '</div>';
					the_html += '</div>';
					the_html += '<div class="address-container">';
						the_html += '<h3>Address</h3>';
						the_html += '<div class="address">' + SPRY.infoBoxContent + '</div>';
					the_html += '</div>';
				the_html += '</div>';
			the_html += '</div>';
			populate_info_window( MAP, marker, InfoWindow, the_html, 'large' );
		} else if ( type == 'metered' ) {
			var the_html = '<div class="info-box-wrapper">';
				the_html += '<div class="body">';
					the_html += '<div class="logo-container">';
						the_html += '<div class="outer">';
							the_html += '<div class="inner">';
								the_html += '<a href="#" class="map-logo"></a>';
							the_html += '</div>';
						the_html += '</div>';
					the_html += '</div>';
					the_html += '<div class="address-container">';
						the_html += '<h3>Address</h3>';
						the_html += '<div class="address">' + SPRY.infoBoxContent + '</div>';
					the_html += '</div>';
				the_html += '</div>';
			the_html += '</div>';
			populate_info_window( MAP, marker, METER_bubble, the_html, 'med' );
		}
	}

	function make_JTWC_marker() {
		var JTWC_coords = new google.maps.LatLng( 28.600670, -81.202550 ),
			JTWC_pin_content = $( '#home-pin-container' ).html(),
			//image_link = SPRY.themeUrl + '/library/images/map-cash-pin.png';
			image_link = SPRY.themeUrl + '/library/images/2.png';

			var markerIcon = new google.maps.MarkerImage( image_link, new google.maps.Size( 34, 48 ) );

		var JTWC_marker = new google.maps.Marker( {
				position: JTWC_coords,
				map: map,
				icon: markerIcon
			} );

		var JTWC_data = {
			content: JTWC_pin_content,
			position: JTWC_coords,
			maxHeight: 222
		}

		var JTWC_bubble_opts = $.extend( IB_defaults, JTWC_data );
			JTWC_bubble.setOptions( JTWC_bubble_opts );

		var IB_defaults = {
			map: map,
			shadowstyle: 2,
			padding: 0,
			backgroundColor: 'rgb(255,255,255)',
			borderRadius: 0,
			maxWidth: 230,
			minWidth: 230,
			minHeight: 230,
			borderWidth: 0,
			hideCloseButton: true,
			animation: null,
			disableAutoPan: true,
			pixelOffset: new google.maps.Size( -230, 0 ),
		};

		var InfoWindow2 = new InfoBubble( IB_defaults );

		var the_html = '<div class="info-box-wrapper">';
			the_html += '<div class="body">';
				the_html += '<div class="logo-container">';
					the_html += '<div class="outer">';
						the_html += '<div class="inner">';
							the_html += '<a href="#" class="map-logo"></a>';
						the_html += '</div>';
					the_html += '</div>';
				the_html += '</div>';
				the_html += '<div class="address-container">';
					the_html += '<h3>Address</h3>';
					the_html += '<div class="address">' + SPRY.infoBoxContent + '</div>';
				the_html += '</div>';
			the_html += '</div>';
		the_html += '</div>';

		InfoWindow2.setContent( the_html );

		google.maps.event.addListener( JTWC_marker, 'click', function() {
			InfoWindow2.open( map, JTWC_marker );
		} );

	}

	make_JTWC_marker();

} );


