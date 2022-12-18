<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from admin"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from admin order by id_user desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from admin order by id_user desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin</title>
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
                	<h3>List Admin</h3>
                </div>
            	<div style="margin-top:10px" class="text-right">
            		<a href="admin.add.php"><input name="tambah" type="submit" id="tambah" value="Tambah Data" class="btn btn-danger"></a>
                </div>
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Username</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Phone</h5></font></td>
                        <td width="30%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Email</h5></font></td>
                        <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><span class="icon-wrench"></span></h5></font></td>
                    </thead>
                    <?php 
						while($data=mysql_fetch_array($s)){
							$id=$data['id_user'];
							$username=$data['username'];
							$nama=$data['nama'];
							$phone=$data['phone'];
							$email=$data['email'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><?php echo "$username";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$nama";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo "$phone";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-center"><h5><?php echo "$email";?></h5></font></td>
                        <td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                            <?php if($id==$_SESSION['id_user']){ ?>
                                <a class="tip" href="admin.update.php?id=<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Edit"><span class="icon-pencil"></span></a>
                                <a class="tip" href="admin.delete.php?id=<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Hapus"><span class="icon-remove"></span></a>
							<?php }else{ echo "&nbsp;"; } ?>
								
							</h5></font>
						</td>
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                    </div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="admin.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
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