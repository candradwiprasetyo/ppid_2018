<?php foreach($news_detail as $key => $row){ ?>
<div class="row">
	<div class="col-md-12">
		<span class="u-txt--small">
			<a href="<?php echo $get_data_readcrumb[0]['category_seo'] ?>"style="text-transform: none;color:#666;text-decoration-line: none;font-weight: 600;">
				<?php echo $get_data_readcrumb[0]['category_name'] ?>
			</a>
			<span class="u-pad-left--10 u-pad-right--10 u-txt--bold">></span>
			<a href="<?php echo $get_data_readcrumb[0]['category_seo']."/".$get_data_readcrumb[0]['subcategory_seo'] ?>" style="text-transform: none;color:#666;text-decoration-line: none;font-weight: 600;">
				<?php echo $get_data_readcrumb[0]['subcategory_name'] ?>
			</a>
			
		</span>
	</div>
</div>
<?php } ?>
