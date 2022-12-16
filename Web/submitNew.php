<?php

require 'koneksi.php';

if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset']) {

  $email=$_POST['email'];
  $pass=$_POST['password'];
  $select=mysqli_query($conn, "update pemilik set pass='$pass' where email='$email'");

}
?>