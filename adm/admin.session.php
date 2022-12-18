<?php
	include_once('../config/koneksi.php');
	
	if(!$_SESSION['username']){
		header("location:/");
	}
?>