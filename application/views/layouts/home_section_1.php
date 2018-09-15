<?php
/*
if (count($popup)>0){
?>
<script>
	function openPopup() {
	  window.location.hash = 'openModal';
	}
	window.onload = openPopup;
</script>
<?php
}*/
?>
<!-- Main banner -->
<div class="row c-main-desktop" id="row_section_1">
	<div class="col-md-12">
		<div class="c-main-banner u-banner-name">
			<div class="c-button-hide" id="c-button-hide">HIDE</div>
			<div id="hero-carousel" class="carousel-top slide carousel-fade">
			  <div class="carousel-inner">
			    <?php foreach($header_banner as $key => $row){ ?>
			    <div class="item <?php if ($key==0) { echo 'active'; } ?>">
			      <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
			      	<img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
			      </a>
			    </div>
			    <?php
			  	}
			    ?>
			  </div>
			</div>
		</div>
	</div>
</div>

<!-- <div id="openModal" class="modalDialog">
  <div>
		<a href="#close" title="Close" class="close">X</a>

		<?php foreach($popup as $key => $row){ ?>
			<a href="<?= $row->URL ?>" target="_blank">
				<img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
			</a>
		<?php } ?>
  </div>
</div>	 -->
