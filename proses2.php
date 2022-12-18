<?php 
session_start();
include_once("config/koneksi.php");
$nama_file   = $_FILES['fupload']['name'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
if(! empty($lokasi_file)){
move_uploaded_file($lokasi_file, "bukti/$nama_file");
}
$user=mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d H:i:s');
	
mysql_query("insert into bayar value('','$_POST[id]','$nama_file',now(),'Belum')");


//update stok
/*
$stok=mysql_query("select * from item_dipesan where id_pemesanan='$_POST[id]'");
while($r=mysql_fetch_array($stok)){
$cb=mysql_fetch_array(mysql_query("select * from berita where id_berita='$r[id_berita]'"));
$st=$cb[stok]-$r[jml];
mysql_query("update berita set stok='$st' where id_berita='$r[id_berita]'");
}
*/

//echo"pemesanan sukses";
echo "<script type='text/javascript'>
      alert('Pembayaran Berhasil, Silakan Tunggu Konfirmasi dari admin...!!!');
      </script>";
	  echo "<meta http-equiv='refresh' content='0; index.php?view=bayar'>";

?>