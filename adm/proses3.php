<?php
	session_start();
	include_once('admin.session.php');


$user=mysql_fetch_array(mysql_query("select * from user"));

	date_default_timezone_set('Asia/Jakarta');
	$tgl_skr=date('Y-m-d H:i:s');
	
//mysql_query("insert into bayar value('','$_POST[id]',now(),'$_POST[jenis]','$_POST[dp]','$_POST[norek]','$_POST[at]','Belum','$_POST[tgl]','$nama_file')");

//update stok
$stok=mysql_query("select * from item_dipesan where id_pemesanan='$_POST[id]'");
while($r=mysql_fetch_array($stok)){
$cb=mysql_fetch_array(mysql_query("select * from berita where id_berita='$r[id_berita]'"));
$st=$cb[stok]+$r[jml];
mysql_query("delete from item_dipesan where id_berita='$r[id_berita]'");
mysql_query("update berita set stok='$st' where id_berita='$r[id_berita]'");
$s=mysql_query("update pemesanan set kembali='Y',tgl_kembali=now() where id_pemesanan='$_POST[id]'");
//if($s){echo"sukses";}else{echo"gagal";}
}

//echo"pemesanan sukses";
echo "<script type='text/javascript'>
      alert('Pengembalian Berhasil...!!!');
      </script>";
	  echo "<meta http-equiv='refresh' content='0; Pengembalian.php'>";
