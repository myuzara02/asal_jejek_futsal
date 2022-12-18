       <center><div class='alert alert-success'>Kalender</div></center>
  <?php 
  include "fungsi_kalender.php";
  $tgl_skrg=date("d");
  $bln_skrg=date("n");
  $thn_skrg=date("Y");
  echo buatkalender($tgl_skrg,$bln_skrg,$thn_skrg); 
  ?>

          <div class="list-group">
            <a href="#" class="list-group-item active">Pemesanan Lapangan Futsal</a>
			<marquee>
				Anda harus login dahulu untuk melakukan pemesanan
			</marquee>
          </div>
