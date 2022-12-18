<?php
	session_start();
	include_once('admin.session.php');
/**
	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from gejala"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from gejala order by id_gejala desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from gejala order by id_gejala desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
**/
$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan and b.konfirmasi='Sudah'"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan and b.konfirmasi='Sudah'
 order by p.id_pemesanan desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan and b.konfirmasi='Sudah'
 order by p.id_pemesanan desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan</title>
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
?>

<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<?php
	//include_once('laporanrekapitulasi.php');
?>
<div align="center"><span class="style1"><h2>Laporan Pendapatan Perpelanggan</h2></span>
</div>
<table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>ID Pemesanan</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>ID User</h5></font></td>
						<td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama Pemesan</h5></font></td>
						
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No Hp</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal Acara</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal Pemesanan</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Jumlah Bayar</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Action</h5></font></td>
			
                       
                    </thead>
                    <?php 
					//include_once("../lib/koneksi.php");
						while($data=mysql_fetch_array($s)){
						$qb=mysql_query("select * from bayar where id_pemesanan='$data[id_pemesanan]'");
  
  if(mysql_num_rows($qb)>0){
  $b=mysql_fetch_array($qb);
  $konfirmasi="$b[konfirmasi] dikonfirmasi";
  $bayar="Sudah Bayar";
  }else{
  $konfirmasi="Belum Dikonfirmasi";
  $bayar="Belum Bayar";
  }
							$nama=$data['nama'];
							$email=$data['id_user'];
							$kode=$data['id_pemesanan'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[id_pemesanan]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$email";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$nama";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[nohp]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[tgl_acara]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[tanggal]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "Rp.".number_format($data['harga']).",-"?></h5></font></td>
						<td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                               
                                <a ace="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="btn btn-small btn-info" href="cetakp.php?kode=<?php echo $kode;?>" target="_blank" data-toggle="tooltip" data-placement="bottom"
                                    title="Cetak">Cetak</a>
							</h5></font>
						</td>
                    </tbody>
                    <?php
					$i++; 
					$tot=$tot+$data[harga];
					} ?>
					<tfoot>
						<th colspan=8>TOTAL PENDAPATAN</th><th><?php echo "Rp.".number_format($tot).",-"?></th>
					</tfoot>
                    </table>
                    
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>