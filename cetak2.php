<?php
session_start();
include_once("config/koneksi.php");

$r1 = mysql_fetch_array(mysql_query("select * from sewa,bayar where sewa.idsewa=bayar.idsewa and bayar.idsewa='$_GET[id]'"));
$r = mysql_fetch_array(mysql_query("select * from sewa where idsewa='$_GET[id]'"));
$r2 = mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));
$r3 = mysql_fetch_array(mysql_query("select * from lapangan where idlap='$r[idlap]'"));
?>

<title>Cetak Bukti Pemesanan</title>
<style type="text/css">
  <!--
  .style1 {
    font-size: 18px;
    font-weight: bold;
  }
  -->
</style>

<body onLoad="javascript:window:print()">
  <div id="header">
    <div align="center">
      <p><span class="style1">Asal Jejek Futsal</span><br>
        Jl. Prokalamsi, Jayaraga, Garut Telp.(0751)73905 HP. 087802513455 - 081224648172

        <hr>
      </p>

      <strong>Bukti Pembayaran </strong>
    </div>
  </div>
  <?php
  $tg = substr("$r[jmulai]", 0, 10);
  $jmul = substr("$r[jmulai]", 11, 5);
  $jhab = substr("$r[jhabis]", 11, 5);
  ?>
  <table width="382" border="0" align="center">
    <tr>
      <td width="125" height="31"> Nama Pemesan</td>
      <td width="185">: <?php echo "$r2[nama_lengkap]"; ?></td>
    </tr>
    <tr>
      <td height="35">Email</td>
      <td>: <?php echo "$r2[email]"; ?></td>
    </tr>
    <tr>
      <td height="35">No Hp</td>
      <td>: <?php echo "$r2[hp]"; ?></td>
    </tr>
    <tr>
      <td height="37">Tanggal Pesan</td>
      <td>: <?php echo "$r[tgl_pesan]"; ?></td>
    </tr>

    <tr>
      <td height="37">Nama Lapangan</td>
      <td>: <?php echo "$r3[nm]"; ?></td>
    </tr>
    <tr>
      <td height="37">Lama Main</td>
      <td>: <?php echo "$r[lama]"; ?></td>
    </tr>
    <tr>
      <td height="37">Tanggal Main</td>
      <td>: <?php echo "$tg"; ?></td>
    </tr>
    <tr>
      <td height="37">Jam Mulai</td>
      <td>: <?php echo "$jmul"; ?></td>
    </tr>
    <tr>
      <td height="37">Jam Habis</td>
      <td>: <?php echo "$jhab"; ?></td>
    </tr>
    <tr>
      <td height="37">Harga</td>
      <td>: <?php echo number_format($r['harga'], 2);
            echo " ($r[jns])"; ?></td>
    </tr>
    <tr>
      <td height="37">Total Bayar</td>
      <td>: <?php echo number_format($r['tot'], 2); ?></td>
    </tr>
    <tr>
      <td height="37">Status Konfirmasi</td>
      <td>: <?php echo $r1['konfirmasi']; ?></td>
    </tr>
    <tr>
      <td height="37">No Rekening</td>
      <td>: 1560008763084</td>
    </tr>
    <tr>
      <td height="37">Nama Bank</td>
      <td>: Mandiri</td>
    </tr>
    <tr>
      <td height="37">Atas Nama</td>
      <td>: <?php echo "$r2[nama_lengkap]"; ?></td>
    </tr>
  </table>