<?php				

define('DB_NAME', 'heroku_b5a664529040beb');
define('DB_USER', 'b67da2a60098e8');
define('DB_PASSWORD', 'd979d631');	
define('DB_HOST', 'us-cdbr-iron-east-05.cleardb.net');



if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
			if ( !defined('BASEURL') )
				define('BASEURL', '/teste-infatec/');
			if ( !defined('DBAPI') )
				define('DBAPI', ABSPATH . 'inc/database.php');
			

define('HEADER', ABSPATH . 'inc/header.php');
define('FOOTER', ABSPATH . 'inc/footer.php');

//mysql://b67da2a60098e8:d979d631@us-cdbr-iron-east-05.cleardb.net/heroku_b5a664529040beb?reconnect=true

//mysql --host=us-cdbr-iron-east-05.cleardb.net --user=b67da2a60098e8 --password=d979d631 --reconnect heroku_b5a664529040beb < teste-infatec-2.sql