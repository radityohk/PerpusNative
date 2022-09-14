<?php 
include 'koneksi.php';
$nama_buku = $_POST['nama_buku'];
$pengarang = $_POST['pengarang'];
$deskripsi = $_POST['deskripsi'];
 

$ekstensi =  array('png','jpg','jpeg','gif','JPG');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:tambah_buku.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$foto =$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'foto_produk/'.''.$filename);
		mysqli_query($conn, "INSERT INTO buku    VALUES(NULL,'$nama_buku','$pengarang','$deskripsi','$foto')");
		echo "<script>alert('Sukses menambahkan produk');location.href='tambah_buku.php';</script>";
	}else{
		echo "<script>alert('Gagal menambahkan produk');location.href='tambah_buku.php';</script>";
	}
}
