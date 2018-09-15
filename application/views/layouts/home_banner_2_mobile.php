<div class="row row-no-margin">
  <div class="col-md-12">
    <div class="row">
      <?php foreach($mobile_banner_2 as $key => $row){ ?>
        <div class="col-md-12">
          <div class="c-main-photo c-main-photo--original u-mrgn-bottom--20">
              <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
                <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
              </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>