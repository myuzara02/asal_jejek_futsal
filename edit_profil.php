<?php
session_start();
error_reporting(0);
//echo"lnlj";
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
	$sql = mysql_query("update user set nama_lengkap='$nama',email='$email',password='$password',hp='$hp',jenis_kelamin='$jk',alamat='$_POST[alamat]' where id_user='$_SESSION[iduser]'");	
	if($sql){
		echo("<script>
			alert('Data Berhasil diubah');
			window.location='index.php';		
		</script>");
	}else{
		echo("<script>
			alert('Gagal ".mysql_error()."');
			window.location='index.php';
		</script>");
	}
}
?>