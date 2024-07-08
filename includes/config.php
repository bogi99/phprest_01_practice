<?php

// change these according to your system
// create a non root user , never use root for any application
$db_user = '*******';
$db_password = '****_****';
$db_name = 'yourdatabasename';

$db = new PDO("mysql:host=127.0.0.1;dbname=$db_name", $db_user, $db_password);

// set some db attribs

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


define('APP_NAME','PHP REST API EXAMPLE (too simple)');