<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico"> -->

    <title>DDTC News</title>
    <meta name="title" content="DDTC News">
		<meta name="description" content="DDTC News">
		<meta name="keywords" content="DDTC News">
		<meta property="og:site_name" content="DDTCNews">
		<meta property="og:type" content="article">
		<meta property="og:url" content="">
		<meta property="og:image" content="">
		<meta property="og:description" content="">
		<meta property="og:title" content="">
		<link rel="image_src" href="<?= base_url() ?>assets/images/favicon.ico">
		
		<meta name="robots" content="nofollow">
		<meta http-equiv="refresh" content="360">
		<link rel="canonical" href="">    
		<link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    

    <!-- <script src="<?= base_url() ?>assets/js/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Function -->
    <script src="<?= base_url() ?>assets/js/function.js"></script>

    <!-- video slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/video_slider/jquery.carousel-3d.default.css">
  <script src="<?= base_url() ?>assets/js/video_slider/jquery.resize.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.waitforimages/2.2.0/jquery.waitforimages.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <script src="<?= base_url() ?>assets/js/video_slider/jquery.carousel-3d.js"></script>
    
  </head>

  <body>
  	<!-- Header -->
  	<div class="c-menu-overlay"></div>
  	<div class="c-header">
  		<div class="container">
  			<div class="row row-no-margin">
	  			<div class="col-sm-6 col-md-6">
	  				<div class="c-logo">
	  					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png""></a>
	  				</div>
	  			</div>
	  			<div class="col-sm-6 col-md-6">
	  				<div class="c-header__title">
	  					<a href="https://www.facebook.com/ddtcnews/" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div></a>
	  					<a href="https://twitter.com/DDTCNews" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div></a>
	  					<a href="https://www.instagram.com/ddtcnews/" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/instagram-white.png"></div></a>
	  					<a href="https://line.me/R/ti/p/%40rfn2506a" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/line-white.png"></div></a>
	  					<div class="u-clear"></div>
	  					<div class="title">Trusted Indonesian Tax News Portal</div>
	  					<div class="search">
							  <span class="fa fa-search"></span>
							  <input placeholder="Ketik kata kunci">
							</div>
							<div class="date">
								<span id="demonew"></span> | <span id="demo"></span>
							</div>
	  				</div>
	  			</div>
	  		</div>
  		</div>
  	</div>

  	<!-- Side Banner -->
  	<?php
  	if ($this->router->class == 'home') {
  	?>
  	<div class="c-left-side-banner u-banner-name"><img src="<?= base_url() ?>assets/images/banner/left-banner.jpg"></div>
  	<div class="c-right-side-banner u-banner-name"><img src="<?= base_url() ?>assets/images/banner/right-banner.jpg"></div>
  	<?php
  	}
  	?>

  	<div class="container">
  		<!-- Menu -->
			<div class="c-menu">
				<a href="<?= base_url() ?>"><span class="fa fa-home home-button"></span></a>
				<div class="line">&nbsp;</div>
				<a href="<?= base_url() ?>news"><div class="item">Berita
					<div class="item-content">	
						<div class="row row-no-margin">
							<div class="col-md-3">
								<div class="row">
									<div class="sub-item">Nasional</div>
									<div class="sub-item">Daerah</div>
									<div class="sub-item">Internasional</div>
									<div class="sub-item">Infografis</div>
									<div class="sub-item">Foto</div>
									<div class="sub-item">Video</div>
								</div>
							</div>
							<?php
			        for ($i=1; $i<=3; $i++) {
			        ?>
							<div class="col-md-3">
				        <div class="c-main-photo u-mrgn-bottom--20">
				          <img src="<?= base_url() ?>assets/images/article/sample.jpg">
				        </div>
				        
				        <div class="c-main-article">
				          <div class="date date--white">Selasa, 30 Mei 2017 | 10:57</div>
				          <div class="tag">AKSES INFORMASI KEUANGAN</div>
				          <div class="title title-medium title--white">Perppu 1/2017 Pertajam Kewenangan Ditjen Pajak Kewenangan Ditjen Pajak</div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>

				</div>
				</a>
				<div class="line">&nbsp;</div>
				<a href="<?= base_url() ?>review"><div class="item">Review
					<div class="item-content">
						<div class="row row-no-margin">
							<div class="col-md-3">
								<div class="row">
									<div class="sub-item">Tajuk</div>
									<div class="sub-item">Analisis</div>
									<div class="sub-item">Wawancara</div>
									<div class="sub-item">Konsultasi</div>
									<div class="sub-item">Perspektif</div>
								</div>
							</div>
							<?php
			        for ($i=1; $i<=3; $i++) {
			        ?>
							<div class="col-md-3">
				        <div class="c-main-photo u-mrgn-bottom--20">
				          <img src="<?= base_url() ?>assets/images/article/sample.jpg">
				        </div>
				        
				        <div class="c-main-article">
				          <div class="date date--white">Selasa, 30 Mei 2017 | 10:57</div>
				          <div class="tag">AKSES INFORMASI KEUANGAN</div>
				          <div class="title title-medium title--white">Perppu 1/2017 Pertajam Kewenangan Ditjen Pajak Kewenangan Ditjen Pajak</div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>
				</div>
				</a>
				<div class="item-exception">Fokus</div>
				<div class="item">Literasi
					<div class="item-content">
						<div class="row row-no-margin">
							<div class="col-md-3">
								<div class="row">
									<div class="sub-item">Buku</div>
									<div class="sub-item">Kamus</div>
									<div class="sub-item">Kutipan</div>
									<div class="sub-item">Kelas Pajak</div>
									<div class="sub-item">Profil Negara</div>
								</div>
							</div>
							<?php
			        for ($i=1; $i<=3; $i++) {
			        ?>
							<div class="col-md-3">
				        <div class="c-main-photo u-mrgn-bottom--20">
				          <img src="<?= base_url() ?>assets/images/article/sample.jpg">
				        </div>
				        
				        <div class="c-main-article">
				          <div class="date date--white">Selasa, 30 Mei 2017 | 10:57</div>
				          <div class="tag">AKSES INFORMASI KEUANGAN</div>
				          <div class="title title-medium title--white">Perppu 1/2017 Pertajam Kewenangan Ditjen Pajak Kewenangan Ditjen Pajak</div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>
				</div>
				<div class="line">&nbsp;</div>
				<div class="item">Data & Alat
					<div class="item-content">
						<div class="row row-no-margin">
							<div class="col-md-3">
								<div class="row">
									<div class="sub-item">Kurs Pajak</div>
									<div class="sub-item">Peraturan Pajak</div>
									<div class="sub-item">Putusan Pengadilan</div>
									<div class="sub-item">P3B</div>
									<div class="sub-item">Putusan MA</div>
								</div>
							</div>
							<?php
			        for ($i=1; $i<=3; $i++) {
			        ?>
							<div class="col-md-3">
				        <div class="c-main-photo u-mrgn-bottom--20">
				          <img src="<?= base_url() ?>assets/images/article/sample.jpg">
				        </div>
				        
				        <div class="c-main-article">
				          <div class="date date--white">Selasa, 30 Mei 2017 | 10:57</div>
				          <div class="tag">AKSES INFORMASI KEUANGAN</div>
				          <div class="title title-medium title--white">Perppu 1/2017 Pertajam Kewenangan Ditjen Pajak Kewenangan Ditjen Pajak</div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>
				</div>
				<div class="line">&nbsp;</div>
				<div class="item">Komunitas
					<div class="item-content">
						<div class="row row-no-margin">
							<div class="col-md-3">
								<div class="row">
									<div class="sub-item">Agenda</div>
									<div class="sub-item">Humor</div>
									<div class="sub-item">Selebriti</div>
									<div class="sub-item">Kampus</div>
									<div class="sub-item">Quiz</div>
									<div class="sub-item">Lomba</div>
								</div>
							</div>
							<?php
			        for ($i=1; $i<=3; $i++) {
			        ?>
							<div class="col-md-3">
				        <div class="c-main-photo u-mrgn-bottom--20">
				          <img src="<?= base_url() ?>assets/images/article/sample.jpg">
				        </div>
				        
				        <div class="c-main-article">
				          <div class="date date--white">Selasa, 30 Mei 2017 | 10:57</div>
				          <div class="tag">AKSES INFORMASI KEUANGAN</div>
				          <div class="title title-medium title--white">Perppu 1/2017 Pertajam Kewenangan Ditjen Pajak Kewenangan Ditjen Pajak</div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>
				</div>
				<div class="item-index"><span class="fa fa-navicon"></span> Index
					<div class="item-content">
						<div class="row row-no-margin">
						
							<div class="col-md-7">	
								<div class="row row-no-margin">  
									<div class="col-md-4">
										<div class="sub-item-title">Berita</div>
										<div class="sub-item">Nasional</div>
										<div class="sub-item">Daerah</div>
										<div class="sub-item">Internasional</div>
										<div class="sub-item">Infografis</div>
										<div class="sub-item">Foto</div>
										<div class="sub-item">Video</div>
									</div>
									<div class="col-md-4">
										<div class="sub-item-title">Review</div>
										<div class="sub-item">Tajuk</div>
										<div class="sub-item">Analisis</div>
										<div class="sub-item">Wawancara</div>
										<div class="sub-item">Konsultasi</div>
										<div class="sub-item">Perspektif</div>
									</div>
									<div class="col-md-4">
										<div class="sub-item-title">Literasi</div>
										<div class="sub-item">Buku</div>
										<div class="sub-item">Kamus</div>
										<div class="sub-item">Kutipan</div>
										<div class="sub-item">Kelas Pajak</div>
										<div class="sub-item">Profil Negara</div>
									</div>
								</div>
				      </div>
				      <div class="col-md-5">	
								<div class="row row-no-margin">  
									<div class="col-md-7">
										<div class="sub-item-title">Data & Alat</div>
										<div class="sub-item">Kurs Pajak</div>
										<div class="sub-item">Peraturan Pajak</div>
										<div class="sub-item">Putusan Pengadilan</div>
										<div class="sub-item">P3B</div>
										<div class="sub-item">Putusan MA</div>
									</div>
									<div class="col-md-5">
										<div class="sub-item-title">Komunitas</div>
										<div class="sub-item">Agenda</div>
										<div class="sub-item">Humor</div>
										<div class="sub-item">Selebriti</div>
										<div class="sub-item">Kampus</div>
										<div class="sub-item">Quiz</div>
										<div class="sub-item">Lomba</div>
									</div>
								</div>
				      </div>
				        
						</div>
					</div>
				</div>
			</div> 
		</div>

		<div class="container js-container">

