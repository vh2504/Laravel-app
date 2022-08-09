<?php

/*	Constant
--------------------------------------------------------------*/

define('LOCATION', 'http://'.$_SERVER['SERVER_NAME'].str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)."/.."))).'/', true);


/* SSL */
$ssl = str_replace('http', 'https', LOCATION);
if(empty($_SERVER['HTTPS'])) define('LOCATION_FILE', LOCATION, true);
else define('LOCATION_FILE', $ssl, true);

if(!$phone) {
	//pcSite
	define('LOCATION_XXX', '', true);
}else {
	//spSite
	define('LOCATION_XXX', '', true);
}


/* Other */
define('LOCATION_TEL','tel:00000000000',true);

?>
