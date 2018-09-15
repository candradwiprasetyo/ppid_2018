

<div class="row row-no-margin">
  <div class="col-md-6">
    <div class="c-main-title" style="margin-bottom: 0px;"><a href="https://engine.ddtc.co.id/">peraturan</a></div>
    <div class="row row-no-margin">

      
	  
	<div class="col-md-12">
        
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle u-mrgn-right--20"></i>  Terbaru </a></li>
      <li><a data-toggle="tab" href="#menu2"><i class="fa fa-eye u-mrgn-right--20"></i>  Terpopuler</a> </li>
      <li><a data-toggle="tab" href="#menu3"><i class="fa fa-download u-mrgn-right--20"></i>  Terbanyak diunduh</a></li>
    </ul>
    <div class="c-border-bottom u-mrgn-bottom--20">
            <div class="left"></div>
            <div class="right"></div>
          </div>
    <div class="tab-content">
      <div id="menu1" class="tab-pane fade in active">
       

          <?php foreach($peraturan_pajak_terbaru as $key => $row){
            $url = $this->library->get_doc_url('peraturan-pajak', $row->permalink);
          ?>
          <div class="c-main-article u-mrgn-bottom--10">
          
            <div class="col-xs-3" style="width: 9%;">
              <div class="number" style="font-size: 30px;">
                <?= $key + 1 ?>
              </div>
            </div>
            <div class="col-xs-9 u-pad--0" >
              <div class="date" style="margin-bottom: 0px;"><?= $this->library->format_date($row->tanggal); ?></div>
        <div class="title"><a href="<?= $url ?>" target="_blank"><?= $row->jenis_dokumen_lengkap.' Nomor: '.$row->nomordokumen; ?></a></div>
        <div class="desc" style="font-size: 11px; width: 120%;text-transform: capitalize;color: #666;"><?= ucwords(strtolower($row->perihal)); ?></div>
            </div>
            <div class="u-clear"></div>
          </div>
          <?php
          }
          ?>
          <div class="col-md-12" style="text-align: center;margin: 5px;">
              <div class="col-md-2" style="margin-right: 15px;">
          <a href="https://engine.ddtc.co.id/peraturan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Peraturan-Pajak_hover.png" width="75" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 80px;">
              <div class="tag">Peraturan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 30px;">
          <a href="https://engine.ddtc.co.id/p3b"><img src="https://news.ddtc.co.id/assets/images/Engine-P3B_hover.png" width="96" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 100px;">
              <div class="tag">P3B</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 45px;">
          <a href="https://engine.ddtc.co.id/putusan-pengadilan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Pengadilan-Pajak_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan Pengadilan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 20px;">
          <a href="https://engine.ddtc.co.id/putusan-mahkamah-agung"><img src="https://news.ddtc.co.id/assets/images/Engine-Putusan-MA_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan MA</div>
              </div>
          </div>
          </div>

      </div>
      <div id="menu2" class="tab-pane">
              
            <?php foreach($peraturan_pajak_terpopuler as $key => $row){
            $url = $this->library->get_doc_url('peraturan-pajak', $row->permalink);
          ?>
          <div class="c-main-article u-mrgn-bottom--10">
          
            <div class="col-xs-3" style="width: 9%;">
              <div class="number" style="font-size: 30px;">
                <?= $key + 1 ?>
              </div>
            </div>
            <div class="col-xs-9 u-pad--0" >
              <div class="date" style="margin-bottom: 0px;"><?= $this->library->format_date($row->tanggal); ?></div>
        <div class="title"><a href="<?= $url ?>" target="_blank"><?= $row->jenis_dokumen_lengkap.' Nomor: '.$row->nomordokumen; ?></a></div>
        <div class="desc" style="font-size: 11px; width: 120%;text-transform: capitalize;color: #666;"><?= ucwords(strtolower($row->perihal)); ?></div>
            </div>
            <div class="u-clear"></div>
          </div>
          <?php
          }
          ?>
          <div class="col-md-12" style="text-align: center;margin: 5px;">
              <div class="col-md-2" style="margin-right: 15px;">
          <a href="https://engine.ddtc.co.id/peraturan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Peraturan-Pajak_hover.png" width="75" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 80px;">
              <div class="tag">Peraturan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 30px;">
          <a href="https://engine.ddtc.co.id/p3b"><img src="https://news.ddtc.co.id/assets/images/Engine-P3B_hover.png" width="96" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 100px;">
              <div class="tag">P3B</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 45px;">
          <a href="https://engine.ddtc.co.id/putusan-pengadilan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Pengadilan-Pajak_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan Pengadilan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 20px;">
          <a href="https://engine.ddtc.co.id/putusan-mahkamah-agung"><img src="https://news.ddtc.co.id/assets/images/Engine-Putusan-MA_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan MA</div>
              </div>
          </div>
          </div>

      </div>  
      <div id="menu3" class="tab-pane">
              
               <?php foreach($peraturan_pajak_terbanyak as $key => $row){
            $url = $this->library->get_doc_url('peraturan-pajak', $row->permalink);
          ?>
          <div class="c-main-article u-mrgn-bottom--10">
          
            <div class="col-xs-3" style="width: 9%;">
              <div class="number" style="font-size: 30px;">
                <?= $key + 1 ?>
              </div>
            </div>
            <div class="col-xs-9 u-pad--0" >
              <div class="date" style="margin-bottom: 0px;"><?= $this->library->format_date($row->tanggal); ?></div>
        <div class="title"><a href="<?= $url ?>" target="_blank"><?= $row->jenis_dokumen_lengkap.' Nomor: '.$row->nomordokumen; ?></a></div>
        <div class="desc" style="font-size: 11px; width: 120%;text-transform: capitalize;color: #666;"><?= ucwords(strtolower($row->perihal)); ?></div>
            </div>
            <div class="u-clear"></div>
          </div>
          <?php
          }
          ?>
          <div class="col-md-12" style="text-align: center;margin: 5px;">
              <div class="col-md-2" style="margin-right: 15px;">
          <a href="https://engine.ddtc.co.id/peraturan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Peraturan-Pajak_hover.png" width="75" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 80px;">
              <div class="tag">Peraturan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 30px;">
          <a href="https://engine.ddtc.co.id/p3b"><img src="https://news.ddtc.co.id/assets/images/Engine-P3B_hover.png" width="96" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 100px;">
              <div class="tag">P3B</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 45px;">
          <a href="https://engine.ddtc.co.id/putusan-pengadilan-pajak"><img src="https://news.ddtc.co.id/assets/images/Engine-Pengadilan-Pajak_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan Pengadilan Pajak</div>
              </div>
          </div>
          <div class="col-md-2" style="margin-right: 20px;">
          <a href="https://engine.ddtc.co.id/putusan-mahkamah-agung"><img src="https://news.ddtc.co.id/assets/images/Engine-Putusan-MA_hover.png" width="112" height="98" border="0"></a>
          <div class="c-main-article" style="text-align: center; margin-top: 10px; width: 115px;">
              <div class="tag">Putusan MA</div>
              </div>
          </div>
          </div>

      </div>
    </div>

          
          
      </div>  
    
  
      
    </div>
  </div>
  
  <div class="col-md-3" style="margin-top: 24px;">
  <div class="col-md-12">
    <div class="row row-no-margin">
      <div class="col-md-12 ">
        
      </div>
      
      <div class="col-md-12">
		<div class="u-bg-yellow u-pad--15 u-margin-min--15">
		<div class="c-sub-title c-sub-title--orange" style="margin-top: 0px;"><a href="<?= base_url() ?>peraturan/download_peraturan">Download Peraturan</a></div>		
        <?php foreach($download_peraturan as $key => $row){ ?>
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
    </div>
    <div class="u-clear"></div>
  </div>
  </div>
	
  <div class="col-md-3">
    <div class="u-pad-side">
      <div class="row">
        <div class="col-md-12">
          <div class="c-banner-tax u-banner-name">
            <?php foreach($tax_engine_banner as $key => $row){ ?>
            <a href="<?= $row->URL ?>" target="_blank" onclick="countBanner('<?= $row->ID ?>')">
              <img src="<?= $this->library->check_image('assets/images/banners/'.$row->FILENAME); ?>">
            </a>
            <?php } ?>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>