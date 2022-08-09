<?php

/*	function
--------------------------------------------------------------*/

function definitionLink($arr,$sslPage) {
	foreach($arr as $val){
		$dir = str_replace('_','/',$val);
		$index = (!strstr($dir,'//')) ? true : false;
		$s = ($index) ? '/' : '';
		if(!$index) $dir = str_replace('//','/',$dir).'.php';

		if($sslPage)
			define('LOCATION_'.$val, str_replace('http', 'https', LOCATION).$dir.$s, true);
		else
			define('LOCATION_'.$val, LOCATION.$dir.$s, true);
	}
}

function openYear($open) {
	$update = date('Y',filemtime(dirname(__FILE__).'/../index.php'));
	echo ($open == $update) ? $open : $open.'-'.$update;
}


/*	userAgent
--------------------------------------------------------------*/

//Decision
$ua = $_SERVER['HTTP_USER_AGENT'];
$phone = strstr($ua, 'iPhone') || strstr($ua, 'Android') && strstr($ua, 'Mobile') || strstr($ua, 'Windows Phone') || strstr($ua, 'BlackBerry') ? true : false;
$touch = strstr($ua, 'iPhone') || strstr($ua, 'iPad') || strstr($ua, 'iPod') || strstr($ua, 'Android') || strstr($ua, 'Windows Phone') || strstr($ua, 'BlackBerry') ? true : false;
$mouse = (!$touch) ? true : false;
$chrome = strstr($ua, 'Chrome') ? true : false;
$firefox = strstr($ua, 'Firefox') ? true : false;
$safari = $mouse && !$chrome && strstr($ua, 'Safari') && strstr($ua, 'AppleWebKit') ? true : false;
$iphone = $phone && strstr($ua, 'iPhone') ? true : false;
$ipad = $touch && strstr($ua, 'iPad') ? true : false;
$android = $touch && strstr($ua, 'Android') ? true : false;
$ie = strstr($ua, 'MSIE') || strstr($ua, 'rv:11.0) like Gecko') ? true : false;
$ie9 = strstr($ua, 'MSIE 9.0') ? true : false;
$ie8 = strstr($ua, 'MSIE 8.0') ? true : false;
$homepage = ($page == 'homepage') ? true : false;

//htmlClass
$htmlClass = ($mouse) ? 'mouse' : 'touch';
if($phone) $htmlClass = $htmlClass.' phone';
if(!$homepage) $htmlClass = $htmlClass.' lower';
if(!$ie9 && !$ie8) $htmlClass = $htmlClass.' modern';
if($chrome) $htmlClass = $htmlClass.' chrome';
if($firefox) $htmlClass = $htmlClass.' firefox';
if($safari) $htmlClass = $htmlClass.' safari';
if($iphone) $htmlClass = $htmlClass.' iphone';
if($ipad) $htmlClass = $htmlClass.' ipad';
if($android) $htmlClass = $htmlClass.' android';
if($ie) $htmlClass = $htmlClass.' ie';
if($ie9) $htmlClass = $htmlClass.' ie9';
if($ie8) $htmlClass = $htmlClass.' ie8';


?>
