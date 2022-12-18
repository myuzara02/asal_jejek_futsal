<?php
if ($_GET[id] == "") {
?>
  <h2>Pembayaran</h2>
  <table width='478' border='1' class='table table-bordered table-striped'>
    <tr>
      <th>No</th>
      <th>ID Pemesanan</th>
      <th>Tgl Pesan</th>
      <th>Nama Lapangan</th>
      <th>Tgl Main</th>
      <th>Lama Sewa</th>
      <th>Jam Mulai</th>
      <th>Jam Habis</th>
      <th>Harga</th>
      <th>Total Harga</th>
      <th>Bukti</th>
      <th>Konfirmasi</th>
      <th>Aksi</th>
    </tr>
    <?php
    $q = mysql_query("select * from sewa where iduser='$_SESSION[iduser]' order by jmulai desc");
    $no = 1;
    while ($d = mysql_fetch_array($q)) {
      $tg = substr("$d[jmulai]", 0, 10);
      $jmul = substr("$d[jmulai]", 11, 5);
      $jhab = substr("$d[jhabis]", 11, 5);
      $qb = mysql_query("select * from bayar where idsewa='$d[idsewa]'");
      $jhabis = $jmul + $d[lama];

      if (mysql_num_rows($qb) > 0) {
        $b = mysql_fetch_array($qb);
        $konfirmasi = "$b[konfirmasi]";
        if ($b[konfirmasi] == "Sudah") {
          $cetak = "<a href='cetak2.php?id=$d[idsewa]' target='_blank' class='btn btn-success'>Cetak</a>";
        } else {
          $cetak = "<a href='cetak2.php?id=$d[idsewa]' target='_blank' class='btn btn-success'>Cetak</a>";
        }
      } else {
        $konfirmasi = "Belum";
        $bayar = "<a href='index.php?view=bayar&id=$d[idsewa]' class='btn btn-info'> Bayar </a>";
        $cetak = "<a href='cetak2.php?id=$d[idsewa]' target='_blank' class='btn btn-success'>Cetak</a>";
      }
      $lap = mysql_fetch_array(mysql_query("select * from lapangan where idlap='$d[idlap]'"));

      $qqb = mysql_query("select * from bayar where idsewa='$d[idsewa]'");

      $bb = mysql_fetch_array($qqb);
      if ($bb[bukti] != "") {
        $bukti = "<img src='bukti/$bb[bukti]' height='150' width='150' />";
      } else {
        $bukti = "Belum ada";
      }
      echo "
  <tr>
	<td>$no</td>
  <td>$d[idsewa]</td>
  <td>$d[tgl_pesan]</td>
  <td>$lap[nm]</td><td>$tg</td>
  <td>$d[lama] jam</td>
  <td>$jmul</td>
  <td>$jhabis : 00</td>"; ?>
      <td><?php echo "Rp. " . number_format($d[harga]) . ",- ($d[jns])" ?></td>
      <td><?php echo "Rp. " . number_format($d[tot]) . ",-" ?></td>
    <?php echo "<td>$bukti</td><td>$konfirmasi</td><td>$bayar $cetak</td>
  </tr>";
      $no++;
    }
    ?>


  </table>
<?php
} else {
  echo "<h4>Form Upload Bukti Pembayaran  </h4>
        <hr>
      <h5> Dana : 081214648172 (AN : Rival Riyanto) </h5>
      <h5> BJB  : 112233445556 (AN : Miftah Yuzar A </h5>
	<hr>
          <form method=POST action=proses2.php enctype='multipart/form-data'>
          <input type=hidden name=id value='$r[id_berita]'>
          <table class='table table-bordered table-striped'>
          
<tr><td> ID Pemesanan</td><td>  <input type=text name='id' value='$_GET[id]' class='form-control' readonly=readonly></td></tr> 
"; ?>

  <tr>
    <td> Bukti Transfer </td>
    <td><input type=file name='fupload' class='form-control'></td>
  </tr>

  <tr>
    <td colspan=2><input type=submit value=Kirim class='btn btn-primary'>
      <input type=button value=Batal onclick=self.history.back() class='btn btn-warning'>
    </td>
  </tr>
  </table>



  </form>

<?php
}
?>