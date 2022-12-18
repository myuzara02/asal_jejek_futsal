<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from  bukti_k where id_k='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='konfirmasi.php?hal=1';
			</script>";
?>