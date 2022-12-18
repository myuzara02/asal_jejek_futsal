<?php
	session_start();
	include_once('admin.session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tambah Data Lapangan</title>
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
			<div class="modal-header">
            	<h3>Tambah Data Barang Sewa Pakai</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="judul">Nama Lapangan</label>
                        <div class="controls">
                            <input name="judul" type="text" id="judul" class="input-xxlarge">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Keterangan</label>
                        <div class="controls">
                        	 <textarea name="ket" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Harga Siang</label>
                        <div class="controls">
                        	 <input name="harga" type="text" id="isi" class="input-xxlarge">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Harga Malam</label>
                        <div class="controls">
                        	 <input name="harga2" type="text" id="isi" class="input-xxlarge">
                        </div>
                    </div>
					
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 1</label>
                        <div class="controls">
                        	 <input type="file" name="fupload" id="foto">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 2</label>
                        <div class="controls">
                        	 <input type="file" name="fupload2" id="foto">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 3</label>
                        <div class="controls">
                        	 <input type="file" name="fupload3" id="foto">
                        </div>
                    </div>

					 <div class="control-group">
                    	<label class="control-label" for="simpan"></label>
                        <div class="controls">
	                    	<input name="simpan" type="submit" id="simpan" value="Simpan" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php
						if(isset($_POST['simpan'])){
						$nama_file   = $_FILES['fupload']['name'];
						$lokasi_file = $_FILES['fupload']['tmp_name'];
						move_uploaded_file($lokasi_file, "../galery/$nama_file");
						
						$nama_file2   = $_FILES['fupload2']['name'];
						$lokasi_file2 = $_FILES['fupload2']['tmp_name'];
						move_uploaded_file($lokasi_file2, "../galery/$nama_file2");
						
						$nama_file3   = $_FILES['fupload3']['name'];
						$lokasi_file3 = $_FILES['fupload3']['tmp_name'];
						move_uploaded_file($lokasi_file3, "../galery/$nama_file3");
						

							mysql_query("insert into lapangan values ('','$_POST[judul]', '$_POST[ket]','$_POST[harga]','$_POST[harga2]','$nama_file','$nama_file2','$nama_file3')")
							or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Simpan Berhasil');
								window.location='berita.php';
								</script>";
		}
					?>
                </form>
			</div>
    	</div>
</div>

<br><br><br><br>
<?php include_once('../footer.php'); ?>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>