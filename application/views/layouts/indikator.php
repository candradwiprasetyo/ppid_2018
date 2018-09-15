<!-- article -->
<div class="row">
	<div class="col-md-8">

		<h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
			
		<!-- Cover large -->
		<table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Komponen</th>
                <th>Realisasi</th>
                <th>Periode</th>
              </tr>
            </thead>
            <tbody>
            	<?php foreach($indikator as $key => $row){?>
              <tr>
                <td><?= $row->COMPONENT ?></td>
                <td><?= $row->REALIZATION ?></td>
                <td><?= $row->PERIOD ?></td>
              </tr>
              <?php } ?>
              <tr>
              	<td colspan="3" class="c-main-tag">Sumber: BI & Kemenkeu, 2018 (unaudited)</td>
              </tr>
            </tbody>
          </table>
		

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
                      <?php if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') { ?>
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

