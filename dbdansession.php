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

function getuser($id) {
    $querygetuser = "SELECT * from user where id = " . $id;
    $resultgu = mysql_query($querygetuser);
    while($rowgu = mysql_fetch_assoc($resultgu)) {
        $arrayuser = array(
            "namalengkapdgngelar" => $rowgu['namalengkapdgngelar'],
            "namapanggilan" => $rowgu['namapanggilan'],
            "jabatan" => $rowgu['jabatan'],
            "nipnik" => $rowgu['nipnik'],              
        );
    }
    return $arrayuser;
}

function getdatasekolah($id, $yangmaudiambil) {
    $querysekolah = "SELECT ".$yangmaudiambil." as ambil FROM sekolah where id = " . $_SESSION['idsekolah'];
    $resultsekolah = mysql_query($querysekolah);
    while($rowsekolah = mysql_fetch_assoc($resultsekolah)) {
        $ambil = $rowsekolah['ambil'];
    }
    return $ambil;
}

function getprogram($id) {
    $queryp = "SELECT nokode, nama FROM programsekolah where id = " . $id;
    $resultp = mysql_query($queryp);
    while($rowp = mysql_fetch_assoc($resultp)) {
        $arrayp = array(
            "nokode" => $rowp['nokode'],
            "nama" => $rowp['nama']
        );
    }
    return $arrayp;
}
?>