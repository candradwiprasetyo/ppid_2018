<?php
if($this->router->fetch_method() == 'preview') {
?>
<div class="c-notification u-mrgn-bottom--20">
	<div class="row row-no-margin">
		<div class="col-md-8 u-pad-bottom--10">Ini adalah halaman preview. </div>
		<div class="col-md-4"><a href="<?= base_url() ?>webmin/berita/edit/<?= $row->ID?>" class="btn btn-primary">Kembali Ke Webmin</a></div>
	</div>
</div>
<?php
}
?>