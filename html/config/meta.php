<?php

/*--	Settings
--------------------------------------------------*/


define('TITLE', 'Benepay Site', true);
define('KEYWORDS', 'key,key,key,key,key,key,key,key,key', true);
define('DESCRIPTION', '', true);


//
$meta = array(
	'title' => TITLE,
	'keywords' => KEYWORDS,
	'description' => DESCRIPTION
);


/*--	Main page
--------------------------------------------------*/


if($page == 'homepage') {
	$meta['title'] = TITLE;
	$meta['keywords'] = KEYWORDS;
	$meta['description'] = DESCRIPTION;
}


?>
