<?php 
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM customer WHERE customer_id='$id'");

$data = mysqli_query($koneksi, "SELECT * FROM invoice WHERE invoice_customer='$id'");
while($d = mysqli_fetch_array($data)){
	$id_invoice = $d['invoice_id'];

	mysqli_query($koneksi, "DELETE FROM transaksi WHERE transaksi_invoice='$id_invoice'");

	mysqli_query($koneksi, "DELETE FROM invoice_layanan_tambahan WHERE ilt_invoice='$id_invoice'");
}

mysqli_query($koneksi, "DELETE FROM invoice WHERE invoice_customer='$id'");

header("location: customer.php");
