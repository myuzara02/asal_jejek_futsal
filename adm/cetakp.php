<?php
	session_start();
	include_once('admin.session.php');
	date_default_timezone_set('Asia/Jakarta');
$tgl=date('d-m-Y');
	$i = 1;
	$jml_per_halaman = 10; // jumlah data yg ditampilkan perhalaman
	$jml_data = mysql_num_rows(mysql_query("select * from pemesanan"));
	$jml_halaman = ceil($jml_data / $jml_per_halaman);
	
	if(isset($_GET['hal'])){
		
			$hal = $_GET['hal'];
			$i = ($hal - 1) * $jml_per_halaman  + 1;
			$s = mysql_query("select * from pemesanan

 order by id_pemesanan desc limit ".(($hal - 1) * $jml_per_halaman).", $jml_per_halaman");
		
	}else{
		$s = mysql_query("select * from pemesanan
 order by id_pemesanan desc limit 0, $jml_per_halaman")
				or die(mysql_error());
	}

$edit=mysql_query("SELECT * FROM pemesanan where id_pemesanan='$_GET[kode]'");
    $r=mysql_fetch_array($edit);
	$edit1=mysql_query("SELECT * FROM user where id_user='$r[id_user]' ");
    $r1=mysql_fetch_array($edit1);

	?>
			<div>
            	<div class="modal-header">
                	<center>
					<h3>CV. MODEL MAN</h3>
                	<h5>Jl. Dr. Sutomo, Ujung Jembatan Marapalam Padang</h5>
					</center>
                </div>
            	
                <div style="margin-top:10px">
				<?php
				$qb=mysql_query("select * from bayar where id_pemesanan='$_GET[kode]'");
  
  if(mysql_num_rows($qb)>0){
  $b=mysql_fetch_array($qb);
  $konfirmasi="$b[konfirmasi] dikonfirmasi";
  $bayar="Sudah Bayar";
  if($b[konfirmasi]=="Belum"){
  $konfirmasi2="<a href='pemesanan.konfirmasi.php?id=$_GET[kode]' class='btn btn-info'>Konfirmasi</a>";
  }else{
  $konfirmasi2="<a href='pemesanan.btlkonfirmasi.php?id=$_GET[kode]' class='btn btn-danger'>Batal Konfirmasi</a>";
  }
  }else{
  $konfirmasi="Belum Dikonfirmasi";
  $bayar="Belum Bayar";
  }
  $r5=mysql_fetch_array(mysql_query("select * from user where id_user='$r[id_user]'"));
				echo "<hr/>
          <form method=POST action=proses2.php>
          <input type=hidden name=id value='$r[id_berita]'>
          <table class='table table-bordered table-striped' align=center>
          
<tr><td>  Nama Pelanggan</td><td>: $r[nama]</td><td>  Email </td><td>: $r5[email]</td></tr>
<tr><td>  Alamat </td><td>: $r5[alamat]</td><td>  Nomor HP </td><td>: $r5[hp]</td></tr>
";
?>

          </table>

                    	<table width='478' border='1' cellspacing=0 align=center class='table table-bordered table-striped'>
<h4 align=center>Barang/Jasa yang dibeli</h4>

				<tr>
    <th>No</th><th>Nama Barang Sewa Pakai</th><th>Harga</td><th>Banyaknya</th><th>Ket</th><th>Jumlah</th>
  </tr>
  <?php
  $q=mysql_query("select b.*,i.* from berita b,item_dipesan i where i.id_pemesanan='$_GET[kode]' and i.id_berita=b.id_berita order by b.judul");
$no=1; 
 while($d=mysql_fetch_array($q)){
  //$d[harga] 
  echo"
  <tr>
	<td>$no</td><td>$d[judul]</td>"; ?> <td><?php echo "Rp.".number_format($d['harga']).",-"?></td><?php echo"<td  width='10%'>$d[jml]</td><td>$d[satuan]</td>
		";
		?><td><?php echo "Rp.".number_format($d['sub_tot']).",-"?></td><?php
  echo"</tr>";
  $no++;
  }
  ?>
  
<tr>
<td colspan=5>TOTAL </td><td><?php echo "Rp.".number_format($r['harga']).",-"?></td>
</tr>

</table>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Padang, <?php echo $tgl; ?></p>
<br/>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager</p>

                    
                  
                    
                </div>
			</div>
    	