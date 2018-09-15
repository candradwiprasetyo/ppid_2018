<div class="row row-no-margin">
	<div class="col-md-6 u-line-right">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>literasi/kutipan">Kutipan</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic-kutipan" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              <?php foreach($kutipan as $key => $row){ ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">
                <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>" style="text-decoration: none;">
                <div class="c-quotes" style="text-decoration: none;">
                  <div class="c-quotes__title">
                    <span class="c-quotes__icon">“ </span>
                    <span class="c-quotes__text" style="text-decoration: none;"><?= str_replace("'", "", $row->TITLE); ?></span>
                    <span class="c-quotes__icon"> ”</span>
                  </div>
                  <div class="c-quotes__author" style="text-decoration: none;">- <?= str_replace(":", "",$row->UPPERDECK); ?> -</div>
                </div>
              </a>
                <div class="c-border-bottom u-mrgn-bottom--20">
                  <div class="left"></div>
                  <div class="right"></div>
                </div>
                 <div class="u-mrgn-bottom--20">
                  <div class="u-font-description"><?= $this->library->get_taicing($row->TAICING); ?></div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic-kutipan" role="button" data-slide="prev">
                <span class="fa fa-caret-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-kutipan" role="button" data-slide="next">
                <span class="fa fa-caret-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>

  <div class="col-md-6">
    <div class="row row-no-margin">
      <div class="col-md-6">
        <div class="c-main-title">  
          <a href="<?= base_url() ?>literasi/buku">buku</a>
        </div>
        <div class="row row-no-margin">
          <div class="col-md-12">
          <div class="row row-no-margin">
            
            <div class="col-md-12">   
               <?php foreach($buku as $key => $row){ ?>
                <?php if($key==0){ ?>
                <div class="c-main-photo">
                  <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                    <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
                  </a>
                </div>
                <div class="c-border-bottom u-mrgn-bottom--20">
                  <div class="left"></div>
                  <div class="right"></div>
                </div>
                <?php } ?>
                <div class="c-main-article">
                <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>    
                  <div class="tag"><?= $row->UPPERDECK; ?></div>
                  <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
                </div>
                <?php
                }
                ?>
            </div>
           </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="u-pad-side">
        <div class="row">
          <div class="col-md-12">   
            <div class="c-banner-tax u-banner-name">
            <?php foreach($library_banner as $key => $row){ ?>
              <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
                <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
              </a>
            <?php } ?>
          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="u-clear"></div>
  </div>

 

</div>