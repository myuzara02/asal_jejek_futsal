<?php
error_reporting(0);
include_once("config/koneksi.php");
$nama = mysql_escape_string($_POST['namalengkap']);
$password = md5($_POST['password']);
$passwordrep = md5($_POST['passwordrep']);
$email = mysql_escape_string($_POST['email']);
$jk = mysql_escape_string($_POST['jeniskelamin']);
$hp = mysql_escape_string($_POST['handphone']);
if(empty($_POST[namalengkap]) 
or empty($_POST[password]) 
or empty($_POST[email]) 
 
or empty($_POST[jeniskelamin]) 
or empty($_POST[handphone]) 
){
 echo"<script>alert('Silahkan Lengkapi Data Anda Terlebih Dahulu !');window.location.href='./'</script>";
}else{
	$sql = mysql_query("INSERT INTO user(nama_lengkap,email,password,hp,jenis_kelamin,alamat) VALUES('$nama','$email','$password','$hp','$jk','$_POST[alamat]')");	
	if($sql){
		echo("<script>
			alert('Registrasi Berhasil');
			window.location='index.php';		
		</script>");
	}else{
		echo("<script>
			alert('Registrasi Gagal ".mysql_error()."');
			window.location='index.php';
		</script>");
	}
}
?>