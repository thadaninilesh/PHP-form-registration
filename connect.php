<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$host = "localhost";
$username = "root";
$db_name = "tryphp";
$pwd = "";

mysql_connect($host,$username,$pwd) or die(mysql_error());
mysql_select_db($db_name);

?>
