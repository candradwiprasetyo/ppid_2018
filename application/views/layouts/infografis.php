<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=1616925461930268';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- article -->



<input type="hidden" value="<?= $news_detail[0]->ID ?>" id="i_article_id">

<div class="row u-mrgn-top--20">
	<div class="col-md-12">

		<div class="c-detail-article">
			
			<?php foreach($news_detail as $key => $row){ ?>

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
			<?php $this->load->view('layouts/breadcrumb'); ?>
			<div class="c-detail-article__tag"><?= $row->UPPERDECK; ?></div>
			<h1 class="c-detail-article__title"><?= $row->TITLE; ?></h1>
			<div class="c-detail-article__date">
				<?php if ($this->library->get_reporter($row->ID)){ echo '<strong>'.$this->library->get_reporter($row->ID).'</strong>'." | "; } ?>
			<?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?>
			</div>
			<div class="c-button-share-mobile">
				<div class="c-button-share-mobile__item" id="button_share_facebook_mobile"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_twitter_mobile"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_google_plus_mobile"><img src="<?= base_url() ?>assets/images/google-plus-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_linkedin_mobile"><img src="<?= base_url() ?>assets/images/linkedin-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_whatsapp_mobile"><img src="<?= base_url() ?>assets/images/whatsapp-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_line_mobile"><img src="<?= base_url() ?>assets/images/line-white.png"></div>
				<div class="c-button-share-mobile__item c-button-share-mobile__item--counter" id="button_share_counter_mobile"><?= $counter_share ?></div>
			</div>
			<?php 
			if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') {
			if ($row->SUBCATEGORY!=28) {
			?>


			<div class="c-main-photo c-main-photo--no-animation  c-main-photo--original">
				<img src="<?= $this->library->get_image($row->IMAGE, 3); ?>">
			</div>

			<div class="c-border-bottom u-mrgn-bottom--20">
			        <div class="left"></div>
			        <div class="right"></div>
			      </div>
			      <?php
			}
			?>
			<div class="c-main-tag"><?= $row->CAPTION; ?></div>

			<?php
			$content = explode(" ", $row->CONTENT);
			if (count($content) > 1) {
			?>
			
			<div class="c-detail-article__description">
				<?php
				for ($i_content = 0; $i_content < 100; $i_content++) {
					//echo $content[$i_content]." ";
				}
				?>
			</div>
			<div class="c-detail-article__description">
				<?php
				if (count($editorpick) > 0 && $row->SUBCATEGORY!=28) {
				?>
				<div class="c-box-detail-article-frame">
					<div class="c-box-detail-article">
						<div class="c-box-detail-article__title">pilihan redaksi</div>
						<ul>
							<?php foreach($editorpick as $key => $row){ ?>
								<li><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></li>
							<?php } ?>
						</ul>
						
					</div>
					<div class="c-border-bottom">
				        <div class="left"></div>
				        <div class="right"></div>
				    </div>
				</div>
				<?php } ?>
				<div>
					<?php
					for ($i_content = 0; $i_content < count($content); $i_content++) {
						echo $content[$i_content]." ";
					}
					?>
				</div>
				<div class="u-clear"></div>
			</div>
			<?php
			}
			} else {
			?>
			<div class="c-detail-article__description">
				<div class="c-detail-photo-article">
					<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
					<div class="c-detail-photo-article__author">
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


			
			<div class="c-detail-article__topik">
				<?php
				if ($row->KEYWORD) {
				?>
				Topik : 
				<?php
				$k = explode(",", $row->KEYWORD);
				if (count($k) > 1){
					for($i=0;$i<count($k);$i++){
						$url = str_replace(" ","-", trim($k[$i]));
						echo '<a href="'.base_url().'tag/'.$url.'">'.$k[$i].'</a>'; 
						if (($i+1) != count($k)){ echo ','; }
						
					}
				} else {
					echo '<a href="'.base_url().'tag/'.$row->KEYWORD.'">'.$row->KEYWORD.'</a>';
				}
				?>
				<?php
				}
				?>
				</div>
			<?php
			}
			?>

		</div>

	</div>
	<div class="col-md-8">
		
		<div>
			<!-- Google adsense -->
			<div class="c-google-ads-top">
            <!-- 728x90-detailberita-news -->
            <ins class="adsbygoogle"
                style="display:inline-block;width:100%;height:90px"
                data-ad-client="ca-pub-1783522418730843"
                data-ad-slot="7223128600">
            </ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            </div>
			<div class="c-main-title">artikel terkait</div>
			
				<?php foreach($artikel_terkait as $key => $row){
					$key++;
					if ($key%2==1) {
						?>
						<div class="row row-no-margin">
						<?php
					}
          ?>
	      <div class="col-md-6">
	      	<div class="c-main-article">
						<div class="row row-no-margin">
							<div class="col-xs-4">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
										<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
										<?php } else { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
										<?php } ?>
									</a>
								</div>
								<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') { ?>
								<div class="c-border-bottom">
									<div class="left"></div>
									<div class="right"></div>
								</div>
								<?php } ?>
							</div>
							<div class="col-xs-8">
								<div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
								<div class="tag"><?= $row->UPPERDECK; ?></div>
								<div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	</div>
	    	<?php
	    	if ($key%2==0) {
						?>
						</div>
						<?php
					}
          ?>
	    	<?php
	      }
	      ?>
    	

			<div class="fb-comments" data-width="100%" data-numposts="5"></div>
			
		</div>
	</div>
	<div class="col-md-4">
		
		

		<div class="row">
			<div class="col-md-12"><div class="c-main-title u-mrgn-top--0">Terpopuler</div></div>
			<div class="col-md-12">
				<?php foreach($terpopuler as $key => $row){
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

		
	</div>
</div>

<div class="c-button-share">
	<div class="c-button-share__item c-button-share__item--counter" id="button_share_counter"><?= $counter_share ?></div>
	<div class="c-button-share__item" id="button_share_facebook"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div>
	<div class="c-button-share__item" id="button_share_twitter"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div>
	<div class="c-button-share__item" id="button_share_google_plus"><img src="<?= base_url() ?>assets/images/google-plus-white.png"></div>
	<div class="c-button-share__item" id="button_share_linkedin"><img src="<?= base_url() ?>assets/images/linkedin-white.png"></div>
	<div class="c-button-share__item" id="button_share_whatsapp"><img src="<?= base_url() ?>assets/images/whatsapp-white.png"></div>
	<div class="c-button-share__item" id="button_share_line"><img src="<?= base_url() ?>assets/images/line-white.png"></div>

</div>


<script src="<?= base_url() ?>assets/js/share_button.js?v=3"></script>>

