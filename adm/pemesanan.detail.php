<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from pemesanan"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from pemesanan

 order by id_pemesanan desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from pemesanan
 order by id_pemesanan desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Managemen Pemesanan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    
	<style>
		body{
			background-image: url(../img/body.jpg);
			background-repeat: repeat;
			background-attachment: fixed;
		}
	</style>
</head>

<body>

<?php
	include_once('menu.php');
$edit=mysql_query("SELECT * FROM pemesanan where id_pemesanan='$_GET[kode]'");
    $r=mysql_fetch_array($edit);
	$edit1=mysql_query("SELECT * FROM user where id_user='$r[id_user]' ");
    $r1=mysql_fetch_array($edit1);

	?>
<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div>
            	<div class="modal-header">
                	<h3>List Detail Pemesanan</h3>
                </div>
            	
                <div style="margin-top:10px">
				<?php
				$qb=mysql_query("select * from bayar where id_pemesanan='$_GET[kode]'");
  
  if(mysql_num_rows($qb)>0){
  $b=mysql_fetch_array($qb);
  $konfirmasi="$b[konfirmasi] dikonfirmasi";
  $bayar="Sudah Bayar";
  if($b[konfirmasi]=="Belum"){
  $konfirmasi2="<a href='pemesanan.konfirmasi.php?id=$_GET[kode]' class='btn btn-info'>Konfirmasi</a>";
  }else{
  $konfirmasi2="<a href='pemesanan.btlkonfirmasi.php?id=$_GET[kode]' class='btn btn-danger'>Batal Konfirmasi</a>";
  }
  }else{
  $konfirmasi="Belum Dikonfirmasi";
  $bayar="Belum Bayar";
  }
				echo "<h5>Data Pemesan </h5>
	<hr>
          <form method=POST action=proses2.php>
          <input type=hidden name=id value='$r[id_berita]'>
          <table class='table table-bordered table-striped'>
          
<tr><td> ID Pemesanan</td><td>: $r[id_pemesanan]</td><td colspan=2><font color=red>$bayar / $konfirmasi</font></td></tr> 
<tr><td>  Nama </td><td>: $r[nama]</td><td>  Tanggal Acara </td><td>: $r[tgl_acara]</td></tr>
<tr><td>  No.Hp </td><td>: $r[nohp]</td><td>  Tanggal Pesan </td><td>: $r[tanggal]</td></tr>
";
?>

          </table>
<?php
$qbayar=(mysql_query("select * from bayar where id_pemesanan='$_GET[kode]'"));
$bayar=mysql_fetch_array($qbayar);
if(mysql_num_rows($qbayar)>0){
				echo "<h5>Data Bukti Bayar </h5>
	<hr>
          <form method=POST action=proses2.php>
          <input type=hidden name=id value='$r[id_berita]'>
          <table class='table table-bordered table-striped'>
          
<tr><td> ID Bayar</td><td>: $bayar[idbayar]</td><td colspan=2>$konfirmasi2</td></tr> 
<tr><td>  Tanggal Bayar </td><td>: $bayar[tglbayar]</td><td>  Tanggal Transer </td><td>: $bayar[tgl_transfer]</td></tr>
<tr><td>  Jenis </td><td>: $bayar[jenis]</td><td>  DP </td><td>: $bayar[dp]</td></tr>
<tr><td>  No.Rekening </td><td>: $bayar[norek]</td><td>  Atas Nama</td><td>: $bayar[atas_nama]</td></tr>
<tr><td>  Bukti </td><td>: <img src='../bukti_pemesanan/$bayar[bukti]' height='150' width='150' /></td><td colspan=2> <a href='../bukti_pemesanan/$bayar[bukti]'>Detail Bukti</a></td></tr>
";
?>

          </table>
		  

		  </form>
<?php
}else{echo"Belum Melakukan Pembayaran";}
?>
                    	<table width='478' border='1' cellspacing=0 align=center class='table table-bordered table-striped'>
<h4 align=center>Barang/Jasa yang dibeli</h4>

				<tr>
    <th>No</th><th>Nama Barang Sewa Pakai</th><th>Harga</td><th>Banyaknya</th><th>Ket</th><th>Jumlah</th>
  </tr>
  <?php
  $q=mysql_query("select b.*,i.* from berita b,item_dipesan i where i.id_pemesanan='$_GET[kode]' and i.id_berita=b.id_berita order by b.judul");
$no=1; 
 while($d=mysql_fetch_array($q)){
  //$d[harga] 
  echo"
  <tr>
	<td>$no</td><td>$d[judul]</td>"; ?> <td><?php echo "Rp.".number_format($d['harga']).",-"?></td><?php echo"<td  width='10%'>$d[jml]</td><td>$d[satuan]</td>
		";
		?><td><?php echo "Rp.".number_format($d['sub_tot']).",-"?></td><?php
  echo"</tr>";
  $no++;
  }
  ?>
  
<tr>
<td colspan=5>TOTAL </td><td><?php echo "Rp.".number_format($r['harga']).",-"?></td>
</tr>

</table>
</div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="pemesanan.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>