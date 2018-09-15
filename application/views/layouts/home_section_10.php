<div class="row row-no-margin">
  <div class="col-md-9">
    <div class="row row-no-margin">
      <div class="col-md-12">
        <div class="c-main-title"><a href="<?= base_url() ?>berita/foto">Foto</a></div>
      </div>
      <div class="col-md-8">
      <div class="c-cover-slider-frame-topright">
        <div id="carousel-example-foto" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
            <?php foreach($foto_slider as $key => $row){ 
              ?>
              <div class="item <?php if($key==0){ echo "active"; } ?>">
                
                    <div class="c-cover c-cover-large u-cover-height--medium">
                      <a href="<?= base_url().$this->library->get_url_news($foto[0]->ID, $foto[0]->TITLE); ?>">
                        <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                      </a>
                      <div class="c-cover-overlay">
                        <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($foto[0]->ID, $foto[0]->TITLE); ?>"><?= $foto[0]->TITLE ?></a></div>
                      </div>
                    </div>
                    <div class="c-border-bottom u-mrgn-bottom--20">
                      <div class="left"></div>
                      <div class="right"></div>
                    </div>
                    <div class="c-main-article">
                      <div class="u-font-description">
                        <?= $row->CAPTION; ?>
                        </div>
                    </div>
              </div>
              <?php 
            } 
            ?>
          </div>
        </div>
      </div>
      
  </div>
  <div class="col-md-4">

    <?php foreach($foto as $key => $row){ 
      if ($key!=0){
    ?>
    <div class="row row-no-margin">
      <div class="col-md-12">
        <div>
          <div class="c-main-photo">
            <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
              <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
            </a>
          </div>
          <div class="c-border-bottom u-mrgn-bottom--20">
            <div class="left"></div>
            <div class="right"></div>
          </div>
        </div>
      </div>
    </div>
    <?php } } ?>

    <div class="col-md-12">
      <div class="u-txt-align--right u-txt-color--red"><a href="<?= base_url() ?>indeks/foto">Lihat Semua</a></div>
    </div>
 
  </div>
    </div>
  </div>
	
  <div class="col-md-3">
    <div class="u-pad-side">
      <div class="row">
        <div class="col-md-12">
          <div class="c-banner-tax u-banner-name">
            <?php foreach($academy_banner as $key => $row){ ?>
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