<?php
	session_start();
	include_once('admin.session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Pengembalian</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../css/bootstrap.css" />
		<link rel="stylesheet" href="../css/style.css"/>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
    
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
		
		<h2>Pengembalian</h2>		
				<table width='478' border='1' class='table table-bordered table-striped'>
  <tr>
    <th>No</th><th>ID Pemesanan</th><th>Tgl Pesan</th><th>Tgl Acara</th><th>No Telp</th><th>Total Harga</th><th>Kembalikan</th><th>Aksi</th>
  </tr>
  <?php
  $q=mysql_query("select * from pemesanan order by tanggal desc");
$no=1; 
 while($d=mysql_fetch_array($q)){
  $qb=mysql_query("select * from bayar where id_pemesanan='$d[id_pemesanan]'");
  
  if(mysql_num_rows($qb)>0){
  //$b=mysql_fetch_array($qb);
  //$konfirmasi="$b[konfirmasi]";
  //$bayar="<a href='cetak2.php?id=$d[id_pemesanan]' class='btn btn-info'>Kembalikan</a>";
  //}else{
  //$konfirmasi="Belum";
  $bayar="<a href='kembali.php?id=$d[id_pemesanan]' class='btn btn-info'>Kembalikan</a>";
  echo"
  <tr>
	<td>$no</td><td>$d[id_pemesanan]</td><td>$d[tanggal]</td><td  width='10%'>$d[tgl_acara]</td><td>$d[nohp]</td>";?><td><?php echo "Rp. ".number_format($d[harga]).",-"?></td><td><?php echo"$d[kembali]"; ?></td><?php if($d[kembali]=="T"){echo"<td>$bayar";}echo"</td>
  </tr>";
  $no++;
  }
  
  }
  ?>
  

</table>
				
		</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
</html>