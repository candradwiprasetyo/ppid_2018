<div class="row c-main-desktop">
	<div class="col-md-12">
    
    <div class="row row-no-margin ">
      
      <div class="col-md-12">
        <h1 class="c-main-title"><a href="<?= base_url() ?>berita">berita terkini</a></h1>
      </div>
      <div class="col-md-6"> 
      <?php foreach($berita_sticky as $key => $row){
        ?>

       
        <div class="c-cover c-cover-medium">
          <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
            <?php
            if ($row->SUBCATEGORY=='29' || $row->CATEGORY=='3') { ?>
              <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
            <?php
            } else {
            ?>
              <img src="<?= $this->library->get_image($row->IMAGE, 1); ?>">
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
       <!--  <div class="u-font-description u-mrgn-bottom--20">
          <?= $this->library->get_taicing($row->TAICING); ?>
        </div> -->

        <div class="u-mrgn-bottom--20"></div>
        <?php } 

         foreach($berita_terbaru_latest as $key => $row){ 
            if ($row->STICKY != 1) {
          ?>
        <div class="c-main-article">
            <div class="row">
              <div class="col-xs-4">
                <div class="c-main-photo">
                  <a href="<?= $this->library->get_url_news($row->ID, $row->TITLE) ?>">
                    <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
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
        <?php } } ?>
      </div>
      
      <div class="col-md-6">
        <?php foreach($berita_terbaru as $key => $row){
        ?>
          <div class="c-main-article">
            <div class="row">
              <div class="col-xs-4">
                <div class="c-main-photo">
                  <a href="<?= $this->library->get_url_news($row->ID, $row->TITLE) ?>">
                    <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
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
    <!-- Google adsense -->
    <div class="row row-no-margin" style="margin-left: 0px;">
      <div class="col-md-12">
            <!-- ads2news-728x90-homepage -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:90px"
            data-ad-client="ca-pub-1783522418730843"
            data-ad-slot="2494434158">
        </ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
      </div>
    </div>
	</div>



  
</div>