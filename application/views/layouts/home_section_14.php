<div class="row row-no-margin">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <div class="c-banner-inside-tax u-banner-name u-mrgn-bottom--20">
          <!-- <img src="<?= base_url() ?>assets/images/banner/insidetax.jpg"> -->
          <?php foreach($inside_tax_banner as $key => $row){ ?>
            <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
              <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>"></a>
            <?php } ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="c-banner-inside-tax u-banner-name u-mrgn-bottom--20">
          <!-- <img src="<?= base_url() ?>assets/images/banner/working-paper.jpg"> -->
          <?php foreach($working_paper_banner as $key => $row){ ?>
            <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
              <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>"></a>
            <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>