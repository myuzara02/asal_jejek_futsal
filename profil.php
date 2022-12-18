<?php
$r=mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));
		
?>
	<div class="alert alert-<?php echo "danger"; ?>">
        <strong> </strong> Edit Profil
    </div>
<form action="edit_profil.php" method="post" role="form">
					<div class="form-group">
						<label class="control-label" for="namalengkap">Nama Lengkap:</label>
						<input type="text" id="namalengkap" placeholder="Nama Lengkap" name="namalengkap" value='<?php echo"$r[nama_lengkap]"; ?>' class="form-control input-small" />
					</div>
					<div class="form-group">
					<label class="control-label" for="jeniskelamin">Jenis Kelamin:</label>
						<select name="jeniskelamin" class="form-control input-small" required ><option value="">Silahkan Dipilih...</option>
						<option value="Laki-Laki" <?php if($r[jenis_kelamin]=="Laki-Laki"){echo"selected";} ?>>Laki-Laki</option>
						<option value="Perempuan" <?php if($r[jenis_kelamin]=="Perempuan"){echo"selected";} ?>>Perempuan</option></select>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						<input type="text" id="email" placeholder="Email" name="email" value='<?php echo"$r[email]"; ?>' class="form-control input-small" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="password">Password:</label>
						<input type="password" id="password" placeholder="Password" name="password" class="form-control input-small" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="handphone">No Hp:</label>
						<input type="text" id="handphone" placeholder="Handphone" name="handphone" value='<?php echo"$r[hp]"; ?>' class="form-control input-small" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="handphone">Alamat:</label>
						<textarea class="form-control input-small" name='alamat'><?php echo"$r[alamat]"; ?></textarea>
					</div>
					
			</div>
				
				
	<div class="form-group">
		<div style="margin-left:15px">
				<button type="submit" class="btn btn-primary" name="register" >Ubah Profil</button>
				
		</div><br>
	</div>
	</form>
