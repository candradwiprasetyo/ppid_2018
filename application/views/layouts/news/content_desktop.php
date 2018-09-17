<div class="c-main-desktop">
	<?php
	$counter_content = 0;
	$counter_read_too = 3;
	for ($i_content = 2; $i_content < count($content); $i_content++) {
		echo $this->library->get_news_url_replace($content[$i_content])." ";
		if ($counter_read_too%3==0) {
			if (isset($read_too[$counter_content]->TITLE)) {
			?>
				<!-- <div class="c-detail-article__read-too" id="c-detail-article__read-too-<?= $counter_content?>">
					Baca Juga: 
					<a href="<?= base_url().$this->library->get_url_news($read_too[$counter_content]->ID, $read_too[$counter_content]->TITLE); ?>">
					<?php

					echo $read_too[$counter_content]->TITLE 

					?>
					</a>
				</div> -->
			<?php
			}
			$counter_content++;
		}
		$counter_read_too++;
		
	}
	?>
</div>

<script type="text/javascript">
	<?php
	if ($counter_content>1) {
	?>
	$("#c-detail-article__read-too-<?= $counter_content-1 ?>").hide();
	<?php
	}
	?>
</script>