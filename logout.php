<?php

session_start();

if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
	unset($_SESSION['namalengkap']);
    unset($_SESSION['jabatan']);
    unset($_SESSION['namasekolah']);
    session_destroy();
    header('location:index.php');
} 