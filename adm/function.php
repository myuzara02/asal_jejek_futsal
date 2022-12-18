<?php
include_once("../lib/koneksi.php");
if($_POST){
	if(isset($_POST['input-penyakit'])){
		$kodepenyakit = $_POST['kodepenyakit'];
		$namapenyakit = $_POST['namapenyakit'];
		$keteranganpenyakit = $_POST['keteranganpenyakit'];
		$qry = mysql_query("INSERT INTO penyakit(kdpkt,namapkt,ket) VALUES ('$kodepenyakit','$namapenyakit','$keteranganpenyakit')");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			echo mysql_error();
		}
	}
	if(isset($_POST['edit-penyakit'])){
		$idpenyakit = $_POST['idpenyakit'];
		$kodepenyakit = $_POST['kodepenyakit'];
		$namapenyakit = $_POST['namapenyakit'];
		$keteranganpenyakit = $_POST['keteranganpenyakit'];
		$qry = mysql_query("UPDATE penyakit SET kdpkt='$kodepenyakit', namapkt='$namapenyakit', ket='$keteranganpenyakit' WHERE idpkt='$idpenyakit'");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['input-gejala'])){
		$kodegejala = $_POST['kodegejala'];
		$namagejala = $_POST['namagejala'];
		$kodepenyakit = $_POST['kodepenyakit'];
		$keterangangejala = $_POST['keterangangejala'];
		$nilai = $_POST['nilai'];
		$qry = mysql_query("INSERT INTO gejala(kode_gejala,nama_gejala) VALUES ('$kodegejala','$namagejala')");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['edit-gejala'])){
		$idgejala = $_POST['idgejala'];
		$kodegejala = $_POST['kodegejala'];
		$namagejala = $_POST['namagejala'];
		$kodepenyakit = $_POST['kodepenyakit'];
		$keterangangejala = $_POST['keterangangejala'];
		$nilai = $_POST['nilai'];
		$qry = mysql_query("UPDATE gejala SET kode_gejala='$kodegejala', nilai='$nilai',nama_gejala='$namagejala', kode_penyakit='$kodepenyakit', keterangan='$keterangangejala' WHERE id_gejala='$idgejala'");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['input-penanganan'])){
		$kodepenyakit = $_POST['kodepenyakit'];
		$penanganan = $_POST['penanganan'];
		$keteranganpenanganan = $_POST['keteranganpenanganan'];
		$qry = mysql_query("INSERT INTO penanganan(penanganan,kode_penyakit,keterangan) VALUES ('$penanganan','$kodepenyakit','$keteranganpenanganan')");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['edit-penanganan'])){
		$idpenanganan = $_POST['idpenanganan'];
		$kodepenyakit = $_POST['kodepenyakit'];
		$penanganan = $_POST['penanganan'];
		$keteranganpenanganan = $_POST['keteranganpenanganan'];
		$qry = mysql_query("UPDATE penanganan SET penanganan='$penanganan', keterangan='$keteranganpenanganan', kode_penyakit='$kodepenyakit' WHERE id_penanganan='$idpenanganan'");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['input-berita'])){
		$admin = $_SESSION['idadmin'];
		$judulberita = $_POST['judulberita'];
		$isiberita = $_POST['isiberita'];
		$nama_file=$_FILES['gambar']['name'];
		$path=$_FILES['gambar']['tmp_name'];
		$destination="../images/berita/$nama_file";
		move_uploaded_file($path,$destination);
		$qry = mysql_query("INSERT INTO berita(id_admin,judul,gambar,isi,tanggal) VALUES ('$admin','$judulberita','$nama_file','$isiberita',NOW())");
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['edit-berita'])){
		$idberita = $_POST['idberita'];
		$judulberita = $_POST['judulberita'];
		$isiberita = $_POST['isiberita'];
		$gambarlama = $_POST['gambarlama'];
		$nama_file=$_FILES['gambar']['name'];
		if(empty($nama_file)){
			$qry = mysql_query("UPDATE berita SET judul='$judulberita', isi='$isiberita', tanggal=NOW() WHERE id_berita='$idberita'");
		}else{
			$path=$_FILES['gambar']['tmp_name'];
			$destination="../images/berita/$nama_file";
			move_uploaded_file($path,$destination);
			unlink("../images/berita/$gambarlama");
			$qry = mysql_query("UPDATE berita SET judul='$judulberita', isi='$isiberita', gambar='$nama_file', tanggal=NOW() WHERE id_berita='$idberita'");
		}
		if($qry){
			header("Location: $_SERVER[REQUEST_URI]");
		}else{
			mysql_error();
		}
	}
	if(isset($_POST['edit-administrator'])){
		if(empty($_POST['passwordbaru'])){
			$qryadmin = mysql_query("UPDATE admin SET nama_lengkap='$_POST[namalengkap]' WHERE id_admin='$_SESSION[idadmin]'");
			$qryabout = mysql_query("UPDATE about SET about='$_POST[about]'");
		}else{
			$passwordbaru1 = $_POST['passwordbaru'];
			$passwordbaru2 = $_POST['ulangpasswordbaru'];
			if($passwordbaru1==$passwordbaru2){
				$qryp = mysql_query("SELECT password FROM admin WHERE id_admin='$_SESSION[idadmin]'");
				$rpass = mysql_fetch_array($qryp);
				$op = md5($_POST['passwordlama']);
				$np = md5($_POST['passwordbaru']);
				if($op==$rpass['password']){
					$qryadmin = mysql_query("UPDATE admin SET nama_lengkap='$_POST[namalengkap]', password='$np' WHERE id_admin='$_SESSION[idadmin]'");
					$qryabout = mysql_query("UPDATE about SET about='$_POST[about]'");
				}else{
					echo("<script>alert(\"Pasword Lama Tidak Sama\");</script>");
				}
			}else{
				echo("<script>alert(\"Pasword Baru Tidak Sama\");</script>");
			}
		}	
	}
}
if(isset($_GET['mod'])){
	if($_GET['mod']=="managepenyakit"){
		if(isset($_GET['delete'])){
			$qrys=mysql_query("SELECT kdpkt FROM penyakit WHERE idpkt='$_GET[delete]'");
			$rs = mysql_fetch_array($qrys);
			$qry=mysql_query("DELETE FROM penyakit WHERE idpkt='$_GET[delete]'");
			$qryg=mysql_query("DELETE FROM gejala WHERE kdpkt='$rs[kode_penyakit]'");
			$qryp=mysql_query("DELETE FROM penanganan WHERE kdpkt='$rs[kode_penyakit]'");
			header("Location: index.php?mod=managepenyakit");
		}
	}
	if($_GET['mod']=="managegejala"){
		if(isset($_GET['delete'])){
			$qry=mysql_query("DELETE FROM gejala WHERE id_gjl='$_GET[delete]'");
			header("Location: index.php?mod=managegejala");
		}
	}
	if($_GET['mod']=="managepenanganan"){
		if(isset($_GET['delete'])){
			$qry=mysql_query("DELETE FROM penanganan WHERE id_penanganan='$_GET[delete]'");
			header("Location: index.php?mod=managepenanganan");
		}
	}if($_GET['mod']=="managekonsultasi"){
		if(isset($_GET['delete'])){
			$qry=mysql_query("DELETE FROM hasil WHERE id_hasil='$_GET[delete]'");
			header("Location: index.php?mod=managekonsultasi");
		}
	}if($_GET['mod']=="manageberita"){
		if(isset($_GET['delete'])){
			$qrysel = mysql_fetch_array(mysql_query("SELECT gambar FROM berita WHERE id_berita='$_GET[delete]'"));
			unlink("../images/berita/$qrysel[gambar]");
			$qry=mysql_query("DELETE FROM berita WHERE id_berita='$_GET[delete]'");
			header("Location: index.php?mod=manageberita");
		}else if(isset($_GET['featured'])){
			$qrysel = mysql_fetch_array(mysql_query("SELECT featured FROM berita WHERE id_berita='$_GET[featured]'"));
			if($qrysel['featured']=="true"){
				$featured = "false";
			}else{
				$featured = "true";
			}			
			$qry=mysql_query("UPDATE berita SET featured='$featured' WHERE id_berita='$_GET[featured]'");
			header("Location: index.php?mod=manageberita");
		}
	}
}
?>