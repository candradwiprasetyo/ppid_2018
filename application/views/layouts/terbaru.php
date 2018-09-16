<div class="row">
	<div class="col-md-12"><div class="c-main-title">Terbaru</div></div>
	<div class="col-md-12">
		<?php foreach($berita_terbaru as $key => $row){
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
            <div class="desc"><?= substr($row->CONTENT, 0, 100).'...'; ?></div>
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