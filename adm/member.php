<?php
	session_start();
	include_once('admin.session.php');

	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from user"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from user order by id_user desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from user order by id_user desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Managemen Member</title>
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
			<div>
            	<div class="modal-header">
                	<h3>List Member</h3>
                </div>
            	
                <div style="margin-top:10px">
                    <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
                        <td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama Lengkap</h5></font></td>
						<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Jenis Kelamin</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Email</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No Hp</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Alamat</h5></font></td>
	
						
                       
                        <td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5><span class="icon-wrench"></span></h5></font></td>
                    </thead>
                    <?php 
						while($data=mysql_fetch_array($s)){
							$nama=$data['nama_lengkap'];
							$email=$data['email'];
							$kode=$data['id_user'];
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo $i ?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-error text-left"><h5><?php echo "$nama";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[jenis_kelamin]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$email";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[hp]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[alamat]";?></h5></font></td>
	
						
                        
                        <td>
                        	<font face="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="btn btn-small btn-info" href="member.update.php?kode=<?php echo $kode;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Edit"> Edit</a>
                                <a ace="Comic Sans MS, cursive" class="text-info text-center"><h5>
                                <a class="btn btn-small btn-warning" href="member.delete.php?kode=<?php echo $kode;?>" data-toggle="tooltip" data-placement="bottom"
                                    title="Hapus">Hapus</a>
							</h5></font>
						</td>
                    </tbody>
                    <?php $i++; } ?>
                    </table>
                    </div>
                    
                    <div class="pagination pagination-centered">
                        <ul>
                            <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
                                <li><a href="member.php?hal=<?php echo $i ?>"><?php echo $i ?></a></li>
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