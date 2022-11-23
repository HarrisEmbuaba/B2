<?php

require ('koneksi.php');
include ('logout.html');

session_start();
session_destroy();
 
header("Location: home.php");
 
?>
