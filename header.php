<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js<?php if ( is_404() ) { ?> error-page<?php } ?>"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<?php //mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	
	<?php //hide iOS browser bar ?>
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/print.css" type="text/css" media="print" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php /* <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/library/images/favicon.png" /> */ ?>
	
	<?php /* TypeKit */ ?>
	<script src="https://use.typekit.net/dft8oie.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<?php /* <script type="text/javascript">
		var _gaq = _gaq || [];
		
		_gaq.push(['_setAccount', 'UA-8316111-1']);
		_gaq.push(['_setDomainName', 'none']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script> */ ?>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrap">
	
	<header id="header">

		<div class="overlay"></div>
		
		<div class="outer">

			<div class="inner">
				
				<div class="header-wrap">
					
					<div class="left-side">

						<a href="<?php echo get_bloginfo( 'siteurl' ); ?>" class="logo"></a>
						
						<div class="links-wrap">

							<div class="outer">

								<div class="inner">
									<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container' => '' ) ); ?>
									<div class="clear"></div>
								</div>

							</div>

						</div>

						<div class="clear"></div>

					</div>

					<div class="right-side">

						<div class="outer">

							<div class="inner">

								<div class="open_menu">
									<span class="hamburger_bun_top header_nav_open_icon">Open</span>
									<span class="hamburger_meat header_nav_open_icon">The</span>
									<span class="hamburger_bun_bottom header_nav_open_icon">Menu</span>
								</div>

								<a href="<?php echo get_permalink( 76 ); ?>" class="btn purple-btn">Get a Quote</a>

							</div>

						</div>

					</div>
	
					<div class="clear"></div>

				</div>
				
			</div>

		</div>

		<div class="mobile-menu">
			<div class="overlay"></div>
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'container' => '' ) ); ?>
			<a href="<?php echo get_permalink( 76 ); ?>" class="btn purple-btn">Get a Quote</a>
		</div>

	</header>
