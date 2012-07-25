<?php

defined("_pEXEC") or die();
setlocale(LC_ALL, "UTF-8");
include('const.php');
$db_login = "vingsite_bereg";
$db_pass = '$Jnqt_blHh;$';
$db_host = "localhost";
$db_name = "vingsite_bereg";
app_mysql::init_connection($db_login, $db_pass, $db_host, $db_name);