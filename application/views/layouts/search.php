<script>
  (function() {
    // new id
    var cx = '012586436060669563388:cw_bdqecyvy';
    //var cx = '003143160812119085880:deacahkiowq';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<div class="row u-mrgn-top--30">
  <div class="col-md-8">

    <div class="c-main-title"><?= $data['title'] ?></div>
    <gcse:search></gcse:search>
  </div>
<!-- Google adsense -->
  <div class="col-md-4">
    <div class="row c-main-desktop" style="margin-left: 10px;">
        <!-- 1-searchresults-news-336x280 -->
        <ins class="adsbygoogle"
    style="display:inline-block;width:336px;height:280px"
    data-ad-client="ca-pub-1783522418730843"
    data-ad-slot="8097226574">
    </ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <div class="row c-main-desktop" style="margin-left: 10px;">
        <!-- 1-searchresults-news-336x280 -->
        <ins class="adsbygoogle"
    style="display:inline-block;width:336px;height:280px"
    data-ad-client="ca-pub-1783522418730843"
    data-ad-slot="9134976079"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

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
                    <div class="c-main-photo">
                        <a href="<?= base_url().$this->library->get_url_news($row->ID, $row->TITLE); ?>">
                          <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
                      </div>
                     
                      <?php
                      if ($row->SUBCATEGORY != '21' && $row->SUBCATEGORY != '10' && $row->SUBCATEGORY != '12') {
                      
                      ?>
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


<style type='text/css'>
  .gsc-control-cse {
    font-family: Arial, sans-serif;
    border-color: #FFFFFF;
    background-color: #FFFFFF;
  }
  .gsc-control-cse .gsc-table-result {
    font-family: Arial, sans-serif;
  }
  input.gsc-input, .gsc-input-box, .gsc-input-box-hover, .gsc-input-box-focus {
    border-color: #D9D9D9;
  background: #fff;
    height: 30px;
  }
  input.gsc-search-button, input.gsc-search-button:hover, input.gsc-search-button:focus {
    border-color: #FF9900;
    background-color: #FF9900;
    background-image: none;
    filter: none;
    box-sizing: initial;

  }
</style>