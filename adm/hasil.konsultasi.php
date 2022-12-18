<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from keterangan"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from keterangan order by id_keterangan desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from keterangan order by id_keterangan desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hasil Konsultasi Pasien</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    
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
			<div>
            	<div class="modal-header">
                	<h3>List Hasil Konsultasi Pasien</h3>
                </div>
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Konsultasi Ke</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama Pasien</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Waktu Konsultasi</h5></font></td>
                        <td width="25%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Gejala</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Hasil Konsultasi</h5></font></td>
                        <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><span class="icon-wrench"></span></h5></font></td>
                    </thead>
                    <?php 
						while($data=mysql_fetch_array($s)){
							$id_keterangan=$data['id_keterangan'];
							$id_konsultasi=$data['id_konsultasi'];
							$nama=$data['nama'];
							$tgl_konsultasi=$data['tgl_konsultasi'];
							$kode_penyakit=$data['kode_penyakit'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><?php echo "$id_konsultasi";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$nama";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$tgl_konsultasi";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5>
							<?php
								$sh = mysql_query("select * from hasil_konsultasi where konsultasi='$id_konsultasi'");
								
								while($dh = mysql_fetch_array($sh)){
									$sg = mysql_query("select * from gejala where id_gejala='$dh[id_gejala]'");
									$dg = mysql_fetch_array($sg);
									echo "&raquo; $dg[nama_gejala]<br>";
								}
							?>
                            </h5></font>
						</td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
							<?php
								$sp=mysql_query("select * from penyakit where kode_penyakit='$kode_penyakit'");
								$dp=mysql_fetch_array($sp);
								echo "$dp[nama_penyakit]";
							?>
                            </h5></font>
						</td>
                        <td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="tip" href="hasil.konsultasi.delete.php?id=<?php echo $id_konsultasi;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Hapus"><span class="icon-remove"></span></a>
							</h5></font>
						</td>
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                    </div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="hasil.konsultasi.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="../js/jquery-1.8.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>