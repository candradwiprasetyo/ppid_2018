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