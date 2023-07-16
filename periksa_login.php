<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
$sebagai = mysqli_real_escape_string($koneksi, $_POST['sebagai']);

if($sebagai == "admin"){

	$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['admin_id'];
		$_SESSION['nama'] = $data['admin_nama'];
		$_SESSION['username'] = $data['admin_username'];
		$_SESSION['status'] = "admin_login";

		header("location:admin/");
	}else{
		header("location:login.php?alert=gagal");
	}


}else if($sebagai == "resepsionis"){

	$login = mysqli_query($koneksi, "SELECT * FROM resepsionis WHERE resepsionis_username='$username' AND resepsionis_password='$password'");
	$cek = mysqli_num_rows($login);

	if($cek > 0){
		session_start();
		$data = mysqli_fetch_assoc($login);
		$_SESSION['id'] = $data['resepsionis_id'];
		$_SESSION['nama'] = $data['resepsionis_nama'];
		$_SESSION['username'] = $data['resepsionis_username'];
		$_SESSION['status'] = "resepsionis_login";

		header("location:resepsionis/");
	}else{
		header("location:login.php?alert=gagal");
	}


}

