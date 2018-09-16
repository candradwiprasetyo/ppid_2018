<?php $this->load->view('layouts/news/style'); ?>

<input type="hidden" value="<?= $news_detail[0]->ID ?>" id="i_article_id">

<div class="row u-mrgn-top--20">
	<div class="col-md-8">
		<?php foreach($news_detail as $key => $row){ ?>
		<div class="c-detail-article">
			
			<?php $this->load->view('layouts/news/preview', $array = array('row' => $row)); ?>

			<?php $this->load->view('layouts/breadcrumb'); ?>

			<?php $this->load->view('layouts/news/head_article'); ?>

			<?php 
			// jika ngga lomba, analisis, perpektif, konsultasi
			if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') {

				// jika ngga video
				if ($row->SUBCATEGORY!=28) {
				?>

				<div class="c-main-photo c-main-photo--original">
					<img src="<?= $this->library->get_image($row->IMAGE, 3); ?>">
				</div>

				<div class="c-border-bottom u-mrgn-bottom--20">
			        <div class="left"></div>
			        <div class="right"></div>
			    </div>
			    <?php
				}
				?>

				<?php if($row->CAPTION){ ?>
				<div class="c-main-tag"><?= $row->CAPTION; ?></div>
				<?php } ?>

				<?php
				//$row->content = $this->library->get_news_url_replace($row->CONTENT);
				$content = explode("</p>", $row->CONTENT);
				if (count($content) > 1) {
				?>
				
				<div class="c-detail-article__description">
					<?php
					for ($i_content = 0; $i_content < 2; $i_content++) {
						echo $this->library->get_news_url_replace($content[$i_content]." ");
					}
					?>
				</div>
				<div class="c-detail-article__description">
					<?php
					if (count($editorpick) > 0 && $row->SUBCATEGORY!=28) {
					?>
					<?php // $this->load->view('layouts/news/pilihan_redaksi') ?>

					<?php } ?>

					<!-- content desktop -->
					
					<?php $this->load->view('layouts/news/content_desktop', $array = array('content' => $content)); ?>
					

					<!-- content mobile -->
					<?php $this->load->view('layouts/news/content_mobile', $array = array('content' => $content)); ?>

					

					<div class="u-clear"></div>
				</div>
				<?php
				} else {
					echo $this->library->get_news_url_replace($row->CONTENT." ");
				}
			} else {
			?>
				<div class="c-detail-article__description">
					<div class="c-detail-photo-article">
						<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
						<div class="c-detail-photo-article__author" style="text-align: center !important;">
							<?php
							$author = explode(",", $row->CAPTION);
							if (count($author) > 2) {
								echo $author[0]."<br>".$author[1];
							} else {
								echo $row->CAPTION;
							}
							?>
						</div>
					</div>
				<div>
					<?php
					echo $row->CONTENT;
					?>
				</div>
			</div>
			<?php
			}
			?>

			<?php // $this->load->view('layouts/news/topik', $array = array('row' => $row)); ?>	

		</div>


		<div class="fb-comments" data-href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>" data-numposts="5" data-width="100%"></div>
		<?php
		}
		?>

		<?php $this->load->view('layouts/news/artikel_terkait', $array = array('row' => $row)); ?>

		<?php $this->load->view('layouts/news/berita_pilihan', $array = array('row' => $row)); ?>

	</div>

	<!-- Google adsense -->
	<div class="col-md-4">
		
		

		
		
		<div class="row">
			<div class="col-md-12"><div class="c-main-title">Terbaru</div></div>
			<div class="col-md-12">
				<?php foreach($berita_terbaru as $key => $row){
          ?>
            <div class="c-main-article">
          
              <div class="col-xs-2">
                <div class="number">
                  <?= $key + 1 ?>
                </div>
              </div>
              <div class="col-xs-10 u-pad--0">
                <div class="tag"><?= $row->UPPERDECK; ?></div>
                <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
              </div>
              <div class="u-clear"></div>
              
              
            </div>
            <?php
              if ($key == 0) {
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="c-main-photo c-main-photo--terpopuler">
                        <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                        	<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
                      </div>
                     
                      <?php
                      if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') {
                      
                      ?>
                       <div class="c-border-bottom">
                          <div class="left"></div>
                          <div class="right"></div>
                        </div>
                        <?php
                    	}
                        ?>
                    </div>
                 </div>
                <?php
              }

            }
            ?>
			</div>
		</div>

		<div class="c-border-bottom" style="margin-bottom: 20px; margin-top: -20px;">
                          <div class="left"></div>
                          <div class="right"></div>
                        </div>
		
		
		
		
		<div class="row c-main-desktop">
			<div class="col-md-12">
				<div class="u-pad-side">
					<?php foreach($detail_news_banner as $key => $row){ ?>
				      <div class="row">
				        <div class="col-md-12">
				          <div class="c-banner-tax u-banner-name">
				            
				            <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
				              <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
				            </a>
				            
				          </div>
				        </div>
				      </div>
			      <?php } ?>
			    </div>
			</div>
		</div>
		
	</div>
</div>

<?php $this->load->view('layouts/news/share_button'); ?>
