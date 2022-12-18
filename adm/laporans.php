<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from berita"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from berita order by id_berita desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from berita order by id_berita desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Laporan Paket Data Barang Sewa Pakai</title>
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
			<div>
            	<div class="modal-header">
                	<h3>Laporan Stok </h3>
                </div>
    
	<br>
			<a href="cetaks.php" target="_blank" class="btn btn-info">Cetak</a>
			<br />
			<br />
			<table class="table table-hover">
				<tr>
				  <th>No</th><th>ID Barang Sewa Pakai</th><th>Nama Barang Sewa Pakai</th><th>Harga</td><th>Satuan</th><th>Stok</th>
				</tr>
				<?php 
					$qrysel = mysql_query("SELECT * FROM berita order by judul");
					$no=1;
					echo mysql_error();
					while($rberita = mysql_fetch_array($qrysel)){
						echo("
							<tr>
								<td>$no</td>
								<td>$rberita[id_berita]</td>
								<td>$rberita[judul]</td>
								<td>Rp.".number_format($rberita['harga']).",-</td>
								
								<td>$rberita[satuan]</td>
								<td>$rberita[stok]</td>
								
							</tr>
						");
						$no++;
					}
				?>
			</table>
		<div class="modal fade" id="input" tab-index="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
					</div>
					<div class="modal-body">
						<form action="" method="post" role="form" enctype="multipart/form-data">
							<div class="form-group">
								<label class="control-label" for="judulberita">Paket Wedding Organizer:</label>
								<input type="text" id="judulberita" placeholder="Tipe" name="judulberita"  />
							</div>
							<div class="form-group">
								<label class="control-label" for="isi">Harga Paket:</label>
								<input type="text" id="isi" placeholder="Harga Rumah" name="isiberita"  />
							</div>
							<div class="form-group">
								<label class="control-label" for="gambar">Gambar:</label>
								<input type="file" id="gambar" placeholder="File Gambar" name="gambar" />
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary" name="input-berita">TAMBAH</button>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="edit" tab-index="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<script type="text/javascript">
					$(document).on("click", ".edit", function () {
				    	var id = $(this).data('id');
				    	var judul = $(this).data('judul');
				    	var isi = $(this).data('isi');
				    	var gambar = $(this).data('gambar');
				    	$("#editberita #idberita").val(id);
				    	$("#editberita #judulberita").val(judul);
				    	$("#editberita #isi").val(isi);
				    	$("#editberita #gambarlama").val(gambar);
				    	$("#editberita #prev").attr("src","../images/berita/"+gambar);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Edit Berita</h4>
					</div>
					<div class="modal-body" id="editberita">
						<form action="" method="post" role="form" enctype="multipart/form-data">
						<input type="hidden" name="idberita" id="idberita" value=""/>
						<input type="hidden" name="gambarlama" id="gambarlama" value=""/>
							<div class="form-group">
								<label class="control-label" for="judulberita">Paket Wedding Organizer:</label>
								<input type="text" id="judulberita" placeholder="Paket" name="judulberita" class="form-control input-small" />
							</div>
							<div class="form-group">
								<label class="control-label" for="isi">Harga</label>
								<input type="text" id="isi" placeholder="Harga Rumah" name="isiberita" class="form-control input-small" />
								
							</div>
							<div class="form-group">
								<img alt="gambar" src="" width="120px" height="120px" id="prev"/><br />
								<label class="control-label" for="gambar">Gambar:</label>
								<input type="file" id="gambar" placeholder="File Gambar" name="gambar" class="form-control input-small" />
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary" name="edit-berita">EDIT</button>
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="featured" tab-index="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<script type="text/javascript">
					$(document).on("click", ".featured", function () {
				    	var id = $(this).data('id');
				    	$("#featured #idberita").html(id);
				    	$(".modal-footer #lanjut").attr("href", "?mod=manageberita&featured="+id);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Featured Berita</h4>
					</div>
					<div class="modal-body" id="featuredberita">
						<p>Anda Yakin Akan Menampilkan/Menyembunyikan Data Dengan ID: <strong id="idberita"></strong> Pada Halaman Depan</p>
					</div>
					<div class="modal-footer">
						<a type="button" class="btn btn-default" data-dismiss="modal">BATAL</a>
						<a type="button" class="btn btn-primary" id="lanjut" href="">LANJUT</a>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="delete" tab-index="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<script type="text/javascript">
					$(document).on("click", ".delete", function () {
				    	var id = $(this).data('id');
				    	$("#deleteberita #idberita").html(id);
				    	$(".modal-footer #lanjut").attr("href", "?mod=manageberita&delete="+id);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Delete Berita</h4>
					</div>
					<div class="modal-body" id="deleteberita">
						<p>Anda Yakin Akan Menghapus Data Dengan ID: <strong id="idberita"></strong></p>
					</div>
					<div class="modal-footer">
						<a type="button" class="btn btn-default" data-dismiss="modal">BATAL</a>
						<a type="button" class="btn btn-primary" id="lanjut" href="">LANJUT</a>
					</div>
				</div>
			</div>
		</div>
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