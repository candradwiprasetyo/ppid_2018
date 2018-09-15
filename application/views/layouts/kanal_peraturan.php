<?php 
if ($this->router->fetch_method()=='index'){ ?>
<div class="row"  id="row_section_1" style="margin-bottom: 0;">
	<div class="col-md-12">
		<div class="c-main-banner u-banner-name">
			<div class="c-button-hide" id="c-button-hide">HIDE</div>
			<div id="hero-carousel" class="carousel-top slide carousel-fade">
			  <div class="carousel-inner">
			    <?php foreach($header_banner as $key => $row){ ?>
			    <div class="item <?php if ($key==0) { echo 'active'; } ?>">
			      <a href="<?= $row->URL ?>">
			      	<img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
			      </a>
			    </div>
			    <?php
			  	}
			    ?>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
<!-- article -->
<div class="row">
	<div class="col-md-12">
		<div style="position: relative;">
	      <div class="c-button-hide" id="c-button-show" style="display: none;">SHOW</div>
	    </div>
	</div>
	<div class="col-md-8">

		<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
			
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
		                  	<?php if($row_headline->SUBCATEGORY=='4'){ ?>
		                  	<img src="<?= $this->library->get_image($row_headline->IMAGE, 3); ?>"></a>
		                  	<?php } else { ?>
		                  	<img src="<?= $this->library->get_image($row_headline->IMAGE, 2); ?>"></a>
		                  	<?php } ?>
		                  </a>
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

		              </div>
		              <?php } ?>
		            </div>
		           
		          </div>
		        </div>
					</div>
				</div>

			
			<div class="row">
				<?php foreach($sub_headline as $key => $row){ ?>

				<div class="col-sm-6">
					<div class="c-cover c-cover-medium">
						<a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
							<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
						</a>
						<div class="c-cover-overlay">
							<div class="title title-medium"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
						</div>
					</div>
					<div class="c-cover-border">
						<div class="border-left"></div>
						<div class="border-right"></div>
					</div>
				</div>
				<?php } ?>
				
			</div>
			<div class="row">
				<?php foreach($others as $key => $row){ ?>
	      <div class="col-md-12">
	      	<div class="c-main-article">
						<div class="row">
							<div class="col-sm-2">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
										<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 1); ?>"></a>
										<?php } else { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
										<?php } ?>
									</a>
									
								</div>
								<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									<?php } ?>
							</div>
							<div class="col-sm-10">
								<div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
              	<div class="tag"><?= $row->UPPERDECK; ?></div>
              	<div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	</div>
	    	<?php
	      }
	      ?>
    	</div>
    	<div class="u-see-all u-txt-align--right u-border--bottom u-mrgn-bottom--40"><a href="<?= $data['view_all'] ?>">Lihat Semua</a></div>

    	<div class="c-main-title c-main-title--orange">PILIHAN REDAKSI</div>

    	<div class="row">
				<?php foreach($editorpick as $key => $row){ ?>
	      <div class="col-md-12">
	      	<div class="c-main-article">
						<div class="row">
							<div class="col-sm-2">
								<div class="c-main-photo">
									<a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
										<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 1); ?>"></a>
										<?php } else { ?>
										<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
										<?php } ?>
									</a>
									
								</div>
									<?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									<?php } ?>
							</div>
							<div class="col-sm-10">
								<div class="date"><?= $this->library->format_date($row->PUBLISH_TIMESTAMP); ?></div>
              	<div class="tag"><?= $row->UPPERDECK; ?></div>
              	<div class="title"><a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->TITLE; ?></a></div>
							</div>
							<div class="u-clear"></div>
						</div>
					</div>
	    	</div>
	    	<?php
	      }
	      ?>
    	</div>
		
	<div class="c-sub-title c-sub-title--orange">Peraturan Pajak Terbanyak Diunduh</div>

    <!-- <?= print_r ($peraturan_pajak_terbanyak); ?> -->

    <div class="row">
      <div class="col-md-12">
        <?php foreach($peraturan_pajak_terbanyak as $key => $row){
          $url = $this->library->get_doc_url('peraturan-pajak', $row->permalink);
        ?>
          <div class="c-main-article u-mrgn-bottom--0">
            <div class="<?php if($key%2==0){ echo 'u-bg-grey'; } else { echo 'u-bg-transparent'; } ?> u-pad" style="padding-top: 10px;padding-bottom: 10px;">
              <div class="row row-no-margin">
                <div class="col-xs-4">
                  <div class="u-font-size--giant"><?= $row->download ?><span class="u-font-size--large">x</span></div>
                </div>
                <div class="col-xs-8">
                  <div class="date"><?= $this->library->format_date($row->tanggal); ?></div>
                  <div class="title"><a href="<?= $url ?>" target="_blank"><?= $row->jenis_dokumen_lengkap.' Nomor: '.$row->nomordokumen; ?></a></div>
                  <div class="desc" style="font-size: 12px; width: 100%;text-transform: capitalize;color: #666;"><?= ucwords(strtolower($row->perihal)); ?></div>
                </div>
                <div class="u-clear"></div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="u-see-all u-txt-align--right u-border--bottom u-mrgn-bottom--40"><a href="https://engine.ddtc.co.id/peraturan-pajak" target="_blank">Lihat Semua</a></div>




    <div class="row">
      <?php foreach($data_alat_banner as $key => $row){ ?>
        <div class="col-md-6 u-mrgn-bottom--20">
          <div class="c-main-photo c-main-photo--original">
            <a href="<?= $row->URL ?>" target="blank" onclick="countBanner('<?= $row->ID ?>')">
              <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
            </a>
          </div>
        </div>
      <?php } ?>
    </div>	

	</div>
	<div class="col-md-4 u-mrgn-top--30">
		
		<?php $this->load->view('layouts/google_ads');  ?>
		

		<div class="row">
			<div class="col-md-12"><div class="c-main-title">Terpopuler</div></div>
			<div class="col-md-12">
				<?php foreach($terpopuler as $key => $row){
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
                        </a>
                      </div>
                      <?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12' && $row->SUBCATEGORY != '29') { ?>
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
			
			<div class="col-md-12"><div class="c-main-title">P3B Terpopuler</div></div>
      <div class="col-md-12">
        <!-- <?php print_r($p3b_populer); ?> -->
        <?php foreach($p3b_populer as $key => $row){
          $url = $this->library->get_doc_url('p3b', $row->p3b_url);
          ?>
           <div class="u-pad">
            <div class="c-main-article u-mrgn-bottom--0">
          
              <div class="col-xs-2">
                <div class="number">
                  <?= $key + 1 ?>
                </div>
              </div>
              <div class="col-xs-10 u-pad--0">
                <div class="title u-mrgn-top--10"><a href="<?= $url ?>" target="_blank"><?= $row->p3b_country; ?></a></div>
              </div>
              <div class="u-clear"></div>
              
              
            </div>
           
                
                  <div class="col-md-12">
                   
                      <div class="c-main-photo c-main-photo--terpopuler u-mrgn-bottom--20 u-box-shadow">
                          <a href="<?= $url; ?>" target="_blank">
                            <img src="<?= 'https://engine.ddtc.co.id/assets/themes/images/flag/flag-'.strtolower($row->p3b_country).'.png'; ?>"></a>
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