<?php include 'header.php'; ?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Daftar Customer</h4>
					<div class="breadcrumb__links">
						<a href="index.php">Home</a>
						<a href="#">Customer</a>
						<span>Daftar</span>
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
		<div class="checkout__form">
			<form action="daftar_act.php" method="post">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6">

						<?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "duplikat"){
								echo "<div class='alert alert-danger text-center'>Maaf email ini sudah digunakan, silahkan gunakan email yang lain.</div>";
							}
						}
						?>

						<h6 class="coupon__code"><span class="icon_tag_alt"></span> Sudah punya akun? <a href="masuk.php" class="text-success">Klik Di Sini</a> untuk login.</h6>
						
						<h6 class="checkout__title">Daftar</h6>
						<div class="checkout__input">
							<p>Nama Lengkap<span>*</span></p>
							<input type="text" class="input" required="required" name="nama" placeholder="Masukkan nama lengkap ..">
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Email<span>*</span></p>
									<input type="email" class="input" required="required" name="email" placeholder="Masukkan email ..">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>No. HP / Whatsapp<span>*</span></p>
									<input type="number" class="input" required="required" name="hp" placeholder="Masukkan nomor HP/Whatsapp ..">
								</div>
							</div>
						</div>
						<div class="checkout__input">
							<p>Alamat<span>*</span></p>
							<input type="text" class="input" required="required" name="alamat" placeholder="Masukkan alamat lengkap ..">
						</div>
						<div class="checkout__input">
							<p>Password<span>*</span> <small class="text-muted">Password ini digunakan untuk login ke akun anda.</small></p>
							<input type="password" class="input" required="required" name="password" placeholder="Masukkan password ..">
						</div>
						
						<button type="submit" class="site-btn" style="border-radius: 20px;">DAFTAR SEKARANG</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Checkout Section End -->


<?php include 'footer.php'; ?>