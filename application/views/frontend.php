<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Fahriza Ramadhani Putra</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">


	<link href="<?php echo base_url(); ?>assetsfront/img/favicon.png" rel="icon">
	<link href="<?php echo base_url(); ?>assetsfront/css/aos.css ">
	<link href="<?php echo base_url(); ?>assetsfront/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


	<link href="<?php echo base_url(); ?>assetsfront/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<link href="<?php echo base_url(); ?>assetsfront/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/lightbox/css/lightbox.min.css" rel="stylesheet">



	<link href="<?php echo base_url(); ?>assetsfront/css/style.css" rel="stylesheet">


<body id="page-top">


	<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll" href="#page-top">
				<img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo" width="40" height="40">
				<?= $beranda->judul_menu ?>
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link js-scroll active" href="#home">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#about">Tentang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#work">Riwayat</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#blog">Artikel</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#contact">Kontak</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--/ Nav End /-->

	<!--/ Intro Skew Star /-->
	<div id="home" class="intro route bg-image" style="background-image: url(<?php echo base_url(); ?>assets/img/<?= $beranda->foto_beranda ?>)">
		<div class="overlay-itro"></div>
		<div class="intro-content display-table">
			<div class="table-cell">
				<div class="container">

					<h1 class="intro-title mb-4"><?= $beranda->judul_beranda ?></h1>
					<p class="intro-subtitle"><span class="text-slider-items"><?= $beranda->deskripsi_beranda ?></span><strong class="text-slider"></strong></p>
					<p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#hubungi" role="button">Hubungi Saya</a></p>
				</div>
			</div>
		</div>
	</div>
	<!--/ Intro Skew End /-->

	<section id="about" class="about-mf sect-pt4 route">
		<div class="container">
			<div class="row" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
				<div class="col-sm-12">
					<div class="box-shadow-full">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-sm-6 col-md-5">
										<div class="about-img">
											<img src="<?php echo base_url(); ?>assets/img/<?= $biodata->foto_biodata ?>" class="img-fluid rounded b-shadow-a" alt="">
										</div>
									</div>
									<div class="col-sm-6 col-md-7">
										<div class="about-info">
											<ul class="list-ico">
												<li><span class="title-s"><?= $biodata->nama ?></span></li>
												<li><span class="ion-ios-location"></span><?= $biodata->domisili ?></li>
												<li><span class="ion-ios-telephone"></span><?= $biodata->telp ?></li>
												<li><span class="ion-email"></span><?= $biodata->email ?></li>
											</ul>

										</div>
									</div>
								</div>

								<br>
								<div class="skill-mf">
									<p class="title-s">KEAHLIAN</p>
									<?php foreach ($keahlian as $data) { ?>
										<span><?php echo $data['nama_keahlian'] ?></span> <span class="pull-right"><?php echo $data['presentase'] ?>%</span>
										<div class="progress">
											<div class="progress-bar" role="progressbar" style="width: <?php echo $data['presentase'] ?>%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="about-me pt-4 pt-md-0">
									<div class="title-box-2">
										<h5 class="title-left">
											Tentang Saya
										</h5>
										<br>
										<?= $biodata->deskripsi ?>
										<br>
										<h5 class="title-left">
											Curriculum Vitae
										</h5>
										<!-- coba foto -->
										<div class="row" data-aos="zoom-in-right">
											<div class="col-md-4">
												<div class="work-box">
													<a href="<?php echo base_url(); ?>assets/img/9ef5ee7afe6dbc4b2249140637380ed9.jpg" data-lightbox="gallery-mf">
														<div class="work-img">
															<img src="<?php echo base_url(); ?>assets/img/9ef5ee7afe6dbc4b2249140637380ed9.jpg" alt="" class="img-fluid">
														</div>
													</a>
													<a href="https://drive.google.com/file/d/18RiZaLCp5Df43Ug6sYg4Wjsni0DmwxhI/view?usp=sharing" target="blank" class="btn btn-primary col-md-12">Lihat CV</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--/ Section Portfolio Star /-->
	<section id="work" class="portfolio-mf sect-pt4 route">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="title-box text-center">
						<h3 class="title-a">
							Riwayat Hidup
						</h3>
						<p class="subtitle-a">
							Riwayat Pekerjaan / Sekolah / Magang
						</p>
						<div class="line-mf"></div>
					</div>
				</div>
			</div>
			<div class="row" data-aos="zoom-in-right">
				<?php foreach ($pengalaman as $data) { ?>
					<div class="col-md-4">
						<div class="work-box">
							<a href="<?php echo base_url(); ?>assets/img/<?= $data['foto_pengalaman'] ?>" data-lightbox="gallery-mf">
								<div class="work-img">
									<img src="<?php echo base_url(); ?>assets/img/<?= $data['foto_pengalaman'] ?>" alt="" class="img-fluid">
								</div>
								<div class="work-content">
									<div class="row">
										<div class="col-sm-12">
											<h2 class="w-title"><?= $data['judul_pengalaman'] ?></h2>
											<div class="w-more">
												<span class="w-ctegory"><?= $data['kota_pengalaman'] ?></span> / <span class="w-date"><?= $data['tanggal_pengalaman'] ?></span>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--/ Section Portfolio End /-->

	<!--/ Section Blog Star /-->
	<section id="blog" class="blog-mf sect-pt4 route">

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="title-box text-center">
						<h3 class="title-a">
							Project
						</h3>
						<p class="subtitle-a">
							Project Website / Mobile / Design
						</p>
						<div class="line-mf"></div>
					</div>
				</div>
			</div>

			<div class="row" data-aos="zoom-in-left">
				<?php foreach ($artikel as $data) { ?>
					<div class="col-md-4">
						<div class="card card-blog">
							<div class="card-img">
								<a href="<?php echo base_url('Frontend_c/detail_artikel/') . $data['id_artikel'] ?> "><img src="<?= base_url('assets/img/' . $data['foto_artikel']); ?>" alt="" class="img-fluid"></a>
							</div>
							<div class="card-body">
								<div class="card-category-box">
									<div class="card-category">
										<h6 class="category"><?= $data['nama_kategori'] ?></h6>
									</div>
								</div>
								<h3 class="card-title"><a href="<?php echo base_url('Frontend_c/detail_artikel/') . $data['id_artikel'] ?>"><?= $data['judul_artikel'] ?></a></h3>
								<p class="card-description">
									<?= $data['deskripsi'] ?>
								</p>
							</div>
							<div class="card-footer">
								<div class="post-author">
									<a href="#about">
										<!-- <img src="<?php echo base_url(); ?>assets/img/<?= $biodata->foto_biodata ?>" alt="" class="avatar rounded-circle"> -->
										<span class="author ion-ios-person"> <?= $data['penulis'] ?></span>
									</a>
								</div>
								<div class="post-date">
									<span class="ion-ios-eye"></span> <?= $data['total_dilihat'] ?>x dilihat
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>
	</section>

	<!--/ Section Contact-Footer Star /-->
	<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route">
		<div class="overlay-mf"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="contact-mf">
						<div id="contact" class="box-shadow-full">
							<div class="row">
								<div class="col-md-6">
									<div class="title-box-2">
										<h5 class="title-left">
											Lokasi Saya
										</h5>
									</div>
									<div>
										<div class="map-container">
											<iframe src="<?= $kontak->script_embed_code ?>" width="100%" height="450" style="border:0; max-width:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
										</div>
									</div>
								</div>
								<div class="col-md-6" id="hubungi">
									<div class="title-box-2 pt-4 pt-md-0">
										<h5 class="title-left">
											Hubungi Saya
										</h5>
									</div>
									<div class="more-info">
										<p class="lead">
											<?= $kontak->deskripsi_kontak ?>
										</p>
										<ul class="list-ico">
											<li><span class="ion-ios-location"></span><?= $biodata->domisili ?></li>
											<li><span class="ion-ios-telephone"></span><?= $biodata->telp ?></li>
											<li><span class="ion-email"></span><?= $biodata->email ?></li>
										</ul>
									</div>
									<div class="socials">
										<ul>
											<li><a href="wa.me/+6283111404012"><span class="ico-circle"><i class="ion-social-whatsapp"></i></span></a></li>
											<li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
											<li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
											<li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="copyright-box">
							<div class="credits">
								All Rights Reserved. &copy; Copyright <strong><a href="fahrizarama.site">Fahriza Ramadhani Putra</strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</section>

	<!--/ Section Blog End /-->


	<!--/ Section Contact-footer End /-->


	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>




	<!-- loading -->

	<!-- preloader bulat -->
	<!-- <div id="preloader"></div> -->
	<script>
		window.onload = function() {
			setTimeout(function() {
				preloaderFinish();
			}, 3000);
		};

		function preloaderFinish() {
			var preloader = document.getElementById("preloader");
			preloader.classList.add("loaded");
		}
	</script>
	<!-- preloader line -->
	<div id="preloader">
		<div class="line"></div>
	</div>

	<!-- JavaScript Libraries -->
	<script src="<?php echo base_url(); ?>assetsfront/lib/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/jquery/jquery-migrate.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/popper/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/easing/easing.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/counterup/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/counterup/jquery.counterup.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/lightbox/js/lightbox.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/lib/typed/typed.min.js"></script>
	<script src="<?php echo base_url(); ?>assetsfront/js/aos.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
		AOS.init({
			duration: 1200
		});
	</script>

	<!-- Contact Form JavaScript File -->
	<script src="<?php echo base_url(); ?>assetsfront/contactform/contactform.js"></script>

	<!-- Template Main Javascript File -->
	<script src="<?php echo base_url(); ?>assetsfront/js/main.js"></script>

</body>

</html>