<div class="row row-no-margin">
	<div class="col-md-6">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>review/konsultasi">konsultasi</a>
        </div>
        <div class="col-md-5">
          <?php foreach($konsultasi_terbaru as $key => $row){ ?>
          <div class="c-main-article">
            <div class="photo-large u-mrgn-bottom--20">
              <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
              </a>
            </div>
          </div>
          <div class="c-border-bottom u-mrgn-bottom--20">
            <div class="left"></div>
            <div class="right"></div>
          </div>
          
          <div class="c-main-article">                      
              <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
              <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
              <div class="author"><?= $this->library->get_author($row->CAPTION); ?></div>
          </div>
         
          <div class="u-mrgn-bottom--20 u-font-description">
            <?= $this->library->get_taicing($row->TAICING); ?>
            
          </div>
          <?php } ?>
        </div>  
        <div class="col-md-7">
          <div class="c-cover-slider-frame-topright">
            <div id="carousel-example-generic-konsultasi" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
                <?php foreach($konsultasi as $key => $row){ 
                $key++;
                if($key%4==1){
                ?>
                <div class="item <?php if($key==1){ echo "active"; } ?>">
                  <div class="row row-no-margin">
                <?php
                }
                ?>
                    
                      <div class="c-main-article">  
                        <div class="col-xs-4">
                          <div class="photo">
                            <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                              <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
                            </a>
                          </div>
                        </div>
                        <div class="col-xs-8">
                          <div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
                          <div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
                          <div class="author"><?= $this->library->get_author($row->CAPTION); ?></div>
                        </div>
                        <div class="u-clear"></div>
                      </div>
                      
                 <?php
                  if($key%4==0){
                  ?>
                    </div>
                  </div>
                  <?php 
                  }
                } 
                ?>
                
               
              </div>
              <div class="carousel-control-frame-topright">
                <a class="left carousel-control" href="#carousel-example-generic-konsultasi" role="button" data-slide="prev">
                  <span class="fa fa-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic-konsultasi" role="button" data-slide="next">
                  <span class="fa fa-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
	</div>

  <div class="col-md-6  u-line-left">
    <div class="row row-no-margin">
      <div class="col-md-12">
        <div class="c-main-title">  
          <a href="<?= base_url() ?>literasi/kelas_pajak">kelas pajak</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row row-no-margin">

          <div class="col-md-12">
            <div class="c-main-photo">
              <a href="<?= base_url().$this->library->get_url_news($kelas_pajak[0]->ID, $kelas_pajak[0]->TITLE); ?>">
                <img src="<?= $this->library->get_image($kelas_pajak[0]->IMAGE, 2); ?>">
              </a>
            </div>
            <div class="c-border-bottom u-mrgn-bottom--20">
              <div class="left"></div>
              <div class="right"></div>
            </div>
          </div>
          <div class="col-md-12">   
            <div class="c-main-article">
              <div class="date"><?= $this->library->format_date($kelas_pajak[0]->PUBLISH_TIMESTAMP); ?></div>
              <div class="tag"><?= $kelas_pajak[0]->UPPERDECK; ?></div>
              <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($kelas_pajak[0]->ID, $kelas_pajak[0]->TITLE); ?>"><?= $kelas_pajak[0]->TITLE; ?></a></div>
            </div>
          </div>
        </div>
        <div class="row row-no-margin">
          <div class="col-md-12">   
            <div class="c-main-article">
              <div class="date"><?= $this->library->format_date($kelas_pajak[1]->PUBLISH_TIMESTAMP); ?></div>
              <div class="tag"><?= $kelas_pajak[1]->UPPERDECK; ?></div>
              <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($kelas_pajak[1]->ID, $kelas_pajak[1]->TITLE); ?>"><?= $kelas_pajak[1]->TITLE; ?></a></div>
            </div>
          </div>
          <?php if ($kelas_pajak[1]->TAICING) { ?>
          <div class="col-md-12">
            <?= $this->library->get_taicing($kelas_pajak[1]->TAICING); ?>
          </div>
          <?php } ?>
        </div>
      
      <div class="row row-no-margin">
          <div class="col-md-12">   
            <div class="c-main-article">
              <div class="date"><?= $this->library->format_date($kelas_pajak[2]->PUBLISH_TIMESTAMP); ?></div>
              <div class="tag"><?= $kelas_pajak[2]->UPPERDECK; ?></div>
              <div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($kelas_pajak[2]->ID, $kelas_pajak[2]->TITLE); ?>"><?= $kelas_pajak[2]->TITLE; ?></a></div>
            </div>
          </div>
          <?php if ($kelas_pajak[2]->TAICING) { ?>
          <div class="col-md-12">
            <?= $this->library->get_taicing($kelas_pajak[2]->TAICING); ?>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">   
            <?php foreach($kelas_pajak as $key => $row){ 
              if ($key != 0 && $key != 1 && $key != 2) {
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
        </div>
      </div>
    </div>
    <div class="u-clear"></div>
  </div>

 

</div>