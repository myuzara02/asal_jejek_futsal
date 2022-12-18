<?php 
	if ($_GET['view']=='home' OR $_GET['view']==''){
		include "view_home.php";
	}elseif($_GET['view']=='halaman'){
		include "view_halaman.php";
	}elseif($_GET['view']=='pendaftaran'){
		include "pendaftaran.php";
	}elseif($_GET['view']=='sukses'){
		include "view_sukses.php";
	}elseif($_GET['view']=='lap'){
		include "lap.php";
	}elseif($_GET['view']=='pesan'){
		include "pesan.php";
	}elseif($_GET['view']=='profil'){
		include "profil.php";
	}elseif($_GET['view']=='bayar'){
		include "bayar.php";
	}
?>