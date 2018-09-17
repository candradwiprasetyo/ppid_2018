<div class="row">
	<div class="col-md-12"><div class="c-main-title">Berita Terbaru</div></div>
	<div class="col-md-12">
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
                <!-- <div class="desc"><?= substr($row->CONTENT, 0, 100)."..."; ?></div> -->
              </div>
              <div class="u-clear"></div>
            </div>
          </div>
        
            <?php
          

        }
        ?>
	</div>
</div>