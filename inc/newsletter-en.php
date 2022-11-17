<?php
function newsletter_en( $string, $option, $fallback ) {

	switch ( $option ) {
		case 'confirmation':
			$string = 'Please confirm your subscription!';
			break;
		case 'success':
			$string = 'Thanks for your interest!';
			break;
		case 'error':
			$string = 'Following fields are missing or incorrect';
			break;
		case 'unsubscribe':
			$string = 'You have successfully unsubscribed!';
			break;
		case 'unsubscribeerror':
			$string = 'An error occurred! Please try again later!';
			break;
		case 'profile_update':
			$string = 'Profile updated!';
			break;
		case 'already_registered':
			$string = 'You are already registered';
			break;
		case 'new_confirmation_sent':
			$string = 'A new confirmation message has been sent';
			break;
		case 'profile':
			$string = 'update profile';
			break;
		case 'enter_email':
			$string = 'Please enter your email address';
			break;
		case 'profilebutton':
			$string = 'Update Profile';
			break;
		case 'email':
			$string = 'email';
			break;
	}

	return $string;
}
add_filter( 'mailster_text', 'newsletter_en', 10, 3 );