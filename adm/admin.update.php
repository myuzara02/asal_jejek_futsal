<?php
	session_start();
	include_once('admin.session.php');
	$id	= $_GET['id'];
	$sql	= mysql_query("select * from admin where id_user='$id'");
	$data	= mysql_fetch_array($sql);
	if(mysql_num_rows($sql) > 0){
		$username	= $data['username'];
		$password	= $data['password'];
		$nama		= $data['nama'];
		$phone		= $data['phone'];
		$email		= $data['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Admin</title>
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
            	<h3>Edit Admin</h3>
            </div>
            <div style="margin-top:10px;">
            	<form class="form-horizontal" name="form1" method="post" action="" enctype="multipart/form-data">
                    <div class="control-group">
                        <label class="control-label" for="username">Username</label>
                        <div class="controls">
                            <input name="username" type="text" id="username" class="input-large" value='<?php echo "$username";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input name="password" type="password" id="password" class="input-large" value='<?php echo "$password";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="nama">Nama</label>
                        <div class="controls">
                            <input name="nama" type="text" id="nama" class="input-large" value='<?php echo "$nama";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phone">Phone</label>
                        <div class="controls">
                            <input name="phone" type="text" id="phone" class="input-large" value='<?php echo "$phone";?>'>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">Email</label>
                        <div class="controls">
                            <input name="email" type="text" id="email" class="input-large" value='<?php echo "$email";?>'>
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
							mysql_query("update admin set
											username	= '$_POST[username]',
											password	= '$_POST[password]',
											nama		= '$_POST[nama]',
											phone		= '$_POST[phone]',
											email		= '$_POST[email]' 
											where id_user = '$id'") or die(mysql_error);
								
							echo "<script language=javascript>
								window.alert('Edit Berhasil');
								window.location='admin.php?hal=1';
								</script>";
							exit;
						}
						
						if(isset($_POST['batal'])){
							echo "<script language=javascript>
								window.location='admin.php?hal=1';
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