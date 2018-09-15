<div class="c-main-mobile">
	<?php
	$counter_content_mobile = 0;
	$counter_read_too_mobile = 3;
	if (count($content) > 5) { 
	?>
	<div>
		<?php 
		for ($i_content = 2; $i_content < 5; $i_content++) {
			echo $this->library->get_news_url_replace($content[$i_content])." ";

			if ($counter_read_too_mobile%3==0) {
			if (isset($read_too[$counter_content_mobile]->TITLE)) {
			?>
				<div class="c-detail-article__read-too" id="c-detail-article__read-too-mobile-<?= $counter_content_mobile?>">
					Baca Juga: 
					<a href="<?= base_url().$this->library->get_url_news($read_too[$counter_content_mobile]->ID, $read_too[$counter_content_mobile]->TITLE); ?>">
					<?php

					echo $read_too[$counter_content_mobile]->TITLE 

					?>
					</a>
				</div>
			<?php
			}
			$counter_content_mobile++;
		}
		$counter_read_too_mobile++;
		
		}
		?>
	</div>
	<?php
	} else {
	?>
	<div>
		<?php 
		$counter_content_mobile = 0;
		$counter_read_too_mobile = 3;
		for ($i_content = 2; $i_content < count($content); $i_content++) {
			echo $this->library->get_news_url_replace($content[$i_content])." ";
			if ($counter_read_too_mobile%3==0) {
			if (isset($read_too[$counter_content_mobile]->TITLE)) {
			?>
				<div class="c-detail-article__read-too" id="c-detail-article__read-too-mobile-<?= $counter_content_mobile?>">
					Baca Juga: 
					<a href="<?= base_url().$this->library->get_url_news($read_too[$counter_content_mobile]->ID, $read_too[$counter_content_mobile]->TITLE); ?>">
					<?php

					echo $read_too[$counter_content_mobile]->TITLE 

					?>
					</a>
				</div>
			<?php
			}
			$counter_content_mobile++;
		}
		$counter_read_too_mobile++;
		
		}
		?>
	</div>
	<?php
	}
	?>

	<div class="paralax_div">
	  <div>
	    <div>
	      <div>
	      	<div class="c-google-ads-fixed">
		        
		        <!-- detailberita1-news-336x280 -->
		        <ins class="adsbygoogle"
		            style="display:inline-block;width:336px;height:280px"
		            data-ad-client="ca-pub-1783522418730843"
		            data-ad-slot="7539711426">
		        </ins>
		        <script>
		        (adsbygoogle = window.adsbygoogle || []).push({});
		        </script>
		    </div>
	      </div>
	    </div>
	  </div>
	<span class="clear"/>
	</div>

	<div class="c-content-on-ads">
		<?php 
		$counter_read_too_mobile = 3;
		for ($i_content = 5; $i_content < count($content); $i_content++) {
			echo $this->library->get_news_url_replace($content[$i_content])." ";
			if ($counter_read_too_mobile%3==0) {
			if (isset($read_too[$counter_content_mobile]->TITLE)) {
			?>
				<div class="c-detail-article__read-too" id="c-detail-article__read-too-mobile-<?= $counter_content_mobile?>">
					Baca Juga: 
					<a href="<?= base_url().$this->library->get_url_news($read_too[$counter_content_mobile]->ID, $read_too[$counter_content_mobile]->TITLE); ?>">
					<?php

					echo $read_too[$counter_content_mobile]->TITLE 

					?>
					</a>
				</div>
			<?php
			}
			$counter_content_mobile++;
		}
		$counter_read_too_mobile++;
		}
		?>
	</div>

</div>

<script type="text/javascript">
	<?php
	if ($counter_content_mobile>1) {
	?>
	$("#c-detail-article__read-too-mobile-<?= $counter_content_mobile-1 ?>").hide();
	<?php
	}
	?>
</script>