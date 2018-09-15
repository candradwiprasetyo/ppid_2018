<!-- article -->
<div class="row">
	<div class="col-md-8">

		<div class="c-main-title"><?= $data['title'] ?></div>
			
    <div class="c-sub-title c-sub-title--orange">Indikator (2017)</div>
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
              	<td colspan="3" class="c-main-tag">Sumber: BI & Kemenkeu, 2017 (unaudited)</td>
              </tr>
            </tbody>
          </table>
    <div class="u-border--bottom u-mrgn-top--30 u-mrgn-bottom--20"></div>
    <div class="c-sub-title c-sub-title--orange">Pertumbuhan kurs pajak (pekan ke pekan)</div>
    <div class="u-bg-yellow u-pad">test</div>

    <div class="u-border--bottom u-mrgn-top--30 u-mrgn-bottom--20"></div>
    <div class="c-sub-title c-sub-title--orange">Peraturan Pajak Terbanyak Diunduh</div>

    <?= print_r ($peraturan_pajak_terbanyak); ?>

    <?php foreach($peraturan_pajak_terbanyak as $key => $row){
    ?>
      <div class="c-main-article">
        <div class="row">
          <div class="col-xs-4">
            
            nomor
          </div>
          <div class="col-xs-8">
            <div class="date"><?= $this->library->format_date($row->tanggal); ?></div>
            <div class="title"><a href="<? //= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->nomordokumen; ?></a></div>
          </div>
          <div class="u-clear"></div>
        </div>
      </div>
    <?php } ?>
    
		

	</div>
	<div class="col-md-4">
		<div class="row u-mrgn-top--30 c-main-desktop">
			<div class="col-md-12"><div class="c-google-ads">Google Ads</div></div>
		</div>
		

		<div class="row">
			<div class="col-md-12">
        <div class="c-banner-tax u-banner-name">
            <?php foreach($tax_engine_banner as $key => $row){ ?>
            <a href="<?= $row->URL ?>" target="blank"><img src="<?= $this->library->check_image('assets/images/'.$row->FILENAME); ?>"></a>
            <?php } ?>
          </div>   
      </div>
		
		</div>

	</div>
</div>

