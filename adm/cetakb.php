<?php
	session_start();
	include_once('admin.session.php');
if($_GET[bln]!="" and $_GET[thn]!=""){
$bln="and month(p.tanggal)='$_GET[bln]'";
$thn="and year(p.tanggal)='$_GET[thn]'";
}

	date_default_timezone_set('Asia/Jakarta');
$tgl=date('d-m-Y');	
		$s = mysql_query("select p.*,b.* from pemesanan p,bayar b where p.id_pemesanan=b.id_pemesanan $bln $thn and b.konfirmasi='Sudah'
 order by p.id_pemesanan desc")
				or die(mysql_error());
	
?>
</div>
<div class="modal-header">
                	<center>
					<h2>CV. MODEL MAN</h2>
					<span class="style1"><h3>Laporan Pendapatan Perbulan</h3></span>
                	<h5>Jl. Dr. Sutomo, Ujung Jembatan Marapalam Padang</h5>
					</center>
                </div><hr/>
<?php

if($_GET[bln]!="" and $_GET[thn]!=""){
echo"Bulan : $_GET[bln] Tahun : $_GET[thn]";
}
?>

<table class="table table-condensed table-bordered table-hover" border=1 align=center cellspacing=0>
                    <thead>
                    	<td width="5%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Tanggal Pemesanan</h5></font></td>
						<td width="20%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Nama Pemesan</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Email</h5></font></td>
						
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Alamat</h5></font></td>
                        <td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>No Hp</h5></font></td>
						<td width="10%"><font face="Comic Sans MS, cursive" class="text-error text-center"><h5>Jumlah Bayar</h5></font></td>
			
                       
                    </thead>
                    <?php 
					//include_once("../lib/koneksi.php");
						while($data=mysql_fetch_array($s)){
						$qb=mysql_query("select * from bayar where id_pemesanan='$data[id_pemesanan]'");
  
  if(mysql_num_rows($qb)>0){
  $b=mysql_fetch_array($qb);
  $konfirmasi="$b[konfirmasi] dikonfirmasi";
  $bayar="Sudah Bayar";
  }else{
  $konfirmasi="Belum Dikonfirmasi";
  $bayar="Belum Bayar";
  }
							$nama=$data['nama'];
							$email=$data['id_user'];
							$kode=$data['id_pemesanan'];
							$data2=mysql_fetch_array(mysql_query("select * from user where id_user='$email'"));
                    ?>
                    <tbody>
                    	<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo $i ?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[tanggal]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$nama";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data2[email]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data2[alamat]";?></h5></font></td>
						<td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "$data[nohp]";?></h5></font></td>
                        <td><font face="Comic Sans MS, cursive" class="text-info text-left"><h5><?php echo "Rp.".number_format($data['harga']).",-"?></h5></font></td>
						
                    </tbody>
                    <?php
					$i++; 
					$tot=$tot+$data[harga];
					} ?>
					<tfoot>
						<th colspan=6>TOTAL Rp.</th><th><?php echo "Rp.".number_format($tot).",-"?></th>
					</tfoot>
                    </table>
                    

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Padang, <?php echo $tgl; ?></p>
<br/>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manager</p>
