<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= mysql_query("delete from lapangan where idlap='$inf'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='berita.php';
			</script>";
?>