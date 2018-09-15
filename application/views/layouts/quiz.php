<!-- article -->
<div class="row">
	<div class="col-md-8">

		<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>

		<!-- Cover large -->
		<div class="row row-no-margin c-main-desktop">
			<div class="col-md-12">
		        <div class="c-cover-slider-frame">
		          <div id="carousel-example-main-slider" class="carousel slide" data-ride="carousel">
		            <div class="carousel-inner carousel-inner-cover-main-slider" role="listbox">

		              <?php foreach($headline as $key => $row_headline){ ?>
		              <div class="item <?php if($key==0){ echo "active"; } ?>">

		                <div class="c-cover c-cover--quiz c-cover-large">
		                  <a href="<?= base_url().'quiz/'.$this->library->get_url_news($row_headline->ID, $row_headline->TITLE); ?>">
		                  	<img src="<?= $this->library->get_image($row_headline->IMAGE, 2); ?>">
		                  </a>
		                  <div class="c-cover-overlay">
		                    <div class="date"><?= $row_headline->TITLE; ?></div>
		                    <div class="title"><a href="<?= base_url().'quiz/'.$this->library->get_url_news($row_headline->ID, $row_headline->TITLE); ?>"><?= $row_headline->QUESTION; ?></a></div>
		                    
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

			
			<div class="row c-main-desktop">
				<?php foreach($sub_headline as $key => $row){ ?>

				<div class="col-sm-6">
					<div class="c-cover c-cover--quiz c-cover-medium">
						<a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>">
							<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>">
						</a>
						<div class="c-cover-overlay">
							<div class="date"><?= $row_headline->TITLE; ?></div>
							<div class="title title-small"><a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->QUESTION; ?></a></div>
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
									<a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>">
										
										<img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
										
									</a>
									
								</div>
								
									<div class="c-border-bottom u-mrgn-bottom--10">
										<div class="left"></div>
										<div class="right"></div>
									</div>
									
							</div>
							<div class="col-sm-10">
								<div class="date"><?= $row->TITLE; ?></div>
              	<div class="title"><a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->QUESTION; ?></a></div>
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

		
		

	</div>
	<div class="col-md-4">
		<div class="row c-main-desktop u-mrgn-top--30" style="margin-left: 10px;">
        <!-- detailberita1-news-336x280 -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:336px;height:280px"
            data-ad-client="ca-pub-1783522418730843"
            data-ad-slot="7539711426">
        </ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
		</div>
		
	</div>
</div>

