<?php
$nama_file   = $_FILES['fupload']['name'];
$lokasi_file = $_FILES['fupload']['tmp_name'];
	
if(! empty($lokasi_file)){
move_uploaded_file($lokasi_file, "../bukti_pemesanan/$nama_file");

include_once("../lib/koneksi.php");
	 mysql_query("update kopling set file= '$nama_file'
											
											where id_k='$kode'");


echo "<script type='text/javascript'>
      alert('Data Berhasil Disimpan...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; lokasi.php'>";
}
else
{
echo "<script type='text/javascript'>
      alert('Data Gagal Disimpan...!!!');
      </script>";
      echo "<meta http-equiv='refresh' content='0; lokasi.php'>";
}
?>