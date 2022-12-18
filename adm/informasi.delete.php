<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= mysql_query("delete from informasi where id_informasi='$inf'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='informasi.php?hal=1';
			</script>";
?>