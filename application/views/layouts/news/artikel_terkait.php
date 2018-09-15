<div>
	<div class="c-main-title">artikel terkait</div>
	<div class="row row-no-margin">
	<?php
	foreach($artikel_terkait as $key => $row){
		
			?>
			
			
  		<div class="col-md-6">
  			<div class="c-main-article">
				<div class="row row-no-margin">
					<div class="col-xs-4">
						<div class="c-main-photo">
							<a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
								<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
								<img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
								<?php } else { ?>
								<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
								<?php } ?>
							</a>
						</div>
						<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
						<div class="c-border-bottom">
							<div class="left"></div>
							<div class="right"></div>
						</div>
						<?php } ?>
					</div>
					<div class="col-xs-8">
						<div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
						<div class="tag"><?= $row->UPPERDECK; ?></div>
						<div class="title title-artikel-terkait"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
					</div>
					<div class="u-clear"></div>
				</div>
			</div>
		</div>
		
			
		
	<?php
  	}
  	?>
</div></div>