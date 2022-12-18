<?php
session_start();
include_once("config/koneksi.php");
$user = mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));

date_default_timezone_set('Asia/Jakarta');
$tgl_skr = date('Y-m-d H:i:s');
$tglmain = "$_POST[tgl] $_POST[jm]";
$lama = "$_POST[lm] hours" + $tglmain;
//tambah jam
$date = date_create($tglmain);
date_add($date, date_interval_create_from_date_string($lama));
$h1 = date_format($date, 'Y-m-d H:i:s');

if ($_POST['jm'] == "20:00:00" or $_POST['jm'] == "21:00:00" or $_POST['jm'] == "22:00:00" or $_POST['jm'] == "23:00:00") {
	$jenis = "Malam";
	$harga = "$_POST[h2]";

	//$jam2=;
	$tot = $harga * $_POST['lm'];
} else {
	$jenis = "Siang";
	$harga = "$_POST[h1]";

	$tot = $harga * $_POST['lm'];
}

$simpan = mysql_query("insert into sewa values('','$_SESSION[iduser]','$_POST[idlap]',now(),'$_POST[lm]','$tglmain','$h1','$jenis','$harga','$tot')");
if ($simpan) {

	//echo"pemesanan sukses";
	echo "<script type='text/javascript'>
      alert('Pemesanan Berhasil...!!!');
      </script>";
	echo "<meta http-equiv='refresh' content='0; index.php?view=bayar'>";
} else {
	echo "<meta http-equiv='refresh' content='0; index.php?view=pesan'>";
}
