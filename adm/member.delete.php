<?php
	session_start();
	include_once('admin.session.php');
	$kode	= $_GET['kode'];
	$sql	= mysql_query("delete from user where id_user='$kode'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='member.php?hal=1';
			</script>";
?>