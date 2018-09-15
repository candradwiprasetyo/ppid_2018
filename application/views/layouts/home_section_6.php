<div class="row row-no-margin u-mrgn-bottom--20 u-mrgn-top--20">

  <div class="col-md-12">
    <div class="c-main-article u-mrgn-bottom--0"></div>
    <div class="c-main-title c-main-title--center"><a href="<?= base_url() ?>berita/video">Gallery</a></div>
  </div>
    
      
      <div class="col-md-12">
        <!-- Cover slider 2 -->
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic4" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              <?php
              
              foreach($video as $key => $row){ 
                $key++;
                if($key%3==1){
                ?>
                <div class="item <?php if($key==1){ echo "active"; } ?>">
                  <div class="row row-no-margin">
                <?php
                }
                ?>
              
                  <div class="col-md-4">
                    <div class="c-cover c-cover-medium">
                      <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                        <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
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
                  </div>
                  
               <?php
                if($key%3==0){
                ?>
                  </div>
                </div>
                <?php 
                }
              } 
              ?>

              <?php
                if(count($video)==4 || count($video)==1 || count($video)==2 || count($video)==5){
                ?>
                  </div>
                </div>
                <?php 
                }
              ?>
             
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic4" role="button" data-slide="prev">
                <span class="fa fa-caret-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic4" role="button" data-slide="next">
                <span class="fa fa-caret-right"></span>
              </a>
            </div>
          </div>
        </div>

        
      </div>
    
</div>
