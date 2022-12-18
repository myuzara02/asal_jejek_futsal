<?php
session_start();
include_once('admin.session.php');

$i = 1;
$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
$jml_data = mysql_num_rows(mysql_query("select * from sewa"));
$jml_halaman = ceil($jml_data / $jml_per_halaman);

if (isset($_GET['hal'])) {

	$hal = $_GET['hal'];
	$i = ($hal - 1) * $jml_per_halaman  + 1;
	$s = mysql_query("select * from sewa

 order by idsewa desc limit " . (($hal - 1) * $jml_per_halaman) . ", $jml_per_halaman");
} else {
	$s = mysql_query("select * from sewa
 order by idsewa desc limit 0, $jml_per_halaman")
		or die(mysql_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Managemen sewa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="../img/favicon.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<style>
		body {
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
					<h3>List sewa</h3>
				</div>

				<div style="margin-top:10px">
					<table class="table table-condensed table-bordered table-hover">
						<thead>
							<td width="5%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>No</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>ID Pesan</h5>
								</font>
							</td>
							<td width="20%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>ID/Nama Pemesan</h5>
								</font>
							</td>


							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Tanggal Pesan</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Tanggal Main</h5>
								</font>
							</td>

							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Lama Main</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Jam Main</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Jam Selesai</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Total Harga</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Bukti</h5>
								</font>
							</td>
							<td width="10%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5>Konfirmasi</h5>
								</font>
							</td>


							<td width="5%">
								<font face="Comic Sans MS, cursive" class="text-error text-center">
									<h5><span class="icon-wrench"></span></h5>
								</font>
							</td>
						</thead>
						<?php
						while ($data = mysql_fetch_array($s)) {
							$qb = mysql_query("select * from bayar where idsewa='$data[idsewa]'");

							if (mysql_num_rows($qb) > 0) {
								$b = mysql_fetch_array($qb);

								$konfirmasi = "$b[konfirmasi] dikonfirmasi";
								$bayar = "Sudah Bayar";
								if ($b['konfirmasi'] == "Sudah") {
									$bkonf = "Batal Konfirmasi";
									$lkonf = "btlkonfirmasi";
								} else {
									$bkonf = "Konfirmasi";
									$lkonf = "konfirmasi";
								}
							} else {
								$konfirmasi = "Belum Dikonfirmasi";
								$bayar = "Belum Bayar";
							}

							$u = mysql_fetch_array(mysql_query("select * from user where id_user='$data[iduser]'"));
							$nama = $u['nama_lengkap'];
							$email = $data['iduser'];
							$kode = $data['idsewa'];

							$tg = substr("$data[jmulai]", 0, 10);
							$jmul = substr("$data[jmulai]", 11, 5);
							$jhab = substr("$data[jhabis]", 11, 5);
							$jhabis = $jmul + $data[lama];

						?>
							<tbody>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo $i ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$email"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-error text-left">
										<h5><?php echo "$nama"; ?></h5>
									</font>
								</td>

								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$data[tgl_pesan]"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$tg"; ?></h5>
									</font>
								</td>

								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5 align="center"><?php echo "$jmul"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$data[lama] jam"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$jhabis : 00"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$data[tot]"; ?></h5>
									</font>
								</td>
								<?php
								if ($b['bukti'] != "") {
									$bukti = "<img src='../bukti/$b[bukti]' style='width:100px;height:100px;' />";
								} else {
									$bukti = "Belum ada";
								}
								?>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$bukti"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-left">
										<h5><?php echo "$bayar / $konfirmasi"; ?></h5>
									</font>
								</td>
								<td>
									<font face="Comic Sans MS, cursive" class="text-info text-center">
										<h5>

											<a ace="Comic Sans MS, cursive" class="text-info text-center">
												<h5>
													<a class="btn btn-small btn-info" href="pemesanan.<?php echo $lkonf; ?>.php?kode=<?php echo $kode; ?>" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi"><?php echo "$bkonf"; ?></a>
													<p></p> <a class="btn btn-small btn-warning" href="pemesanan.delete.php?kode=<?php echo $kode; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus">Hapus</a>
												</h5>
									</font>
								</td>
							</tbody>
						<?php $i++;
						} ?>
					</table>
				</div>

				<div class="pagination pagination-centered">
					<ul>
						<?php for ($i = 1; $i <= $jml_halaman; $i++) { ?>
							<li><a href="sewa.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
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