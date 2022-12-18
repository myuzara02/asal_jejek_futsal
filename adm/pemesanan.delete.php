<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from sewa where idsewa='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='pemesanan.php?hal=1';
			</script>";
?>