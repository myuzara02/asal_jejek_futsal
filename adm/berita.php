<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from lapangan"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from lapangan order by idlap desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from lapangan order by idlap desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Data Lapangan</title>
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
                	<h3>List Data Lapangan </h3>
                </div>
    
	<br>
			<a href="berita.add.php"><input name="tambah" type="submit" id="tambah" value="Tambah Data" class="btn btn-danger"></a>
			<br />
			<br />
			<table width='478' border='1' class='table table-bordered table-striped'>
  <tr>
    <th rowspan=2>No</th><th rowspan=2>Nama Lapangan</th><th rowspan=2>Ket</th><th colspan=2>Harga</th><th colspan=3>Foto</th><th rowspan=2>Aksi</th>
  </tr>
  <tr><th>Siang (<=17:59)</th><th>Malam (>=18:00)</th><th>Foto 1</th><th> Foto 2</th><th>Foto 3</th></tr>
  <?php
  $q=mysql_query("select * from lapangan order by nm");
$no=1; 
 while($d=mysql_fetch_array($q)){
 $idlap=$d['idlap'];
  echo"
  <tr>
	<td>$no</td>
	<td>$d[nm]</td>
	<td>$d[ket]</td>
	<td>$d[harga1]</td>
	<td>$d[harga2]</td>
	<td><img src='../galery/$d[f1]' height='100' width='100'></td>
	<td><img src='../galery/$d[f2]' height='100' width='100'></td>
	<td><img src='../galery/$d[f3]' height='100' width='100'></td>								
	
	<td><a class='btn btn-small btn-info' href='berita.update.php?inf=$idlap' data-toggle='tooltip' data-placement='bottom'
    title='Edit'>Edit</a> <br /><a class='btn btn-small btn-warning' href='berita.delete.php?inf=$idlap' >Hapus</a></td>
";
echo"</tr>";
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
								<label class="control-label" for="judullapangan">Paket Wedding Organizer:</label>
								<input type="text" id="judullapangan" placeholder="Tipe" name="judullapangan"  />
							</div>
							<div class="form-group">
								<label class="control-label" for="isi">Harga Paket:</label>
								<input type="text" id="isi" placeholder="Harga Rumah" name="isilapangan"  />
							</div>
							<div class="form-group">
								<label class="control-label" for="gambar">Gambar:</label>
								<input type="file" id="gambar" placeholder="File Gambar" name="gambar" />
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary" name="input-lapangan">TAMBAH</button>
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
				    	$("#editlapangan #idlapangan").val(id);
				    	$("#editlapangan #judullapangan").val(judul);
				    	$("#editlapangan #isi").val(isi);
				    	$("#editlapangan #gambarlama").val(gambar);
				    	$("#editlapangan #prev").attr("src","../images/lapangan/"+gambar);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Edit lapangan</h4>
					</div>
					<div class="modal-body" id="editlapangan">
						<form action="" method="post" role="form" enctype="multipart/form-data">
						<input type="hidden" name="idlapangan" id="idlapangan" value=""/>
						<input type="hidden" name="gambarlama" id="gambarlama" value=""/>
							<div class="form-group">
								<label class="control-label" for="judullapangan">Paket Wedding Organizer:</label>
								<input type="text" id="judullapangan" placeholder="Paket" name="judullapangan" class="form-control input-small" />
							</div>
							<div class="form-group">
								<label class="control-label" for="isi">Harga</label>
								<input type="text" id="isi" placeholder="Harga Rumah" name="isilapangan" class="form-control input-small" />
								
							</div>
							<div class="form-group">
								<img alt="gambar" src="" width="120px" height="120px" id="prev"/><br />
								<label class="control-label" for="gambar">Gambar:</label>
								<input type="file" id="gambar" placeholder="File Gambar" name="gambar" class="form-control input-small" />
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary" name="edit-lapangan">EDIT</button>
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
				    	$("#featured #idlapangan").html(id);
				    	$(".modal-footer #lanjut").attr("href", "?mod=managelapangan&featured="+id);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Featured lapangan</h4>
					</div>
					<div class="modal-body" id="featuredlapangan">
						<p>Anda Yakin Akan Menampilkan/Menyembunyikan Data Dengan ID: <strong id="idlapangan"></strong> Pada Halaman Depan</p>
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
				    	$("#deletelapangan #idlapangan").html(id);
				    	$(".modal-footer #lanjut").attr("href", "?mod=managelapangan&delete="+id);
					});
				</script>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            			<h4 class="modal-title" id="myModalLabel">Delete lapangan</h4>
					</div>
					<div class="modal-body" id="deletelapangan">
						<p>Anda Yakin Akan Menghapus Data Dengan ID: <strong id="idlapangan"></strong></p>
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
    	
<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>