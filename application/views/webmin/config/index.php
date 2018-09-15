<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>======NOTIF_EMAIL=====</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
        <form class="form-horizontal" method="post" action="<?=site_url('webmin/config/store')?>">
          <?php
            foreach ($data as $key => $value) {
              ?>
              <div class="form-group">
                <label class="control-label col-sm-2" for="label"><?=$value['LABEL']?>:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="label" name="label[<?=$value['ID'];?>]" value="<?=$value['CVALUE'];?>">
                </div>
              </div>
              <?php
            }
          ?>
          

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
      </div>
   </div>
</div>