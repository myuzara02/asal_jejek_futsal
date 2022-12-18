<?php
	session_start();
	include_once('admin.session.php');
	$id	= $_GET['id'];
	
	mysql_query("delete from keterangan where id_konsultasi='$id'");
	mysql_query("delete from hasil_konsultasi where konsultasi='$id'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='hasil.konsultasi.php?hal=1';
			</script>";
?>