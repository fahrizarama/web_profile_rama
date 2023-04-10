<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Fernandes Raymond</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assetsfront/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assetsfront/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="<?php echo base_url('Frontend_c/') ?>"><?= $beranda->judul_menu ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url('Frontend_c/') ?>">Beranda</a>
          </li>
          <li class="nav-item">
						<a class="nav-link js-scroll" href="#about">Tentang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#service">Pekerjaan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#work">Pengalaman</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll" href="#blog">Artikel</a>
					</li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Detail Artikel</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url('Frontend_c/') ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">Detail Artikel</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->
  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="post-box">
            <div class="post-thumb">
              <img src="<?= base_url('assets/img/' . $detail_artikel['foto_artikel']); ?>" class="img-fluid" alt="">
            </div>
            <div class="post-meta">
              <h1 class="article-title"><?php echo $detail_artikel['judul_artikel'] ?></h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#"><?php echo $detail_artikel['penulis'] ?></a>
                </li>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php echo $detail_artikel['total_dilihat'] ?></a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#"><?php echo $detail_artikel['nama_kategori'] ?></a>
                </li>
                <!-- <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php echo $detail_artikel['penulis'] ?></a>
                </li> -->
              </ul>
            </div>
            <div class="article-content">
              <p>
                <?php echo $detail_artikel['deskripsi'] ?>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">
                <?php foreach ($artikel as $data) { ?>
                  <li>
                    <a href="<?php echo base_url('Frontend_c/detail_artikel/') . $data['id_artikel'] ?>"><?= $data['judul_artikel'] ?></a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

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
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url(); ?>assetsfront/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url(); ?>assetsfront/js/main.js"></script>

</body>

</html>