<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("update bayar set konfirmasi='Belum' where idsewa='$kode'");
	
	echo "<script language=javascript>
			window.alert('Konfirmasi Berhasil Dibatalkan');
			window.location='pemesanan.php?hal=1';
			</script>";
?>