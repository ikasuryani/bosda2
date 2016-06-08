<?php
// error_reporting(0);

session_start();
if (!$_SESSION['login']) {
    header('location:../index.php');
}

$link = mysql_connect('localhost', 'root', '');
// $link = mysql_connect('localhost', 'egov03', 'wsrpl');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
else
{
	//echo 'Connected successfully';
	mysql_select_db('bosda') or die("Database select failed");
	// mysql_select_db('egov03') or die("Database select failed");
}
//mysql_close($link);


// nama2 method, intinya pake yang dpannya mysql_
	/*
	mysql_num_rows() - untuk count jumlah yang ke select
    mysql_affected_rows() - Get number of affected rows in previous MySQL operation
    mysql_connect() - Open a connection to a MySQL Server
    mysql_data_seek() - Move internal result pointer
    mysql_select_db() - Select a MySQL database
    mysql_query() - Send a MySQL query
	*/
?>