<?php

		
?>
	<div class="alert alert-<?php echo "danger"; ?>">
        <strong> </strong> Daftar Member Baru
    </div>
<form action="register.php" method="post" role="form">
					<div class="form-group">
						<label class="control-label" for="namalengkap">Nama Lengkap:</label>
						<input type="text" id="namalengkap" placeholder="Nama Lengkap" name="namalengkap" class="form-control input-small" />
					</div>
					<div class="form-group">
					<label class="control-label" for="jeniskelamin">Jenis Kelamin:</label>
						<select name="jeniskelamin" class="form-control input-small" required ><option value="">Silahkan Dipilih...</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option></select>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email:</label>
						<input type="text" id="email" placeholder="Email" name="email" class="form-control input-small" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="password">Password:</label>
						<input type="password" id="password" placeholder="Password" name="password" class="form-control input-small" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="handphone">No Hp:</label>
						<input type="text" id="handphone" placeholder="Handphone" name="handphone" class="form-control input-small" />
					</div>
					
					<div class="form-group">
						<label class="control-label" for="handphone">Alamat:</label>
						<textarea class="form-control input-small" name='alamat'></textarea>
					</div>
					
			</div>
				
				
	<div class="form-group">
		<div style="margin-left:15px">
				<button type="submit" class="btn btn-primary" name="register" >Daftar</button>
				
		</div><br>
	</div>
	</form>
