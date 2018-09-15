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

		<?php 
		if (isset($data['subcategory']) && $data['subcategory']=='profil_daerah') {
		foreach($data_profil_daerah as $key => $row_profil_daerah){ ?>
		<div class="c-cover c-cover-large u-mrgn-bottom--20">
          <a href="<?= base_url().$this->library->get_url_news($row_profil_daerah->ID, $row_profil_daerah->TITLE); ?>">
          	<?php if($row_profil_daerah->SUBCATEGORY=='4'){ ?>
          	<img src="<?= $this->library->get_image($row_profil_daerah->IMAGE, 3); ?>"></a>
          	<?php } else { ?>
          	<img src="<?= $this->library->get_image($row_profil_daerah->IMAGE, 2); ?>"></a>
          	<?php } ?>
          </a>
          <div class="c-cover-overlay">
            <div class="date"><?= $this->library->format_date($row_profil_daerah->PUBLISH_TIMESTAMP); ?></div>
            <div class="tag"><?= $row_profil_daerah->UPPERDECK; ?></div>
            <div class="title"><a href="<?= base_url().$this->library->get_url_news($row_profil_daerah->ID, $row_profil_daerah->TITLE); ?>"><?= $row_profil_daerah->TITLE; ?></a></div>
            <div class="desc"><?= $this->library->get_taicing($row_profil_daerah->TAICING); ?></div>
          </div>
        </div>
        <?php 
    	} 
    	}
    	?>
			
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

		
		

	</div>
	<div class="col-md-4 u-mrgn-top--30">
		
		<?php $this->load->view('layouts/google_ads');  ?>
		
		<?php $this->load->view('layouts/terbaru');  ?>

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
		</div>



	</div>
</div>

