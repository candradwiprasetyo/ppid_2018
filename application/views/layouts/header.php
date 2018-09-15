<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title><?= $this->library->get_meta($meta['title'], 1) ?></title>
    <meta name="title" content="<?= $this->library->get_meta($meta['title'], 1) ?>">
		<meta name="description" content="<?= $this->library->get_meta($meta['description'], 4) ?>">
		<meta name="keywords" content="<?= $this->library->get_meta($meta['keyword'], 3) ?>">
		<meta name="author" content="DDTCNews">
		<?php
	  	if ($this->router->class == 'other_page') {
	  	?>
	  	<link rel="image_src" href="https://news.ddtc.co.id/assets/images/unduh_kajian.png">
	  	<?php
	  	} else {
	  	?>
		<link rel="image_src" href="<?= $this->library->get_meta($meta['image'], 2) ?>">
		<?php
		}
		?>
		<!-- facebook -->
		<meta property="og:site_name" content="<?= $this->library->get_meta($meta['title'], 1) ?>">
		<meta property="og:type" content="article">
		<meta property="og:url" content="<?= base_url(uri_string()); ?>">

		<?php
	  	if ($this->router->class == 'other_page') {
	  	?>
	  	<meta property="og:image" content="https://news.ddtc.co.id/assets/images/unduh_kajian.png">
	  	<?php
	  	} else {
	  	?>
		<meta property="og:image" content="<?= $this->library->get_meta($meta['image'], 2) ?>">
		<?php
		}
		?>
		<meta property="og:description" content="<?= $this->library->get_meta($meta['description'], 4) ?>">
		<meta property="og:title" content="<?= $this->library->get_meta($meta['title'], 1) ?>">
		<meta property="fb:pages" content="1814331908795344" />
		<meta property="fb:article_style" content="DDTCNews">

		<!-- twitter -->
		<meta name="twitter:title" content="<?= $this->library->get_meta($meta['title'], 1) ?>">
		<meta name="twitter:description" content="<?= $this->library->get_meta($meta['description'], 4) ?>">
		<meta name="twitter:card" content="summary_large_image">

		<?php
	  	if ($this->router->class == 'other_page') {
	  	?>
	  	<meta name="twitter:image" content="https://news.ddtc.co.id/assets/images/unduh_kajian.png">
	  	<?php
	  	} else {
	  	?>
		<meta name="twitter:image" content="<?= $this->library->get_meta($meta['image'], 2) ?>">
		<?php
		}
		?>
		
		<meta name="robots" content="nofollow">
		<meta http-equiv="refresh" content="360">
		<link rel="icon" href="<?= base_url() ?>assets/images/favicon_ppid.ico" type="image/x-icon">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#F77B04">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#F77B04">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> -->
	


    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css?v=14" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/tooltip-viewport.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/raleway.css?family=Raleway" rel="stylesheet"> <!-- 
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->

    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>

    <!-- Function -->
    <script src="<?= base_url() ?>assets/js/function.js?v=9"></script>

    <!-- video slider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/video_slider2/app.css">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W9JBHQH');</script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript">
    	function menuHeader(link) {
			window.location.href = link;
		}
    </script>

    <script async='async' src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>


    <link rel="manifest" href="/manifest.json">
	  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async></script>
	  <script>
	    var OneSignal = window.OneSignal || [];
	    OneSignal.push(["init", {
	      appId: "9bb72fba-163f-41ab-8347-78319793e632",
	      autoRegister: true,
	      notifyButton: {
	        enable: false /* Set to false to hide */
	      }
	    }]);
	  </script>
   
  </head>

  <body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W9JBHQH"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->  
  
  <!-- Facebook Instant Article -->
    <script>
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '555655141440936',
      xfbml      : true,
      version    : 'v2.11'
    });
    FB.AppEvents.logPageView();
    };

    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=555655141440936';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    
  	<!-- Header -->
  	<div class="c-menu-overlay"></div>
  	<div class="c-header c-main-desktop">
  		<div class="container">
  			<div class="row row-no-margin">
	  			<div class="col-sm-6 col-md-6">
	  				<div class="c-logo c-main-desktop">
	  					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo_ppid.png""></a>
	  				</div>
	  				<div class="c-logo c-main-mobile">
	  					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/logo_ppid.png""></a>
	  				</div>
	  			</div>
	  			<div class="col-sm-6 col-md-6">
	  				<div class="c-header__title">
	  					
	  					<div class="u-mrgn-bottom--20"></div>
	  					<div class="title c-main-desktop">(031) 3537537 <i class="fa fa-phone" style="margin-left: 20px;"></i></div>
	  					<div class="c-main-desktop">
		  						<div class="email">
		  							invest@bpm.jatimprov.go.id <i class="fa fa-envelope" style="margin-left: 20px;"></i>
		  						</div>
								<div class="date">
									<span id="demonew"></span> | <span id="demo"></span>
								</div>
							
								<div class="c-header__title__icon--mobile">
			  					<a href="https://www.facebook.com/ddtcnews/" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div></a>
			  					<a href="https://twitter.com/DDTCNews" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div></a>
			  					<a href="https://www.instagram.com/ddtcnews/" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/instagram-white.png"></div></a>
			  					<a href="https://line.me/R/ti/p/%40rfn2506a" target="_blank"><div class="c-icon"><img src="<?= base_url() ?>assets/images/line-white.png"></div></a>
			  				</div>
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
  	<div class="c-left-side-banner u-banner-name">
  		<?php foreach($left_banner as $key => $row){ ?>
  			<a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
  				<img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
  			</a>
  		<?php } ?>
  	</div>
  	<div class="c-right-side-banner u-banner-name">
  		<?php foreach($right_banner as $key => $row){ ?>
  			<a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
  				<img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
  			</a>
  		<?php } ?>
  	</div>
  	<?php
  	}
  	?>

  	<!-- header mobile -->
  	<div class="c-header-mobile" style="background: #eee">
  		<nav class="navbar navbar-inverse c-menu-mobile">
	      <div>
	        <div class="navbar-header">
	        	<div class="new-icon"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/mlogo.png""></a></div>
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#" id="search-mobile"><span class="fa fa-search fa-2x home-button-mobile"></span></a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
	          <ul class="nav navbar-nav">
	            <?php 
							$c_header = $this->library->get_header_category(); 
							foreach($c_header as $key => $row_c_header){ 
							?>
	            <li class="dropdown menu-dropdown">
	            	<a href="<?= base_url().$row_c_header->SEO ?>">
		            <div class="menu-dropdown__left">
		              	<?= ucwords(strtolower($row_c_header->CATEGORY_NAME)) ?>
			        </div>
			        </a>
		            <div href="#" class="dropdown-toggle  menu-dropdown__right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
			            <span class="fa fa-plus"></span>
		            </div>
		            <div class="u-clear"></div>
		        	
		        	
		            <ul class="dropdown-menu">
	              	
	              	<?php
									$sc_header = $this->library->get_header_subcategory($row_c_header->ID); 
									foreach($sc_header as $key => $row_sc_header){ 
									?>
	                <!-- <li class="dropdown-header">Nav header</li> -->
	                <li>
	                	<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
										<a href="<?= $row_sc_header->URL; ?>">
											<?= ucwords($row_sc_header->SUBCATEGORY_NAME); ?>
										</a>
										<?php } else { ?>
										<a href="<?= base_url().$row_c_header->SEO."/".$row_sc_header->SEO; ?>">
											<?= ucwords($row_sc_header->SUBCATEGORY_NAME); ?>
										</a>
										<?php } ?>
	                </li>
	                <?php } ?>

	                

	                <!-- <li role="separator" class="divider"></li> -->
	              </ul>
	            </li>
	            <?php if($row_c_header->SEO=='review'){ ?>
	            	<li class="fokus"><a href="<?= base_url() ?>fokus">Fokus</a></li>
	            <?php
	        	}
	          	}
	            ?>
				<li class="fokus"><a href="<?= base_url() ?>review/reportase">Reportase</a></li>
	            <li class="dropdown menu-dropdown">
	              <a href="<?= base_url().'indeks/all' ?>">
		            <div class="menu-dropdown__left">
		              	Indeks
			        </div>
			        </a>
		            <div href="#" class="dropdown-toggle  menu-dropdown__right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  
			            <span class="fa fa-plus"></span>
		            </div>
		            <div class="u-clear"></div>

	              <ul class="dropdown-menu dropdown-scroll">
	              	
	              	<?php
									$c_header = $this->library->get_header_category(); 
									foreach($c_header as $key => $row_c_header){
									?>
	                <!-- <li class="dropdown-header">Nav header</li> -->
	                <li class="li-header">
	                	<a href="<?= base_url().'indeks/'.$row_c_header->SEO ?>"><?= ucfirst(strtolower($row_c_header->CATEGORY_NAME)) ?></a>
	                </li>
	                	
              		<?php
									$sc_header = $this->library->get_header_subcategory($row_c_header->ID); 
									foreach($sc_header as $key => $row_sc_header){ 
									?>
									<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
									<li><a href="<?= $row_sc_header->URL; ?>">&nbsp;&nbsp;&nbsp;<?= ucfirst(strtolower($row_sc_header->SUBCATEGORY_NAME)) ?></a></li>
									<?php } else { ?>
									<li><a href="<?= base_url().'indeks/'.$row_sc_header->SEO ?>">&nbsp;&nbsp;&nbsp;<?= ucfirst(strtolower($row_sc_header->SUBCATEGORY_NAME)) ?></a></li>
									<?php } ?>
									<?php } ?>
	                	
	                </li>
	                
	                <?php } ?>
	                <!-- <li role="separator" class="divider"></li> -->
	              </ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>
	    <div class="c-header-mobile-shadow"></div>
	    <div class="c-search-mobile">
	    	<form action='<?= base_url() ?>search' method='get'>
	    		<div class="container">
	    			<input type="text" class="searchfield" placeholder="Ketikkan kata kunci" required name="q">
	    		</div>
	    	</form>
	    </div>
  	</div>



  	<div class="c-menu">
  		<div class="container c-header-desktop">
  		<!-- Menu -->
			
				<a href="<?= base_url() ?>"><span class="fa fa-home home-button"></span></a>

				<?php 
				$c_header = $this->library->get_header_category(); 
				foreach($c_header as $key => $row_c_header){ 
				if ($key == 2) { ?>
				<a href="<?= base_url() ?>fokus"><div class="item-exception">Fokus</div></a>
				<?php
				} else {
				?>
				<div class="line">&nbsp;</div>
				<?php
				}
				?>
				<div class="item <?php if($this->router->class == $row_c_header->SEO){ echo "item--active"; }?>"><a><div onclick="menuHeader('<?= base_url().$row_c_header->SEO ?>')"><?= ucfirst(strtolower($row_c_header->CATEGORY_NAME)) ?></div></a>

					<div class="item-content">	
						<div class="container">
							<div class="item-content-background">
						<div class="row row-no-margin">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-md-12">
									<div class="u-bg-yellow" style="padding: 20px 0">
									<?php
									$sc_header = $this->library->get_header_subcategory($row_c_header->ID); 
									foreach($sc_header as $key => $row_sc_header){ 
									?>

									<div class="sub-item">
										<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
										<a href="<?= $row_sc_header->URL; ?>">
											<?= $row_sc_header->SUBCATEGORY_NAME; ?>
										</a>
										<?php } else { ?>
										<a href="<?= base_url().$row_c_header->SEO."/".$row_sc_header->SEO; ?>">
											<?= $row_sc_header->SUBCATEGORY_NAME; ?>
										</a>
										<?php } ?>
									</div>

									<?php
									}
									?>
									
									
									</div>
									</div>
								</div>
							</div>
							<?php
							$news_header = $this->library->get_news_header($row_c_header->ID); 
							foreach($news_header as $key => $row_news_header){ 
							?>
							<div class="col-xs-3">
				        <div class="c-main-photo c-main-photo--small-fixed">
				         <a href="<?= base_url().$this->library->get_url_news($row_news_header->ID, $row_news_header->TITLE); ?>">
				         	<?php
				         	if ($row_c_header->SEO == '' || $row_sc_header->SEO == '') {
				         	?>
				         	<img src="<?= $this->library->get_image($row_news_header->IMAGE, 2); ?>">
				         	<?php
				         	} else {
				         	?>
				         	<img src="<?= $this->library->get_image($row_news_header->IMAGE, 1); ?>">
				         	<?php
				         	}
				         	?>
				         </a>
					         
				        </div>
				        <?php
				        if ($row_c_header->ID==0 || $row_sc_header->SEO == ''){
				        ?>
				        <div class="u-mrgn-bottom--20"></div>
				        
				        <?php
				    	} else {
				    	?>
				    	<div class="c-border-bottom u-mrgn-bottom--20 ">
				          <div class="left"></div>
				          <div class="right"></div>
				        </div>
				    	<?php
				    	}
				        ?>
				        
				        <div class="c-main-article">
				          
				          <div class="date"><?= $this->library->format_date($row_news_header->PUBLISH_TIMESTAMP); ?></div>
	                <div class="tag"><?= $row_news_header->UPPERDECK; ?></div>
	                <div class="title title-medium "><a href="<?= base_url().$this->library->get_url_news($row_news_header->ID, $row_news_header->TITLE); ?>"><?= $row_news_header->TITLE; ?></a>
	              </div>
				        </div>
				        
				      </div>
				      <?php
				    	}
				      ?>  
						</div>
					</div>
				</div>
				</div>

				</div>
				
				<?php
				}
				?>
				<a href="<?= base_url() ?>review/reportase"><div class="item-exception">Reportase</div></a>
				<div class="item-index"><div onclick="menuHeader('<?= base_url() ?>indeks/all')"><span class="fa fa-navicon"></span> Indeks</div>

					<div class="item-content">
						<div class="container">
						

						<div class="row row-no-margin">
							
							<?php
							$c_header = $this->library->get_header_category(); 
							foreach($c_header as $key => $row_c_header){ 
							if ($key == 0) {
							?>
							<div class="col-xs-6">	
								<div class="row row-no-margin">  
									<?php
									} else if ($key == 3){ ?>
									<div class="col-xs-6">	
										
									<div class="row row-no-margin">  
									<?php } ?>
									<div class="col-xs-4" style="padding: 0;">									
									<div class="u-bg-yellow u-pad u-mrgn-bottom--20" style="padding-left: 0;">	
									<div class="sub-item-title"><a href="<?= base_url().'indeks/'.$row_c_header->SEO ?>"><?= ucfirst(strtolower($row_c_header->CATEGORY_NAME)) ?></a></div>
									</div>

										<?php
										$sc_header = $this->library->get_header_subcategory($row_c_header->ID);
										foreach($sc_header as $key_sc => $row_sc_header) { 
										?>
										<div class="sub-item">
											<?php if(($row_sc_header->ID >= 22 && $row_sc_header->ID <= 25)  || ($row_sc_header->ID >= 35 && $row_sc_header->ID <= 36)){ ?>
											<a href="<?= $row_sc_header->URL; ?>"><?= $row_sc_header->SUBCATEGORY_NAME?></a>
											<?php } else { ?>
											<a href="<?= base_url().'indeks/'.$row_sc_header->SEO; ?>"><?= $row_sc_header->SUBCATEGORY_NAME?></a>
											<?php } ?>
										</div>
										<?php } ?>
										
									</div>
									<?php
									if ($key == 5 || $key == 2) {
									?>
								</div>
						      </div>
						      <?php
						    	}
						    	}
						      ?>
						    </div>
						</div>
						</div>
					</div>
				</div>
			</div> 
		</div>

	</div>

		<div class="container js-container">
