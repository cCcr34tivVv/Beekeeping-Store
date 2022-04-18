<?php
    //start session
    session_start();

    $db = '(DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = bd-dc.cs.tuiasi.ro)(PORT = 1539))
            (CONNECT_DATA =
              (SERVER = DEDICATED)
              (SERVICE_NAME = orcl)
            )
          )' ;
    
    define('DB_USERNAME','bd149');
    define('DB_PASSWORD','---');
    define('SITEURL','http://localhost/PHP_Project/');

    $conn = oci_connect(DB_USERNAME,DB_PASSWORD,$db) or die(oci_error());

?>