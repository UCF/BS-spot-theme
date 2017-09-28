<?php

show_admin_bar(false);
date_default_timezone_set( 'America/New_York' );

error_reporting( 0 );

if(!defined('THEME_URL'))
	define('THEME_URL', get_bloginfo('template_directory'));

//	fix db after server move
//require_once( TEMPLATEPATH.'/library/includes/mysql-replace.php' );
//MySQL_Replace::replace('old', 'new');

//	dependencies
require_once( TEMPLATEPATH.'/library/includes/wp-header-remove.php' );
require_once( TEMPLATEPATH . '/library/includes/theme-settings.php' );

//	menus
register_nav_menus(array(
	'main-nav' => 'Main Navigation'
));

//	post thumbnails
add_theme_support( 'post-thumbnails' );

#	Scripts
########################################################
add_action( 'wp_enqueue_scripts', 'spry_enqueue_scripts' );

function spry_enqueue_scripts() {
	
	if ( is_admin() ) {
		return false;
	}
	
	//register
	wp_register_script( 'lib', THEME_URL.'/library/js/lib.js', array( 'jquery' ), '' );

	//enqueue
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'lib' );

	if ( get_the_id() ) {
		$template = get_post_meta( get_the_id(), '_wp_page_template', TRUE );

		if ( $template == 'template-contact.php' || $template == 'template-passports.php' ) {
			wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB6IftJIbhuHExsKKkPqARDNmkp3kZKhS4', array( 'jquery' ), TRUE );
			wp_enqueue_script( 'infobubble', THEME_URL.'/library/js/infobubble.js', array( 'jquery' ), TRUE );
			wp_enqueue_script( 'ucf-map', THEME_URL.'/library/js/ucf-map.js', array( 'jquery' ), TRUE );
		}
	}

	//localize
	wp_localize_script('lib', 'SPRY', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'siteurl' => get_option('siteurl'),
		'themeUrl' => THEME_URL,
		'infoBoxContent' => get_field( 'info_box_content', 17 )
	) );
}

#	General Functions
########################################################

/* Google Analytics Settings Code */
$google_analytics_setting = new google_analytics_setting();
class google_analytics_setting {

    function google_analytics_setting() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }

    function register_fields() {
        register_setting( 'general', 'google_analytics_code', '' );
        add_settings_field( 'fav_color', '<label for="google_analytics_code">' . __( 'Google Analytics Code' , 'google_analytics_code' ).'</label>' , array( &$this, 'fields_html' ) , 'general' );
    }

    function fields_html() {
        $value = get_option( 'google_analytics_code', '' );
        echo '<textarea rows="7" id="google_analytics_code" name="google_analytics_code" style="width: 100%;">' . $value . '</textarea>';
    }

}

/* Print Within WP Head */
add_action( 'wp_head', 'google_head' );
function google_head() {
	/* Google Analytics */ 
	if ( get_option( 'google_analytics_code' ) != FALSE ) { 
		echo get_option( 'google_analytics_code', '' );
	}
}

/**
 *	Custom Excerpt Length
 *
 *	@param (int) Word Limit
 */
function spry_custom_excerpt( $limit ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

add_action('wp_ajax_newsletterSignUp', '_newsletterSignUp');
add_action('wp_ajax_nopriv_newsletterSignUp', '_newsletterSignUp');
function _newsletterSignUp() {

	//Set Up & Filter Variables
	$fields = array(			
		'name' 		      =>		filter_var($_POST['name'], FILTER_SANITIZE_STRING),
		'email'		 	  =>		filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)
	);

	//Establish Error Array
	$errors = array();

	//Check For Empty & Incorrect Fields
	if (empty($fields['name'])) {
		$errors[] = 'name';
	}

	if (empty($fields['email'])) {
		$errors[] = 'email';
	}

	//Check If Error Array Is Empty
	if (!empty($errors)) {
		
		//Die With Errors
		die(json_encode(array(
			'code' => 0,
			'message' => 'The highlighted fields are required',
			'fields' => $errors
		)));

	} else {
		//Set Up E-Mail Headers
		$headers = "From: no-reply@ucf.edu\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
		//Begin Email Body
		$body = $fields['name'] . " Has sent a signed up for the newsletter!<br /><br />";

		//For Each Field add to E-Mail Body
		foreach($fields as $k => $v){
			//Add Each Field To E-Mail Body
			$body .= ucwords(str_replace('_', ' ', $k) ) . ': ' . stripslashes($v) . '<br /><br />';
		}

		//Prepare Email Addresses
		$emails = array();
		$to_emails = '';
		$counter = 1;

		//For each E-Mail In Array, Append To String
		foreach ( $emails as $email_address ) {

			//Check If First Email
			if ( $counter == 1 ) {
				$to_emails .= $email_address;
			} else {
				$to_emails .= ', ' . $email_address;
			}

		}

		//Send E-Mail!!
		mail( $to_emails, 'Newsletter Sign Up!', $body, $headers );

		//Success!
		die(json_encode(array(
			'code' => 1,
			'message' => 'Thank you for your message.'
		)));

	}

}