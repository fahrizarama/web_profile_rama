<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Fahriza Ramadhani Putra</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assetsfront/img/favicon.png" rel="icon">
	<link href="<?php echo base_url(); ?>assetsfront/css/aos.css ">
	<link href="<?php echo base_url(); ?>assetsfront/img/apple-touch-icon.png" rel="apple-touch-icon">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="<?php echo base_url(); ?>assetsfront/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="<?php echo base_url(); ?>assetsfront/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assetsfront/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="<?php echo base_url(); ?>assetsfront/css/style.css" rel="stylesheet">

	<!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->

</head>

<!-- <style>
	.row {
		width: 100%;
		height: 100%;
		margin: 50px auto;
		padding-top: 75px;
		background: #ccc;
		text-align: center;
		color: #FFF;
		font-size: 3em;
	}
</style> -->

<body id="page-top">

	<!--/ Nav Star /-->
	<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll" href="#page-top"><?= $beranda->judul_menu ?></a>
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
					<!--<p class="display-6 color-d">Hello, world!</p>-->
					<h1 class="intro-title mb-4"><?= $beranda->judul_beranda ?></h1>
					<p class="intro-subtitle"><span class="text-slider-items"><?= $beranda->deskripsi_beranda ?></span><strong class="text-slider"></strong></p>
					<!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#contact" role="button">Hubungi Saya</a></p> -->
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
											<p><span class="title-s">Nama: </span> <span><?= $biodata->nama ?></span></p>
											<p><span class="title-s">Email: </span> <span><?= $biodata->email ?></span></p>
											<p><span class="title-s">Phone: </span> <span><?= $biodata->telp ?></span></p>
											<p><span class="title-s">Domisili: </span> <span><?= $biodata->domisili ?></span></p>
										</div>
									</div>
								</div>
								<div class="skill-mf">
									<p class="title-s">Keahlian</p>
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
										<!-- end coba foto -->

										<!-- <embed src="<?php echo base_url(); ?>assets/img/<?= $biodata->cv ?>" type="application/pdf" width=100% height="300"></embed> -->
										<!-- <a href="https://drive.google.com/file/d/18RiZaLCp5Df43Ug6sYg4Wjsni0DmwxhI/view?usp=sharing" target="blank" class="btn btn-primary ">Lihat CV</a> -->
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
							Artikel
						</h3>
						<p class="subtitle-a">
							Lorem ipsum, dolor sit amet consectetur adipisicing elit.
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
	<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
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
										<form action="" method="post" role="form" class="contactForm">
											<div id="sendmessage">Your message has been sent. Thank you!</div>
											<div id="errormessage"></div>
											<div class="row">
												<div class="col-md-12 mb-3">
													<div class="form-group">
														<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
														<div class="validation"></div>
													</div>
												</div>
												<div class="col-md-12 mb-3">
													<div class="form-group">
														<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
														<div class="validation"></div>
													</div>
												</div>
												<div class="col-md-12 mb-3">
													<div class="form-group">
														<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
														<div class="validation"></div>
													</div>
												</div>
												<div class="col-md-12 mb-3">
													<div class="form-group">
														<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
														<div class="validation"></div>
													</div>
												</div>
												<div class="col-md-12">
													<button type="submit" class="button button-a button-big button-rouded">Send Message</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-6">
									<div class="title-box-2 pt-4 pt-md-0">
										<h5 class="title-left">
											Hubungi Saya
										</h5>
									</div>
									<div class="more-info">
										<p class="lead">
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem
											expedita aperiam aliquid at.
											Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis
											mollitia inventore?
										</p>
										<ul class="list-ico">
											<li><span class="ion-ios-location"></span> Lumajang - Jawa Timur - Indonesia</li>
											<li><span class="ion-ios-telephone"></span> 083-111-4040-12</li>
											<li><span class="ion-email"></span> fahrizarp01@gmail.com</li>
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