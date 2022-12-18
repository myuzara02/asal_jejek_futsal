<?php
if ($_GET[id] == "") {
?>

  <h2>Lihat Lapangan</h2>
  <table width='478' border='1' class='table table-bordered table-striped'>
    <tr>
      <th rowspan=2>No</th>
      <th rowspan=2>Nama Lapangan</th>
      <th rowspan=2>Ket</th>
      <th colspan=2>Harga</th>
      <th colspan=3>Foto</th>
      <th rowspan=2>Aksi</th>
    </tr>
    <tr>
      <th>Siang (<=17:59)< /th>
      <th>Malam (>=18:00)</th>
      <th>Foto 1</th>
      <th> Foto 2</th>
      <th>Foto 3</th>
    </tr>
    <?php
    $q = mysql_query("select * from lapangan order by nm");
    $no = 1;
    while ($d = mysql_fetch_array($q)) {
      echo "
  <tr>
	<td>$no</td>
	<td>$d[nm]</td>
	<td>$d[ket]</td>
	<td>$d[harga1]</td>
	<td>$d[harga2]</td>
	<td><a href='galery/$d[f1]' target='blank'><img src='galery/$d[f1]' height='100' width='100'></a></td>
	<td><a href='galery/$d[f2]' target='blank'><img src='galery/$d[f2]' height='100' width='100'></a></td>
	<td><a href='galery/$d[f3]' target='blank'><img src='galery/$d[f3]' height='100' width='100'></a></td>
	<td><a href='?view=lap&id=$d[idlap]' class='btn btn-warning'>Lihat Jadwal</a> ";
      if ($_SESSION[iduser] != "") {
        echo "<a href='?view=pesan&id=$d[idlap]' class='btn btn-info'>Pesan</a></td>";
      } else {
        echo "<a href=\"#\" role=\"button\" data-toggle=\"modal\" data-target=\"#kode\" class=\"btn btn-primary\">Pesan</a></td>";
      }
      echo "</tr>";
      $no++;
    }
    ?>


  </table>

<?php
} else {

  $user = mysql_fetch_array(mysql_query("select * from user where id_user='$_SESSION[iduser]'"));
  $cek = mysql_fetch_array(mysql_query("select * from lapangan where idlap='$_GET[id]'"));

  //jadwal
?>
  <h2>Jadwal <?php if ($_POST[tanggal] == "") {
                echo "Hari ini";
              } else {
                echo "Tanggal : \"$_POST[tanggal]\"";
              } ?></h2>
  <p>
  <form method="post"><input type='text' class='input-small' name='tanggal' placeholder='yyyy-mm-dd' value='<?php echo "$_POST[tanggal]"; ?>' /> <input class='btn btn-danger' type='submit' name=submit value='cari' /></form>
  </p>

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
    </tr>
    <?php
    if ($_POST[tanggal] == "") {
      $tgl2 = date('Y-m-d');
      $post = "and date(jmulai)='$tgl2'";
    } else {

      $tgl2 = $_POST[tanggal];
      $post = "and date(jmulai)='$tgl2'";
      date_default_timezone_set('Asia/Jakarta');
    }

    $q = mysql_query("select * from sewa where idlap='$_GET[id]' $post order by tgl_pesan desc");

    $no = 1;
    while ($d = mysql_fetch_array($q)) {
      $tg = substr("$d[jmulai]", 0, 10);
      $jmul = substr("$d[jmulai]", 11, 5);
      $jhab = substr("$d[jhabis]", 11, 5);

      $lap = mysql_fetch_array(mysql_query("select * from lapangan where idlap='$d[idlap]'"));
      echo "
  <tr>
	<td>$no</td><td>$d[idsewa]</td><td>$d[tgl_pesan]</td><td>$lap[nm]</td><td>$tg</td><td>$d[lama] jam</td><td>$jmul</td><td>$jhab</td>
  </tr>";

      $no++;
    }
    ?>


  </table>
<?php
}
?>
<br><br><br>