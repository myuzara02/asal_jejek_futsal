<?php
error_reporting(0);
include_once("config/koneksi.php");
$email = mysql_escape_string($_POST['email']);
$password = md5($_POST['password']);
$qry = mysql_query("SELECT * FROM user WHERE email='$email' AND password='$password'");
$numlogin = mysql_num_rows($qry);
if($numlogin==1){
	$ruser = mysql_fetch_array($qry);
	session_start();
	$_SESSION['iduser']=$ruser['id_user'];
	$_SESSION['nama']=$ruser['nama_lengkap'];
	
		 echo"<script>alert('Selamat Datang, $ruser[nama_lengkap]');window.location.href='index.php'</script>";
	
}else{
	echo("<script>
			alert('Login Gagal');
			window.location='index.php';		
		</script>");
}
?>