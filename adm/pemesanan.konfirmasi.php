<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("update bayar set konfirmasi='Sudah' where idsewa='$kode'");
	
	echo "<script language=javascript>
			window.alert('Konfirmasi Berhasil');
			window.location='pemesanan.php?hal=1';
			</script>";
?>