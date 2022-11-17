<?php
function newsletter_fa( $string, $option, $fallback ) {

	switch ( $option ) {
		case 'confirmation':
			$string = 'لطفا اشتراک خود را تایید کنید !';
			break;
		case 'success':
			$string = 'با تشکر از توجه شما!';
			break;
		case 'error':
			$string = 'فیلدهای زیر اشتباه هستند و یا پر نشده اند';
			break;
		case 'unsubscribe':
			$string = 'اشتراک شما با موفقیت لغو شد';
			break;
		case 'unsubscribeerror':
			$string = 'اشتباهی رخ داده است! لطفا دوباره تلاش کنید';
			break;
		case 'profile_update':
			$string = 'پروفایل بروزرسانی شد';
			break;
		case 'already_registered':
			$string = 'ثبت نام شما تقریبا نهایی شده است';
			break;
		case 'new_confirmation_sent':
			$string = 'یک پیام تایید جدید فرستاده شده است.';
			break;
		case 'profile':
			$string = 'بروزرسانی';
			break;
		case 'enter_email':
			$string = 'لطفا آدرس ایمیل خود را وارد نمایید';
			break;
		case 'profilebutton':
			$string = 'بروزرسانی پروفایل';
			break;
		case 'email':
			$string = 'ایمیل';
			break;


	}

	return $string;
}