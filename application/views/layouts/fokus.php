<!-- article -->
<div class="row">
	<div class="col-md-8">

			<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
			
			<!-- Cover large -->
			<?php 
			
			foreach($headline as $key_headline => $row_headline){ 
			foreach($headline_detail as $key => $row){ 
			$news = $this->News_model->get_news('', '1', '', '', '', $row->ARTICLE_ID);

			if ($key == 0) {
			?>
			<div class="row row-no-margin">
				<div class="col-md-12">
		        <div class="c-cover-slider-frame">
		              

		                <div class="c-cover c-cover-large">
		                  <a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
		                  	<img src="<?= $this->library->get_image($news[0]->IMAGE, 2); ?>"></a>
		                  </a>
		                  <div class="c-cover-overlay">
		                    <div class="title">
		                    	<a href="<?= base_url().'fokus/'.$this->library->get_url_focus($row_headline->ID, $row_headline->TITLE); ?>">
		                    		<?= $row_headline->TITLE; ?>
		                    	</a>
		                    </div>
		                   
		                  </div>
		                </div>
		                <div class="c-cover-border">
		                  <div class="border-left"></div>
		                  <div class="border-right"></div>
		                </div>

		                <div class="c-main-article">
		                	<div class="date"><?= $this->library->format_date($news[0]->PUBLISH_TIMESTAMP); ?></div>
		                    <div class="tag"><?= $news[0]->UPPERDECK; ?></div>
		                    <div class="title"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
		                    <div class="desc"><?= $this->library->get_taicing($news[0]->TAICING); ?></div>
		                </div>

		             
		              
		        </div>
					</div>
				</div>
				<?php
				}
				if ($key == 1) {
				?>
			
				<div class="row row-no-margin">
				<?php
				}
				if ($key == 1 || $key == 2) {
				?>
				<div class="col-md-6">
					<div class="c-cover c-cover-medium">
						<a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
							<img src="<?= $this->library->get_image($news[0]->IMAGE, 2); ?>"></a>
						</a>
						<div class="c-cover-overlay">
							<div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
						</div>
					</div>
					<div class="c-cover-border">
						<div class="border-left"></div>
						<div class="border-right"></div>
					</div>
				</div>
				<?php }
				if ($key == 2) {
				 ?>
			</div>
			<?php } } } ?>



			<div class="u-border--bottom u-mrgn-bottom--30"></div>
			
			<?php foreach($other as $key_other => $row_other){ 
			?>
			<div class="row">
				<div class="col-md-12">
				<?php if ($key_other%2==0){ ?>
				<div class="u-bg-yellow u-pad">
				<?php } else { ?>
				<div class="u-bg-grey u-pad">
				<?php } ?>
					<div class="c-main-title c-main-title--capitalize u-mrgn-top--0">
            <span><img src="<?= base_url() ?>assets/images/focus-icon.png" width="50"></span>
            	<a href="<?= base_url().'fokus/'.$this->library->get_url_focus($row_other->ID, $row_other->TITLE); ?>"><?= $row_other->TITLE ?></a>
          </div>
			<?php
			$other_detail = $this->News_model->get_focus_news('', '3', $row_other->ID);
			foreach($other_detail as $key => $row){ 
			$news = $this->News_model->get_news('', '1', '', '', '', $row->ARTICLE_ID);
			?>
	      
	      	<div class="c-main-article">
						<div class="row row-no-margin">
							<div class="col-md-2">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
										<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 1); ?>"></a>
										<?php } else { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 2); ?>"></a>
										<?php } ?>
									</a>
									
								</div>
								<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									<?php } ?>
							</div>
							<div class="col-md-10">
								<div class="date"><?= $this->library->format_date($news[0]->PUBLISH_TIMESTAMP); ?></div>
              	<div class="tag"><?= $news[0]->UPPERDECK; ?></div>
              	<div class="title"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	
	    	<?php
	    	}
	    	?>
	    	</div>
	    	</div>
	    	</div>
	    	<?php
	      }
	      ?>

	     
	      <?php /*
	      <?php foreach($other2 as $key_other => $row_other){ 
			?>
			<div class="row fokus-list-2" style="display: none;">
				<div class="col-md-12">
				<?php if ($key_other%2==0){ ?>
				<div class="u-bg-yellow u-pad">
				<?php } else { ?>
				<div class="u-bg-grey u-pad">
				<?php } ?>
					<div class="c-main-title c-main-title--capitalize u-mrgn-top--0">
            <span><img src="<?= base_url() ?>assets/images/focus-icon.png" width="50"></span>
            	<a href="<?= base_url().'fokus/'.$this->library->get_url_focus($row_other->ID, $row_other->TITLE); ?>"><?= $row_other->TITLE ?></a>
          </div>
			<?php
			$other_detail = $this->News_model->get_focus_news('', '3', $row_other->ID);
			foreach($other_detail as $key => $row){ 
			$news = $this->News_model->get_news('', '1', '', '', '', $row->ARTICLE_ID);
			?>
	      
	      	<div class="c-main-article">
						<div class="row row-no-margin">
							<div class="col-md-2">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
										<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 1); ?>"></a>
										<?php } else { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 2); ?>"></a>
										<?php } ?>
									</a>
									
								</div>
								<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									<?php } ?>
							</div>
							<div class="col-md-10">
								<div class="date"><?= $this->library->format_date($news[0]->PUBLISH_TIMESTAMP); ?></div>
              	<div class="tag"><?= $news[0]->UPPERDECK; ?></div>
              	<div class="title"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	
	    	<?php
	    	}
	    	?>
	    	</div>
	    	</div>
	    	</div>
	    	<?php
	      }
	      ?>

	  

	      <?php foreach($other3 as $key_other => $row_other){ 
			?>
			<div class="row fokus-list-3" style="display: none;">
				<div class="col-md-12">
				<?php if ($key_other%2==0){ ?>
				<div class="u-bg-yellow u-pad">
				<?php } else { ?>
				<div class="u-bg-grey u-pad">
				<?php } ?>
					<div class="c-main-title c-main-title--capitalize u-mrgn-top--0">
            <span><img src="<?= base_url() ?>assets/images/focus-icon.png" width="50"></span>
            	<a href="<?= base_url().'fokus/'.$this->library->get_url_focus($row_other->ID, $row_other->TITLE); ?>"><?= $row_other->TITLE ?></a>
          </div>
			<?php
			$other_detail = $this->News_model->get_focus_news('', '3', $row_other->ID);
			foreach($other_detail as $key => $row){ 
			$news = $this->News_model->get_news('', '1', '', '', '', $row->ARTICLE_ID);
			?>
	      
	      	<div class="c-main-article">
						<div class="row row-no-margin">
							<div class="col-md-2">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>">
										<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 1); ?>"></a>
										<?php } else { ?>
										<img src="<?= $this->library->get_image($news[0]->IMAGE, 2); ?>"></a>
										<?php } ?>
									</a>
									
								</div>
								<?php if ($news[0]->SUBCATEGORY != '21' && $news[0]->SUBCATEGORY != '10' && $news[0]->SUBCATEGORY != '12') { ?>
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									<?php } ?>
							</div>
							<div class="col-md-10">
								<div class="date"><?= $this->library->format_date($news[0]->PUBLISH_TIMESTAMP); ?></div>
              	<div class="tag"><?= $news[0]->UPPERDECK; ?></div>
              	<div class="title"><a href="<?= base_url().$this->library->get_url_news($news[0]->ID, $news[0]->TITLE); ?>"><?= $news[0]->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	
	    	<?php
	    	}
	    	?>
	    	</div>
	    	</div>
	    	</div>
	    	<?php
	      }
	      ?>


    		 <div class="circle-animation" id="circle-animation"></div>
		*/
    	?>

    	
	        <div class="c-pagination">

	        	
	        	<?php if($data['page']==2) { ?>
	        		<a href="<?= base_url() ?>fokus" class="c-pagination__item c-pagination__item--active">Prev</a> 
	        	<?php
	        	} elseif($data['page']>2) {
				?>
	        		<a href="<?= base_url() ?>fokus/page/<?= $data['page']-1 ?>" class="c-pagination__item c-pagination__item--active">Prev</a> 
	        	<?php
	        	}
	        	?>
	        	<?php if(count($data['next_focus'])>0) { ?>
	        	<a href="<?= base_url() ?>fokus/page/<?= $data['page']+1 ?>" class="c-pagination__item c-pagination__item--active">Next</a> 
	        	<?php
	        	}
	        	?>
	        </div>
	    
		

	</div>
	<div class="col-md-4">
		<div class="row c-main-desktop u-mrgn-top--30" style="margin-left: 10px;">
			
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

<script type="text/javascript">
	$(function(){

		$(document).on('scroll', function() {
			// console.log($(this).scrollTop());
			// console.log(($('#circle-animation-1').position().top - 650));
			if ($(".fokus-list-2").css("display") == "none" && $(".fokus-list-3").css("display") == "none") {
				if( $(this).scrollTop() >= ($('#circle-animation').position().top - 650)){
					$(".fokus-list-2").delay(1500).fadeIn(500);
					
				}
			} else if( $(".fokus-list-2").css("display") != "none"){
				if( $(this).scrollTop() >= ($('#circle-animation').position().top - 650)){
					$("#circle-animation").delay(1000).fadeOut(500);
					$(".fokus-list-3").delay(1500).fadeIn(500);
				}
			}
			
		});
	});
</script>

