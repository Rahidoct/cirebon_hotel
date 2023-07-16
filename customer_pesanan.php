<?php include 'header.php'; ?>


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Dashboard Customer</h4>
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<a href="#">Customer</a>
						<span>Pesanan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="row">
			
			<div id="aside" class="col-md-3">
				<?php 
				include 'customer_sidebar.php'; 
				?>
			</div>

			<div id="main" class="col-md-9">
				
				<h4><b>KAMAR SAYA</b></h4>
				<br>

				<div>

					<?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-danger'>Gambar gagal diupload!</div>";
						}elseif($_GET['alert'] == "sukses"){
							echo "<div class='alert alert-success'>Pesanan berhasil dibuat, silahkan melakukan pembayaran!</div>";
						}elseif($_GET['alert'] == "upload"){
							echo "<div class='alert alert-success'>Konfirmasi pembayaran berhasil tersimpan, silahkan menunggu konfirmasi dari admin!</div>";
						}
					}
					?>

					<small class="badge badge-success">Jika status sudah berubah jadi "Dikonfirmasi", silahkan berikan NO INVOICE dan Kartu Identitas (KTP/SIM dll) pada resepsionis saat CHECK-IN.</small>
					<br>
					<br>
					<div class="card" style="border-radius: 20px;">
						<div class="card-body">
							<div class="table-responsive">
								<small class="text-muted">
									Semua data kamar yang anda booking dan invoice akan ditampilkan disini.
								</small>
								<table class="table table-sm">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Invoice</th>
											<th scope="col">Customer</th>
											<th scope="col" class="text-center">Status</th>
											<th scope="col" class="text-center">OPSI</th>
										</tr>
									</thead>
									<tbody class="table-bordered">
										<?php 
										$no = 1;
										$id = $_SESSION['customer_id'];
										$invoice = mysqli_query($koneksi,"select * from invoice where invoice_customer='$id' order by invoice_id desc");
										while($i = mysqli_fetch_array($invoice)){
											?>
											<tr>
												<th scope="col"><?php echo $no++ ?></th>
												<td>
													<small class="text-muted"><?php echo date('d/m/Y', strtotime($i['invoice_tanggal'])) ?></small><br>
													INVOICE-00<?php echo $i['invoice_id'] ?><br>
													<small><?php echo "Rp. ".number_format($i['invoice_total_bayar'])." ,-" ?></small>

												</td>
												<td><?php echo $i['invoice_nama'] ?></td>
												<td class="text-center">
													<?php 
													if($i['invoice_status'] == 0){
														echo "<span class='badge badge-warning'>Menunggu Pembayaran</span>";
													}elseif($i['invoice_status'] == 1){
														echo "<span class='badge badge-default'>Menunggu Konfirmasi</span>";
													}elseif($i['invoice_status'] == 2){
														echo "<span class='badge badge-danger'>Ditolak</span>";
													}elseif($i['invoice_status'] == 3){
														echo "<span class='badge badge-primary'>Dikonfirmasi</span>";
													}elseif($i['invoice_status'] == 4){
														echo "<span class='badge badge-success'>Selesai</span>";
													}
													?>

												</td>
												<td class="text-center">
													<?php 
													if($i['invoice_status'] == 0){
														?>
														<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
														<?php
													}elseif($i['invoice_status'] == 1){
														?>
														<a class='btn btn-sm btn-primary' href="customer_pembayaran.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>
														<?php
													}
													?>

													<?php 
													if($i['invoice_status'] == 4){
														?>
														<a class='btn btn-sm btn-danger' href="customer_rating.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-star"></i> Beri Rating & Review</a>
														<?php
													}
													?>
													<a class='btn btn-sm btn-success' href="customer_invoice.php?id=<?php echo $i['invoice_id']; ?>"><i class="fa fa-print"></i> Invoice</a>
												</td>
											</tr>
											<?php 
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>
<!-- Checkout Section End -->

<?php include 'footer.php'; ?>