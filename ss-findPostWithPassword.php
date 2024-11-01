<?php
/*
Contributors: Spotlight Studios
Plugin Name: SS Find Post with Password
Plugin URI: http://spotlightstudios.co.uk/plugins/ss-postpassword/
Description: Find a post/page using a password - Usage: <code>[ss_postpassword]</code>
Tags: page, post, password, wordpress, spotlight, studios, gallery, photography
Author URI: http://spotlightstudios.co.uk
Author: Spotlight Studios
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62YBJTBQ7HXLG
Requires at least: 2.3
Tested up to: 3.9.1
Stable tag: 1.0.0
Version: 1.0.0
License: GPLv2
*/

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['errorMsg'] = '';
require_once(ABSPATH.'wp-includes/pluggable.php');

$submit_pw_field_enabled = false;
if (isset($_POST['submit_pw_field'])){
     $submit_pw_field_enabled = $_POST['submit_pw_field'];
}
if ($submit_pw_field_enabled){
	global $wpdb;
	$wp_rewrite = new WP_Rewrite();
	$pw_field_enable = false;
	if (isset($_POST['pw_field'])){
		 $pw_field_enable = $_POST['pw_field'];
	}
	$post_password = trim($pw_field_enable);
	if (!empty($post_password)){
		$post_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_password = %s", $post_password));
		if (!empty($post_id)){
			if (empty($wp_hasher)){
				require_once( ABSPATH . 'wp-includes/class-phpass.php' );
				$wp_hasher = new PasswordHash(8, true);
			}
			// Keep cookie for 10 days
			setcookie('wp-postpass_'.COOKIEHASH, $wp_hasher->HashPassword(stripslashes($post_password)), time() + 864000, COOKIEPATH);
			wp_redirect(get_permalink($post_id));
			exit;
		}
		else {
			$_SESSION['errorMsg'] = '1';
		}
	}
}

function ss_postpassword($atts){

	extract(shortcode_atts(array(
		"error" => 'Nothing there :( Please try again!', // specify the error message
		"submit" => 'Submit', // specify the submit label
		"text" => 'Enter Password', // specify the form label
		"errortext" => 'Enter Password', // define error text
		"uikit" => 'off' // theme with uikit
	), $atts));
	
	if($_SESSION['errorMsg'] == '1'){
		$placeholder = $errortext;
		if($error != ''){
			$errorMsg = $error;
		}
		if($uikit == "on"){
			if($error != ''){
				$alert =	'class="uk-alert uk-alert-danger" data-uk-alert';
			}
			$formclass = 'uk-form-danger';
		}
	}
	else{
		$placeholder = $text;
	}
	
	// Define Un-Set Variables
	if (!isset($formclass)) $formclass  = '';
	if (!isset($alert)) $alert  = '';
	if (!isset($errorMsg)) $errorMsg  = '';
	
	$form = '
	<form action="" method="post">
		<div style="text-align: center;"><input type="password" placeholder="'.$placeholder.'" name="pw_field" value="" class="'.$formclass.'" /> <input type="submit" name="submit_pw_field" value="'.$submit.'" /></div>
		<div style="text-align: center;" '.$alert.'>'.$errorMsg.'</div>
	</form>
	';
	
	return $form;
}

add_shortcode('ss_postpassword', 'ss_postpassword');
?>