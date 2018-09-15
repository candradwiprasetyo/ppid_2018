<!-- datepicker -->
<link href="<?= base_url() ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<div class="row">
  <div class="col-md-12">
    <div class="row row-no-margin">
      
      <div class="col-md-12">
        <h1 class="c-main-title u-mrgn-top--20"><?= $data['title'] ?></h1>
      </div>

      <div>
      <div class="col-md-4">
        <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
          <input class="form-control" size="16" type="text" value="<?= $_REQUEST['d'] = isset($_REQUEST['d']) ? $_REQUEST['d'] : '' ?>" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
          <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" /><br/>
      </div>

      <div class="col-md-8">&nbsp;</div>
      <div class="u-clear"></div>
    </div>
      

      <?php foreach($news as $key => $row){
        ?>

      <div class="col-md-4"> 
        <div class="c-cover c-cover-medium c-cover--quiz">
          <a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>">
            <img src="<?= $this->library->get_image($row->IMAGE, 2); ?>"></a>
          </a>
          <div class="c-cover-overlay">
            <div class="date"><?= $row->TITLE ?></div>
            <!-- <div class="title title-medium"><a href="<?= base_url().'quiz/'.$this->library->get_url_news($row->ID, $row->TITLE); ?>"><?= $row->QUESTION; ?></a></div> -->
          </div>
        </div>
        <div class="c-cover-border">
          <div class="border-left"></div>
          <div class="border-right"></div>
        </div>
        
      </div>
      <?php } ?>

      <div class="col-md-12">
        <div class="c-pagination">

        <?php 
        
        //PAGING    
        //function get_count_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='') {
        $objVar['HAL']=isset($_REQUEST['p'])?$_REQUEST['p']:'1';
        if (isset($_GET['d'])) {
          $date = '&d='.$_REQUEST['d'];
        } else {
          $date = '';
        }

        $row_per_page = 12;

        // $objCount= $this->library->get_count_news('', $row_per_page, '', $data['category_id'], $data['subcategory_id'], '', '', '', $data['date']);
        $objCount= $this->library->get_count_quiz('', $row_per_page, $data['date']);

        if ($objCount[0]->TOTAL > 0) {
        
          $REC_PERPAGE=$row_per_page;
          
          $TOTAL_REC=$objCount[0]->TOTAL;
          $TOTAL_PAGE=ceil($TOTAL_REC/$REC_PERPAGE);            
          
          //PREV          
          if ($objVar['HAL']>1) {
            echo '<a href="'.base_url().'indeks/'.$data['cat'].'?p='.($objVar['HAL']-1).$date.'" class="c-pagination__item"> < </a> ';    
          }
          
          for($i=0;$i<$TOTAL_PAGE;$i++)  {
              
                
          $hal=$i+1;          
          if ($hal==$objVar['HAL']) {
            echo '<span class="c-pagination__item c-pagination__item--active">'.($hal).'</span> ';
          }else{
            //if (($hal<=($objVar['HAL']+5)) || ($hal>=($objVar['HAL']-5))){
            if (($hal<=($objVar['HAL']+3)) && ($hal>=($objVar['HAL']-3))){
              echo '<a href="'.base_url().'indeks/'.$data['cat'].'?p='.$hal.$date.'" class="c-pagination__item">'.($hal).'</a> ';
            }
          }
              
          }
          
          //NEXT
          if ($objVar['HAL']<$TOTAL_PAGE) {
            echo '<a href="'.base_url().'indeks/'.$data['cat'].'?p='.($objVar['HAL']+1).$date.'"  class="c-pagination__item"> > </a> '; 
          }
        
        }
        ?>   
        </div>
      </div>     

    </div>
  </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript">
    
  $('.form_date').datetimepicker({
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
  })
  .on('changeDate', function(ev){
    //alert(ev.date);

    var date = ev.date;

    if (date){
      var day = (date.getDate()>9) ? date.getDate() : '0'+date.getDate();
      var monthIndex = date.getMonth()+1;
      monthIndex = (monthIndex>9) ? monthIndex : '0'+monthIndex;
      var year = date.getFullYear();

      newDate = day+'-'+monthIndex+'-'+year;

      window.location.href = '<?= base_url()."indeks/".$data['cat'].'?p=1'; ?>' + '&d=' + newDate;
    } else {
      window.location.href = '<?= base_url()."indeks/".$data['cat'].'?p=1'; ?>';
    }

  });
  
</script>