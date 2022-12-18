<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style><body onLoad="javascript:print()">   
<?php 

session_start();
	include_once('admin.session.php');
include_once("tglindo.php");
?>
<?
$tgl=date('Y-m-d');
$tgl1=$_POST['tgl1'];
$bln1=$_POST['bln1'];
$thn1=$_POST['thn1'];
$tgl2=$_POST['tgl2'];
$bln2=$_POST['bln2'];
$thn2=$_POST['thn2'];

?> 
<div align="center">
    <p><span class="style1">DUTA MINANG </span><br> 
    Jl. Rajawali  No. 9 Andalas Padang 

    <hr> 
    </p><strong>Laporan Pemesanan Paket Wedding Organizer</strong></div>

<div align="center">DARI TANGGAL  <?php echo"$tgl1";?> / <?php echo"$bln1";?>/ <?php echo"$thn1";?> SAMPAI DENGAN TANGGAL  <?php echo"$tgl2";?> / <?php echo"$bln2";?>/ <?php echo"$thn2";?></div>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#33CCFF">
<tr>
<td width="15%" align="center" valign="middle" bgcolor="#71DCFF"><strong>Tanggal Pemesanan </strong></td>
<td width="20%" align="center" valign="middle" bgcolor="#71DCFF"><strong>Nama Pemesan </strong></td>
<td width="12%" align="center" valign="middle" bgcolor="#71DCFF"><strong>Email</strong></td>
<td width="15%" align="center" valign="middle" bgcolor="#71DCFF"><strong>No Hp </strong></td>
<td width="23%" align="center" valign="middle" bgcolor="#71DCFF"><strong>Jenis Paket </strong></td>
<td width="15%" align="center" valign="middle" bgcolor="#71DCFF"><strong>Harga Paket</strong></td>
</tr>
<?

$ambildata=mysql_query("SELECT * FROM pemesanan WHERE tanggal >= '$thn1-$bln1-$tgl1' AND tanggal <= '$thn2-$bln2-$tgl2'");
$cekdata=mysql_num_rows($ambildata);
if($cekdata=='0'){
echo "Maaf Data Yang anda cari tidak ada";
}
while($cetakdata=mysql_fetch_array($ambildata)){
$total_masuk=$cetakdata[jumlah];
$hitung+=$total_masuk;
$total_keluar=$cetakdata[keluar];
$hitung1+=$total_keluar;
$keseluruhan+=$cetakdata[harga];

?>

<tr>
<td bgcolor="#FFFFFF"><?=TanggalIndo($cetakdata['tanggal'])?></td>
<td bgcolor="#FFFFFF"><?=$cetakdata[nama]?></td>
<td bgcolor="#FFFFFF"><?=$cetakdata[email]?></td>
<td bgcolor="#FFFFFF"><?=$cetakdata[nohp]?></td>

<td bgcolor="#FFFFFF"><?=$cetakdata[tipe]?></td>
<td bgcolor="#FFFFFF"><?="Rp.".number_format($cetakdata['harga']).",-"?></td>
</tr>
<? } ?>

<tr>
<td colspan="4" align="left" valign="middle" bgcolor="#71DCFF"><strong>
  <div align="left"></div></td>
  <td bgcolor="#71DCFF"><div align="right">Total Keseluruhan </div></td>
<td align="left" valign="middle" bgcolor="#71DCFF"><strong>Rp.<?php echo number_format($keseluruhan);?>,-  </strong></td>
</tr>
</table>


							  <div class="col-lg-12 col-md-4" align="right">
								Padang,<?php echo TanggalIndo($tgl); ?> <br/><br/><br/><br/>
								Pimpinan
								<?php //echo $_SESSION['nama_user']; ?>
							  </div>