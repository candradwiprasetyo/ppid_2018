<script src="<?= base_url() ?>assets/js/highchart/highcharts.js"></script>
<script src="<?= base_url() ?>assets/js/highchart/series-label.js"></script>



<!-- article -->
<div class="row">
	<div class="col-md-8">

		<div class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></div>
			
    <div class="c-sub-title c-sub-title--orange">Indikator (2018)</div>
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
    <div class="u-border--bottom u-mrgn-top--30 u-mrgn-bottom--20"></div>
    <div class="c-sub-title c-sub-title--orange">Pertumbuhan Kurs Pajak terhadap Dolar AS (<span class='u-font--italic'>pekan ke pekan</span>)</div>
    <div class="u-bg-yellow u-pad">
      
      <div id="container"></div>

    </div>

    <div class="u-mrgn-top--30 u-mrgn-bottom--20"></div>

    <div class="row">
      <?php foreach($berita_kurs_pajak as $key => $row){ ?>
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

    <div class="u-see-all u-txt-align--right u-border--bottom u-mrgn-bottom--40"><a href="<?= base_url() ?>data_alat/kurs_pajak">Lihat Semua</a></div>


    

	</div>
	<div class="col-md-4 u-mrgn-top--30">
		<?php $this->load->view('layouts/google_ads');  ?>

    <div class="row">
      <div class="col-md-12"><div class="c-main-title">Kalkulator PPh 21</div></div>
      <div class="col-sm-12">
        <div class="c-google-ads-bottom u-mrgn-bottom--20">
          <a href="<?= base_url() ?>kalkulator"><img src="<?= $this->library->check_image('assets/images/banner/kalkulator.gif'); ?>"></a>
        </div>
      </div>
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

<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
      backgroundColor: 'transparent',
      type: 'spline'
    },

   
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
          <?php foreach($chart as $key => $row){ ?>
            '<?= $row->PERIOD?>',
          <?php } ?>]
    },
    yAxis: {
        title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Kurs Pajak',
        data: [
          <?php foreach($chart as $key => $row){ ?>
            <?php
              $value = str_replace(".", "", $row->VALUE);
              echo $value;
            ?>,
          <?php } ?>]
    }]

    // series: [{
    //     name: 'Kurs Pajak',
    //     // Define the data points. All series have a dummy year
    //     // of 1970/71 in order to be compared on the same x axis. Note
    //     // that in JavaScript, months start at 0 for January, 1 for February etc.
    //     data: [
    //       <?php foreach($chart as $key => $row){ ?>
    //         [get_timestamp('<?= $row->DATE?>'), <?= $row->VALUE?>],
    //       <?php } ?>
    //     ]
    // }]

});

function get_timestamp (date) {
  var myDate= date;
  myDate=myDate.split("-");
  myDate[2]++;
  var newDate=myDate[1]+"/"+myDate[2]+"/"+myDate[0];
  console.log(newDate);
  return (new Date(newDate).getTime());
}

</script>

