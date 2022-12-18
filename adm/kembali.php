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

				<?php
				
				//session_start();
//include "lib/koneksi.php";
$edit=mysql_query("SELECT * FROM pemesanan where id_pemesanan='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	//$edit1=mysql_query("SELECT * FROM user where id_user='$_SESSION[iduser]' ");
    //$r1=mysql_fetch_array($edit1);
	?>
<h3>Form Pengembalian </h3><hr/>
	
	<table width='478' border='1' cellspacing=0 align=center class='table table-bordered table-striped'>
<h4 align=center>Barang/Jasa yang dibeli</h4>

				<tr>
    <th>No</th><th>Nama Barang Sewa Pakai</th><th>Harga</td><th>Banyaknya</th><th>Ket</th><th>Jumlah</th>
  </tr>
  <?php
  $q=mysql_query("select b.*,i.* from berita b,item_dipesan i where i.id_pemesanan='$_GET[id]' and i.id_berita=b.id_berita order by b.judul");
$no=1; 
 while($d=mysql_fetch_array($q)){
  echo"
  <tr>
	<td>$no</td><td>$d[judul]</td>";?><td><?php echo "Rp. ".number_format($d[harga]).",-"?></td><?php echo"<td  width='10%'>$d[jml]</td><td>$d[satuan]</td>";?><td><?php echo "Rp. ".number_format($d[sub_tot]).",-"?></td><?php echo"
  </tr>";
  $no++;
  }
  ?>
  
<tr>
<td colspan=5>TOTAL</td><td><?php echo "Rp. ".number_format($r[harga]).",-"?></td>
</tr>

</table>
	<?php
	
echo "
          <form method=POST action=proses3.php enctype='multipart/form-data'>
          <input type=hidden name=id value='$_GET[id]'>
          <table class='table table-bordered table-striped'>";?>

		   <tr><td colspan=2><input type=submit value="Kembalikan Pemesanan" class='btn btn-primary'>
                      </table>
		  				


		  </form>

				
		</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
</html>