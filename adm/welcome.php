<?php
	include_once('admin.session.php');
	$s = mysql_query("select * from admin where id_user='$_SESSION[id_user]'");
	$d = mysql_fetch_array($s);
?>

<div class="container">
        <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:50px; margin-left:auto; margin-right:auto;">
			<div class="hero-unit text-center">
            	<font face="Comic Sans MS, cursive">Selamat Datang <b class="text-error"><?php echo "$d[nama]";?></b>, silahkan pilih menu untuk mengelola halaman website.</font>
			</div>
                	</div>
    </div>
</div>