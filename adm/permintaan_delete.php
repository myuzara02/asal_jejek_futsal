<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from  permintaan where id_permintaan='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='permintaan.php?hal=1';
			</script>";
?>