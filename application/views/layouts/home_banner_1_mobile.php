<div class="c-google-ads-top">
          
  <!-- 728x90-detailberita-news -->
  <ins class="adsbygoogle"
      style="display:inline-block;width:100%;height:90px"
      data-ad-client="ca-pub-1783522418730843"
      data-ad-slot="7223128600">
  </ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  </div>
<div class="row row-no-margin">
  <div class="col-md-12">
    <div class="row">
      <?php foreach($mobile_banner_1 as $key => $row){ ?>
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