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
if($_POST[bln]!="" and $_POST[thn]!=""){
$bln="and month(tanggal)='$_POST[bln]'";
$thn="and year(tanggal)='$_POST[thn]'";
}

$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan $bln $thn and b.konfirmasi='Sudah'"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan $bln $thn and b.konfirmasi='Sudah'
 order by p.id_pemesanan desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan $bln $thn and b.konfirmasi='Sudah'
 order by p.id_pemesanan desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Perbulan</title>
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
<div align="center"><span class="style1"><h2>Laporan Pendapatan Perbulan</h2></span>
</div>
<form method='post' action=''>
Bulan : <select name='bln'>
<option value=''>Pilih Bulan</option>
<?php
$nmbulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		
for($x=1;$x<=12;$x++){
echo"<option value='$x'>$nmbulan[$x]</option>";
}
?>
</select>
Tahun : <input name='thn' type='text'> <input type='submit' value='Cari' class='btn btn-warning'>
</form>
<?php

if($_POST[bln]!="" and $_POST[thn]!=""){
echo"Bulan : $_POST[bln] Tahun : $_POST[thn]";
}
?>
 <a href='cetakb.php?bln=<?php echo $_POST[bln]; ?>&thn=<?php echo $_POST[thn]; ?>' target="_blank" class="btn btn-info">Cetak</a><p></p>
<table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal Pemesanan</h5></font></td>
						<td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama Pemesan</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Email</h5></font></td>
						
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Alamat</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No Hp</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Jumlah Bayar</h5></font></td>
			
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
							$data2=mysql_fetch_array(mysql_query("select * from user where id_user='$email'"));
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo $i ?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[tanggal]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$nama";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data2[email]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data2[alamat]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[nohp]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "Rp.".number_format($data['harga']).",-"?></h5></font></td>
						
                    </tbody>
                    <?php
					$i++; 
					$tot=$tot+$data[harga];
					} ?>
					<tfoot>
						<th colspan=6>TOTAL Rp.</th><th><?php echo "Rp.".number_format($tot).",-"?></th>
					</tfoot>
                    </table>
                               
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>