<?php
$user = mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));
$cek = mysql_fetch_array(mysql_query("select * from lapangan where idlap='$_GET[id]'"));
?>
<h2>Pemesanan</h2>
<form action='proses.php' method='post'>
	<table class='table table-bordered table-striped'>
		<tr>
			<td> Nama Lengkap</td>
			<td> <input type=hidden name='id' class='form-control' value="<?php echo "$id"; ?>">
				<input type=text name='nama' class='form-control' value="<?php echo "$user[nama_lengkap]"; ?>" readonly=readonly>
			</td>
		</tr>
		<tr>
			<td> Email </td>
			<td> <input type=text name='email' class='form-control' value="<?php echo "$user[email]"; ?>" readonly=readonly></td>
		</tr>
		<tr>
			<td> No Hp </td>
			<td> <input type=text name='nohp' class='form-control' value="<?php echo "$user[hp]"; ?>" readonly=readonly></td>
		</tr>
		<tr>
			<td> Nama Lapangan </td>
			<td> <input type=text name='email' class='form-control' value="<?php echo "$cek[nm]"; ?>" readonly=readonly><input type=text name='idlap' class='form-control' value="<?php echo "$cek[idlap]"; ?>" hidden=hidden></td>
		</tr>
		<tr>
			<td> Harga Siang </td>
			<td> <input type=text name='h1' class='form-control' value="<?php echo "$cek[harga1]"; ?>" readonly=readonly></td>
		</tr>
		<tr>
			<td> Harga Malam </td>
			<td> <input type=text name='h2' class='form-control' value="<?php echo "$cek[harga2]"; ?>" readonly=readonly></td>
		</tr>
		<tr>
			<td> Tanggal Main </td>
			<td> <input type=date name='tgl' class='form-control' placeholder="yyyy-mm-dd"></td>
		</tr>

		</td>
		</tr>
		<tr>
			<td>Jam Mulai</td>
			<td>
				<select name="jm" class='form-control'>
					<option value="08:00:00">08:00</option>
					<option value="09:00:00">09:00</option>
					<option value="10:00:00">10:00</option>
					<option value="11:00:00">11:00</option>
					<option value="12:00:00">12:00</option>
					<option value="13:00:00">13:00</option>
					<option value="14:00:00">14:00</option>
					<option value="15:00:00">15:00</option>
					<option value="16:00:00">16:00</option>
					<option value="17:00:00">17:00</option>
					<option value="18:00:00">18:00</option>
					<option value="19:00:00">19:00</option>
					<option value="20:00:00">20:00 (Malam)</option>
					<option value="21:00:00">21:00 (Malam)</option>
					<option value="22:00:00">22:00 (Malam)</option>
					<option value="23:00:00">23:00 (Malam)</option>
				</select>
			</td>
		</tr>
		<!-- <tr>
			<td>Lama Sewa</td>
			<td><input type="time" name='lm' class='form-control' maxlength="2" placeholder="Lama sewa"></td>
		</tr> -->

		<!-- <tr>
			<td>
			<td>Lama Sewa</td>
			<select name="lm" placeholder="Lama Sewa">
				<option value="01:00" name='lm'>1 Jam</option>
				<option value="02:00" name='lm'>2 Jam</option>
				<option value="03:00" name='lm'>3 Jam</option>
			</select>
			</td>
		</tr> -->

		<tr>
			<td>Lama Sewa</td>
			<td>
				<select name="lm" class='form-control'>
					<option value="01:00:00">1 Jam</option>
					<option value="02:00:00">2 Jam</option>
					<option value="03:00:00">3 Jam</option>
				</select>
			</td>
		</tr>


		<tr>
			<?php
			if ($_SESSION[iduser] != "") {
			?>
				<td height="25" colspan="5"><input name="submit" type="submit" value="Pesan" class="btn btn-primary" /></td>
			<?php
			} else {
				echo "<td><a href=\"#\" role=\"button\" data-toggle=\"modal\" data-target=\"#modal-login\" class=\"btn btn-primary\">Pesan</a></td>";
			}
			?>
		</tr>

	</table>
</form>