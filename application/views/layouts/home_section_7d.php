<div class="row row-no-margin">
  <div class="col-md-9">
    <div class="row row-no-margin">
      <div class="col-md-12">
        <div class="c-main-title"><a href="<?= base_url() ?>berita/infografis">infografis pajak</a></div>
      </div>
      <div class="col-md-12">
        <!-- Cover slider 2 -->
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              <?php foreach($infografis as $key => $row){ 
                $key++;
                if($key%2==1){
                ?>
                <div class="item <?php if($key==1){ echo "active"; } ?>">
                  <div class="row row-no-margin">
                <?php
                }
                ?>
              
                  <div class="col-md-6">
                    <div class="c-cover c-cover-large u-cover-height--medium">
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
                if($key%2==0){
                ?>
                  </div>
                </div>
                <?php 
                }
              } 
              ?>
             
            </div>
            <div class="carousel-control-frame-topright">
              <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                <span class="fa fa-caret-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                <span class="fa fa-caret-right"></span>
              </a>
            </div>
          </div>
        </div>

		<!-- Profil Negara -->
	<div class="col-md-6 u-line-right" style="margin-bottom: 15px;">
    <div class="row row-no-margin">
      <div class="col-md-12 " style="margin-left: -15px;width: 104%;">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>literasi/profil_negara">profil negara</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">
              <?php foreach($profil_negara as $key => $row){ ?>
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
              <a class="left carousel-control" href="#carousel-example-generic3" role="button" data-slide="prev">
                <span class="fa fa-caret-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic3" role="button" data-slide="next">
                <span class="fa fa-caret-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
	</div>
		
		<!-- Profil Daerah -->
  <div class="col-md-6">
    <div class="row row-no-margin">
      <div class="col-md-12 " style="width: 104%;">
        <div class="c-main-title"> 
          <a href="<?= base_url() ?>literasi/profil_daerah">profil daerah</a>
        </div>
        <div class="c-cover-slider-frame-topright">
          <div id="carousel-example-generic9" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner carousel-inner-cover-slider" role="listbox">

              <?php foreach($profil_daerah as $key => $row){ ?>
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
              <a class="left carousel-control" href="#carousel-example-generic9" role="button" data-slide="prev">
                <span class="fa fa-caret-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic9" role="button" data-slide="next">
                <span class="fa fa-caret-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
		
      </div>
    </div>
  </div>
	
	<!-- Google ads -->
	
	
	<div class="col-md-3">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        <div class="c-main-title">  
          <a href="<?= base_url() ?>review/reportase">reportase</a>
        </div>
      </div>
      
      <div class="col-md-12">   
        <?php foreach($reportase as $key => $row){ ?>
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