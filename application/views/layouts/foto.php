<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=1616925461930268';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- article -->

<script src="<?= base_url() ?>assets/js/share_button.js"></script>
<script src="<?= base_url() ?>assets/js/jssor.slider-26.5.0.min.js" type="text/javascript"></script>

<script type="text/javascript">
    jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
        	<?php foreach($foto_slider as $key_foto1 => $row_foto1){ ?>
        		{$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
          // {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
          <?php } ?>
        ];

        var jssor_1_options = {
          $AutoPlay: 1,
          $Align: 0,
          $SlideshowOptions: {
            $Class: $JssorSlideshowRunner$,
            $Transitions: jssor_1_SlideshowTransitions,
            $TransitionsOrder: 1
          },
          $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$,
          },
          $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $Cols: 6,
            $Align: 1
          }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 1170;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            }
            else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };
</script>
<style>
    
</style>

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
			<?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
			<div class="c-button-share-mobile">
				<div class="c-button-share-mobile__item" id="button_share_facebook_mobile"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_twitter_mobile"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_google_plus_mobile"><img src="<?= base_url() ?>assets/images/google-plus-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_linkedin_mobile"><img src="<?= base_url() ?>assets/images/linkedin-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_whatsapp_mobile"><img src="<?= base_url() ?>assets/images/whatsapp-white.png"></div>
				<div class="c-button-share-mobile__item" id="button_share_line_mobile"><img src="<?= base_url() ?>assets/images/line-white.png"></div>
				<div class="c-button-share-mobile__item c-button-share-mobile__item--counter" id="button_share_counter_mobile"><?= "10"//$counter_share ?></div>
			</div>
			


			<div>
				<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1170px;height:700px;overflow:hidden;visibility:hidden;">
			        <!-- Loading Screen -->
			        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
			            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?= base_url() ?>assets/images/spin.svg" />
			        </div>
			        <div data-u="slides" style="position:relative;top:0px;left:0px;width:1170px;height:657px;overflow:hidden;">
			        	<?php foreach($foto_slider as $key_foto => $row_foto){ ?>
			            <div>
			                <img data-u="image" src="<?= $this->library->get_image($row_foto->IMAGE, 2); ?>">
			                <?php if($row_foto->CAPTION){ ?>
			                <div class="jssort-slider-overlay"><?= $row_foto->CAPTION ?></div>
			                <?php
			            	}
			                ?>
			               
			            </div>
			            <?php } ?>
			        </div>
			        <!-- Thumbnail Navigator -->
			        <div data-u="thumbnavigator" class="jssort111" style="background:#333;position:absolute;left:0px;bottom:0px;width:1170px;height:100px;" data-autocenter="1" data-scale-bottom="0.75">
			            <div data-u="slides">
			                <div data-u="prototype" class="p">
			                    <div data-u="thumbnailtemplate" class="t"></div>
			                </div>
			            </div>
			        </div>
			        <!-- Arrow Navigator -->
			        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:220px;left:25px;" data-scale="0.75">
			            <svg viewbox="0 0 16000 16000" style="position:absolute;top:40%;left:0;width:100%;height:100%;">
			                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			            </svg>
			        </div>
			        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:220px;right:25px;" data-scale="0.75">
			            <svg viewbox="0 0 16000 16000" style="position:absolute;top:40%;left:0;width:100%;height:100%;">
			                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			            </svg>
			        </div>
			    </div>
			</div>


			
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
										<img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
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
			<div class="col-md-12"><div class="c-main-title u-mrgn-top--0">Terbaru</div></div>
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
	<div class="c-button-share__item c-button-share__item--counter" id="button_share_counter"><?= "10"//$counter_share ?></div>
	<div class="c-button-share__item" id="button_share_facebook"><img src="<?= base_url() ?>assets/images/facebook-white.png"></div>
	<div class="c-button-share__item" id="button_share_twitter"><img src="<?= base_url() ?>assets/images/twitter-white.png"></div>
	<div class="c-button-share__item" id="button_share_google_plus"><img src="<?= base_url() ?>assets/images/google-plus-white.png"></div>
	<div class="c-button-share__item" id="button_share_linkedin"><img src="<?= base_url() ?>assets/images/linkedin-white.png"></div>
	<div class="c-button-share__item" id="button_share_whatsapp"><img src="<?= base_url() ?>assets/images/whatsapp-white.png"></div>
	<div class="c-button-share__item" id="button_share_line"><img src="<?= base_url() ?>assets/images/line-white.png"></div>

</div>

<script type="text/javascript">jssor_1_slider_init();</script>
