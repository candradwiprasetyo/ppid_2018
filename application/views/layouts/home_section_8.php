<div class="row row-no-margin">
	<div class="col-md-6 u-line-right">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>review/wawancara">wawancara</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic-wawancara" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              
              <?php foreach($wawancara as $key => $row){ ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">

                <div class="c-cover c-cover-large">
                  <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                    <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                  </a>
                  <div class="c-cover-overlay">
                    <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                    <div class="tag"><?= $row->UPPERDECK; ?></div>
                    <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= str_replace("'", "", $row->TITLE); ?></a></div>
                    
                  </div>
                </div>
                <div class="c-cover-border">
                  <div class="border-left"></div>
                  <div class="border-right"></div>
                </div>

                <div class="u-font-description">
                  <?= $this->library->get_taicing($row->TAICING); ?>
                </div>
              </div>

              <?php } ?>
             
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic-wawancara" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic-wawancara" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
	</div>
  <div class="col-md-3 u-line-right">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title">  
          <a href="<?= base_url() ?>review/tajuk">tajuk</a>
        </div>
      </div>
      <div class="col-md-12">   
        <?php foreach($tajuk as $key => $row){ ?>
        <?php if($key==0){ ?>
        <div class="c-main-photo u-mrgn-bottom--0">
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
    <div class="u-clear"></div>
  </div>

  <div class="col-md-3">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title">  
          <a href="<?= base_url() ?>data_alat/kurs_pajak">kurs pajak</a>
        </div>
      </div>
      
      <div class="col-md-12">   
        <?php foreach($kurs_pajak as $key => $row){ ?>
        <?php if($key==0){ ?>
        <div class="c-main-photo u-mrgn-bottom--0">
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
    <div class="u-clear"></div>
  </div>

</div>