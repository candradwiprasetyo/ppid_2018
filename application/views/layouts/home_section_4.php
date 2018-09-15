<div class="row row-no-margin">
	<div class="col-md-8 c-main-desktop">
    <div class="row row-no-margin">
      <div class="col-md-6 u-line-right">
        <div class="c-main-title">
          <a href="<?= base_url() ?>review/perspektif">
            perspektif
          </a>
        </div>
          <?php foreach($perspektif as $key => $row){
            if ($key==0) {
          ?>
          
          <div class="c-cover c-cover-medium">
            <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
              <img src="<?= base_url() ?>assets/images/article/perspektif.jpg">
            </a>
            <div class="c-cover-overlay">
              <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
              <div class="tag"><?= $row->UPPERDECK; ?></div>
              <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
            </div>
          </div>
          <div class="c-cover-border">
            <div class="border-left"></div>
            <div class="border-right"></div>
          </div>
          <?php
            } else {
          ?>
          <div class="c-main-article">
            <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
            <div class="tag"><?= $row->UPPERDECK; ?></div>
            <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
          </div>
          <?php 
          } 
          }
          ?>
          
        
      </div>
      <div class="col-md-6">
        <div class="c-main-title"><a href="<?= base_url() ?>review/analisis">analisis</a></div>
        
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic-analisis" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
               <?php foreach($analisis as $key => $row){
                $key++;
                if($key%4==1){
                ?>
                <div class="item <?php if($key==1){ echo "active"; } ?>">
                  <?php
                  }
                  ?>
                  <div class="c-main-article">  
                    <div class="col-xs-4">
                      <div class="photo">
                        <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                          <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
                      </div>
                    </div>
                    <div class="col-xs-8">

                      <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                      <div class="tag"><?= $row->UPPERDECK; ?></div>
                      <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
                      <div class="author"><?= $this->library->get_author($row->CAPTION); ?></div>
                    </div>
                    <div class="u-clear"></div>
                  </div>
                <?php
                if($key%4==0){
                ?>
                </div>
                <?php
                }
              }
              ?>
 
         
             
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic-analisis" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-analisis" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-no-margin">
      <div class="col-sm-6">
        <div class="c-google-ads-bottom u-mrgn-bottom--20">
          <a href="<?= base_url() ?>kalkulator"><img src="<?= $this->library->check_image('assets/images/banner/kalkulator.gif'); ?>"></a>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="c-google-ads-bottom u-mrgn-bottom--20">
          <a href="<?= base_url() ?>indikator"><img src="<?= $this->library->check_image('assets/images/banner/indikator.gif'); ?>"></a>
        </div>
      </div>
    </div>
	</div>
  
  <div class="col-md-4 c-main-desktop">
    <div class="u-bg-yellow u-pad" style="margin-top: -20px">
      <div class="row row-no-margin">
        <div class="col-md-12 ">
          <div class="c-main-title c-main-title--orange">
            <span><img src="<?= base_url() ?>assets/images/focus-icon.png" width="50"></span>
            <a href="<?= base_url() ?>fokus">fokus</a>
          </div>
          <div class="c-cover-slider-frame-topright">
            <div id="carousel-example-generic-fokus" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
                <?php foreach($fokus as $key => $row){
                $fokus_news = $this->News_model->get_focus_news('', '4', $row->ID);
                //print_r($fokus_news);
                $analisis_img = $this->News_model->get_news('', '1', '', '', '', $fokus_news[0]->ARTICLE_ID);
                //print_r($analisis_img);
                ?>
                <div class="item <?php if($key==0){ echo "active"; } ?>">
                  <div class="row row-no-margin">
                    <div class="col-md-12">
                      <div class="c-cover c-cover-medium">
                        <a href="<?= Base_url(). 'fokus/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                          
                          <img src="<?= $this->library->get_image($analisis_img[0]->IMAGE, 1); ?>">
                        </a>
                        <div class="c-cover-overlay">
                         
                          <div class="title title-medium"><?= $row->TITLE ?></div>
                        </div>
                      </div>
                      <div class="c-cover-border">
                        <div class="border-left"></div>
                        <div class="border-right"></div>
                      </div>
                    </div>
                  </div>
                  <?php
                  foreach($fokus_news as $key => $row_detail){
                  $analisis_other = $this->News_model->get_news('', '1', '', '', '', $row_detail->ARTICLE_ID);
                  //print_r($analisis_other);
                  ?>
                  <div class="c-main-article">
                    <div class="date"><?= $this->library->format_date($analisis_other[0]->PUBLISH_TIMESTAMP); ?></div>
                    <div class="tag"><?= $analisis_other[0]->UPPERDECK; ?></div>
                    <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($analisis_other[0]->ID, $analisis_other[0]->TITLE); ?>"><?= $analisis_other[0]->TITLE; ?></a></div>
                  </div>
                  <?php
                  }
                  ?>

                </div>
                <?php } ?>
                
               
              </div>
              <div class="carousel-control-frame-topright">
                <a class="left carousel-control" href="#carousel-example-generic-fokus" role="button" data-slide="prev">
                  <span class="fa fa-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic-fokus" role="button" data-slide="next">
                  <span class="fa fa-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="u-clear"></div>
    </div>
  </div>

  <div class="col-md-4 c-main-mobile">
    
      <div class="row row-no-margin">
        <div class="col-md-12 ">
          <div class="c-main-title">
            terpopuler
          </div>
          
          
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
                          <?php if($row->SUBCATEGORY=='29' || $row->CATEGORY=='3'){ ?>
                          <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                          <?php } else { ?>
                          <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
                          <?php } ?>

                        </a>
                      </div>
                      <?php if($row->SUBCATEGORY!='29' && $row->CATEGORY!='3'){ ?>
                      <div class="c-border-bottom">
                          <div class="left"></div>
                          <div class="right"></div>
                        </div>
                        <?php } ?>
                    </div>
                 </div>
                <?php
              }

            }
            ?>

        </div>
      </div>
      <div class="u-clear"></div>
    
  </div>

</div>