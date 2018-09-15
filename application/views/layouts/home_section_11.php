<div class="row">
	<div class="col-md-6 u-line-right">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>komunitas/selebriti">selebriti</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic-selebriti" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              <?php foreach($selebriti as $key => $row){ ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">
                <div class="row row-no-margin">
                  <div class="col-md-12">
                    
                    <div class="c-cover c-cover-large u-cover-height--medium">
                      <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                        <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                      </a>
                      <div class="c-cover-overlay">
                        <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                        <div class="tag"><?= $row->UPPERDECK; ?></div>
                        <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
                        <div class="desc"><?= $this->library->get_taicing($row->TAICING); ?></div>
                      </div>
                    </div>
                    <div class="c-cover-border u-mrgn-bottom--0">
                      <div class="border-left"></div>
                      <div class="border-right"></div>
                    </div>

                  </div>
                </div>
              </div>
              <?php } ?>
             
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic-selebriti" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-selebriti" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
	</div>
  <div class="col-md-6">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>komunitas/humor">humor</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic-humor" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">

              <?php foreach($humor as $key => $row){ ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">
                <div class="row row-no-margin">
                  <div class="col-md-12">
                    
                    <div class="c-cover c-cover-large u-cover-height--medium">
                      <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                        <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                      </a>
                      <div class="c-cover-overlay">
                        <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                        <div class="tag"><?= $row->UPPERDECK; ?></div>
                        <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
                        <div class="desc"><?= $this->library->get_taicing($row->TAICING); ?></div>
                      </div>
                    </div>
                    <div class="c-cover-border u-mrgn-bottom--0">
                      <div class="border-left"></div>
                      <div class="border-right"></div>
                    </div>

                  </div>
                </div>
              </div>
              <?php } ?>
              
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic-humor" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-humor" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</div>