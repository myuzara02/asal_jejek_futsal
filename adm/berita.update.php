<?php
	session_start();
	include_once('admin.session.php');
	$inf	= $_GET['inf'];
	$sql	= mysql_query("select * from lapangan where idlap='$inf'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Data Lapangan</title>
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
            	<h3>Edit Data Lapangan</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="judul">Nama Lapangan</label>
                        <div class="controls">
                            <input name="id" type="hidden" value="<?php echo $data['idlap']; ?>" id="judul" class="input-xxlarge">
                            <input name="judul" type="text" value="<?php echo $data['nm']; ?>" id="judul" class="input-xxlarge">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Keterangan</label>
                        <div class="controls">
                        	 <textarea name="ket" class="form-control"><?php echo $data['ket']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="isi">Harga Siang</label>
                        <div class="controls">
                        	 <input name="harga" type="text" value="<?php echo $data['harga1']; ?>" id="isi" class="input-xxlarge">
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Harga Malam</label>
                        <div class="controls">
                        	 <input name="harga2" type="text" value="<?php echo $data['harga2']; ?>" id="isi" class="input-xxlarge">
                        </div>
                    </div>
					
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 1</label>
                        <div class="controls">
                        	 <input type="file" name="fupload" id="foto">
						<p>*kosongkan ika tidak diganti</p>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 2</label>
                        <div class="controls">
                        	 <input type="file" name="fupload2" id="foto">
						<p>*kosongkan ika tidak diganti</p>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label" for="isi">Foto 3</label>
                        <div class="controls">
                        	 <input type="file" name="fupload3" id="foto">
						<p>*kosongkan ika tidak diganti</p>
                        </div>
                    </div>
<div class="control-group">
                    	<label class="control-label" for="update"></label>
                        <div class="controls">
	                    	<input name="update" type="submit" id="update" value="Update" class="btn btn-success">
                            <input name="batal" type="submit" id="batal" value="Batal" class="btn btn-warning">
						</div>
                    </div>
                    
                    <?php }
						if(isset($_POST['update'])){
						
						$nama_file   = $_FILES['fupload']['name'];
						$lokasi_file = $_FILES['fupload']['tmp_name'];
						//move_uploaded_file($lokasi_file, "../galery/$nama_file");
						
						$nama_file2   = $_FILES['fupload2']['name'];
						$lokasi_file2 = $_FILES['fupload2']['tmp_name'];
						
						$nama_file3   = $_FILES['fupload3']['name'];
						$lokasi_file3 = $_FILES['fupload3']['tmp_name'];
						//move_uploaded_file($lokasi_file3, "../galery/$nama_file3");
						
	
					if(! empty($lokasi_file)){
						move_uploaded_file($lokasi_file, "../galery/$nama_file");
						$qfoto=",f1='$nama_file'";
					}
					if(! empty($lokasi_file2)){
						move_uploaded_file($lokasi_file2, "../galery/$nama_file2");
						$qfoto2=",f2='$nama_file2'";
					}
					if(! empty($lokasi_file3)){
						move_uploaded_file($lokasi_file3, "../galery/$nama_file3");
						$qfoto3=",f3='$nama_file3'";
					}
					
							mysql_query("update lapangan set
											nm	= '$_POST[judul]',
											ket	= '$_POST[ket]',
											harga1	= '$_POST[harga]',
											harga2	= '$_POST[harga2]'$qfoto $qfoto2 $qfoto3
											where idlap='$inf'") or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='berita.php';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='berita.php';
								</script>";
							exit;
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