<div class="u-mrgn-top--20 c-main-mobile"></div>
<div class="row row-no-margin">
	<div class="col-md-12">
		<!-- Cover large -->
		<div class="row row-no-margin">
			<div class="col-md-12">
        <div class="c-cover-slider-frame">
          <div id="carousel-example-main-slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-main-slider" role="listbox">
              <?php foreach($headline as $key => $row_headline){ ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">

                <div class="c-cover c-cover-large">
                  <a href="<?= base_url().$this->library->get_url_news($row_headline->ID, $row_headline->TITLE); ?>">
                    <img src="<?= $this->library->get_image($row_headline->IMAGE, 2); ?>"></a>
                  <div class="c-cover-overlay">
                    <div class="date"><?= $this->library->format_date($row_headline->PUBLISH_TIMESTAMP); ?></div>
                    <div class="tag"><?= $row_headline->UPPERDECK; ?></div>
                    <div class="title"><a href="<?= base_url().$this->library->get_url_news($row_headline->ID, $row_headline->TITLE); ?>"><?= $row_headline->TITLE; ?></a></div>
                    <div class="desc"><?= $this->library->get_taicing($row_headline->TAICING); ?></div>
                    
                  </div>
                </div>
                <div class="c-cover-border">
                  <div class="border-left"></div>
                  <div class="border-right"></div>
                </div>

                <div class="u-font-description c-main-mobile u-mrgn-bottom--20">
                  <?= $this->library->get_taicing($row_headline->TAICING); ?>
                </div>

              </div>
              <?php } ?>
            </div>
           
          </div>
        </div>
			</div>
		</div>

    <div class="row row-no-margin c-main-mobile">
      
      <div class="col-md-12">
        <div class="c-main-title"><a href="<?= base_url() ?>berita">berita terbaru</a></div>
      </div>
      <?php foreach($berita_sticky as $key => $row){
        ?>

      <div class="col-md-6"> 
        <div class="c-cover c-cover-medium">
          <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
            <?php
            if ($row->SUBCATEGORY=='29') { ?>
              <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
            <?php
            } else {
            ?>
              <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>"></a>
            <?php } ?>
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
        <div class="u-font-description u-mrgn-bottom--20">
        <?= $this->library->get_taicing($row->TAICING); ?>
      </div>
      </div>
      <?php } ?>
      <div class="col-md-6">
        <?php foreach($berita_terbaru as $key => $row){
        ?>
          <div class="c-main-article">
            <div class="row">
              <div class="col-xs-4">
                <div class="c-main-photo">
                  <a href="<?= $this->library->get_url_news($row->ID, $row->TITLE) ?>">
                    <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
                  </a>
                </div>
                <div class="c-border-bottom">
                  <div class="left"></div>
                  <div class="right"></div>
                </div>
              </div>
              <div class="col-xs-8">
                <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                <div class="tag"><?= $row->UPPERDECK; ?></div>
                <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
              </div>
              <div class="u-clear"></div>
            </div>
          </div>
        <?php } ?>
        <div class="u-see-all u-txt-align--right u-mrgn-bottom--20"><a href="<?= base_url() ?>berita">Lihat Semua</a></div>

      </div>
    </div>

		<!-- Cover slider -->
		<div class="c-cover-slider-frame c-main-desktop u-mrgn-top--20 ">
			<div id="carousel-example-cover-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
            <?php foreach($headline_sub as $key => $row_headline){ 
            $key++;
            if($key%3==1){
            ?>
            <div class="item <?php if($key==1){ echo "active"; } ?>">
              <div class="row row-no-margin">
            <?php
            }
            ?>
              	<div class="col-md-4">
                 <div class="c-cover">
                    <a href="<?= base_url().$this->library->get_url_news($row_headline->ID, $row_headline->TITLE); ?>">
                    <img src="<?= $this->library->get_image($row_headline->IMAGE, 2); ?>">
                    <div class="c-cover-overlay c-cover-overlay-slider">
                      <div class="date"><?= $this->library->format_date($row_headline->PUBLISH_TIMESTAMP); ?></div>
                      <div class="tag"><?= $row_headline->UPPERDECK; ?></div>
                      <div class="title title-slider"><?= $row_headline->TITLE; ?></div>
                    </div>
                    </a>
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
                if(count($headline_sub)==4 || count($headline_sub)==1 || count($headline_sub)==2 || count($headline_sub)==5){
                ?>
                  </div>
                </div>
                <?php 
                }
              ?>
          
        </div>
        

        <a class="left carousel-control" href="#carousel-example-cover-slider" role="button" data-slide="prev">
          <span class="fa fa-caret-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-cover-slider" role="button" data-slide="next">
          <span class="fa fa-caret-right"></span>
        </a>

      
        </div>
       

    </div>
	</div>
	
</div>