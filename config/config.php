<?php

    $db_user     = 'bloguser';
    $db_password = '021204';
    $db_name     = 'php_teste';

    $db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name.';charset=utf8',$db_user, $db_password);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    define('APP_NAME', 'PHP REST API TUTORIAL');
?> 