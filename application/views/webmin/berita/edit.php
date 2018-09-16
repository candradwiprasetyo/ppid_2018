<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Edit Data Artikel</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <form class="form-horizontal" action="<?=site_url('webmin/berita/update');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data->ID;?>" >
            <div class="form-group">
               <label class="control-label col-sm-2" for="title">Title:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo ((($data->TITLE))); ?>" maxlength="70">
                  <div id="title_counter">0/70</div>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="upperdeck">Upperdeck:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="upperdeck" id="upperdeck" placeholder="Upperdeck" value="<?php echo htmlentities(stripslashes(($data->UPPERDECK))); ?>" maxlength="70">
                  <div id="upperdeck_counter">0/70</div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="category">Category:</label>
               <div class="col-sm-8">
                  <select class="form-control" id="category" name="category">
                     <?php 
                        foreach ($category as $key => $value) {
                           echo '<optgroup label="'.$value['name'].'">';
                           foreach ($value['subcategory'] as $keySub => $valueSub) {
                              if($data->SUBCATEGORY == $valueSub['ID'])
                                 $select = 'selected="selected"';
                              else
                                 $select = "";

                              echo '<option '.$select.' value="'.$valueSub['ID'].'">'.$valueSub['SUBCATEGORY_NAME'].'</option>';
                           }

                           echo '</optgroup>';
                        }
                     ?>
                  </select>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="taicing">Taicing:</label>
               <div class="col-sm-10">
                  <textarea id="taicing" name="taicing" rows="4" cols="80" class="form-control" maxlength="160"><?= strip_tags($data->TAICING) ?></textarea>
                  <div id="taicing_counter">0/160</div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="title">Content:</label>
               <div class="col-sm-10">
                  <textarea id="editor1" name="editor1" rows="4" cols="80"><?=$data->CONTENT?></textarea>
               </div>
            </div>

            <div class="form-group"  style="display: none">
               <label class="control-label col-sm-2" for="reporter">Reporter:</label>
               <div class="col-sm-6">
                  <select name="reporter" id="reporter" class="form-control">
                     <option value="">-reporter-</option>
                     <?php
                        foreach ($reporter as $key => $value) {
                           if($data->REPORTER == $value['EMAIL'])
                                 $select = 'selected="selected"';
                              else
                                 $select = "";

                           echo '<option '.$select.' value="'.$value['EMAIL'].'">'.$value['FULLNAME'].'</option>';
                        }
                     ?>   
                  </select>
               </div>
            </div>

            <div class="form-group"  style="display: none">
               <label class="control-label col-sm-2" for="redaktur">Redaktur:</label>
               <div class="col-sm-6">
                  <select name="redaktur" id="redaktur" class="form-control">
                     <option value="">-redaktur-</option>
                     <?php
                        foreach ($redaktur as $key => $value) {
                           if($data->REDAKTUR == $value['EMAIL'])
                                 $select = 'selected="selected"';
                              else
                                 $select = "";

                           echo '<option '.$select.' value="'.$value['EMAIL'].'">'.$value['FULLNAME'].'</option>';
                        }
                     ?>   
                  </select>
               </div>
            </div>

            <div class="form-group"  style="display: none">
               <label class="control-label col-sm-2" for="keyword">Keyword:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="<?=$data->KEYWORD?>">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="keyword">Photo:</label>
               <div class="col-sm-4">
                  <input type="file" name="photo"  class="form-control">
                  <input type="hidden" name="image" value="<?=$data->IMAGE;?>">
               </div>
            </div>

            <?php
               if(isset($data->IMAGE) != "")
               {
                  ?>
                   <div class="form-group">
                     <label class="control-label col-sm-5" for="keyword">
                        <img src="<?=site_url("assets/images/thumb/".$data->IMAGE)?>" style="max-width:800px">
                     </label>
                  </div>
                  <?php
               }
            ?>

            <div class="form-group">
               <label class="control-label col-sm-2" for="caption">Caption:</label>
               <div class="col-sm-10">
                  <textarea id="caption" name="caption" rows="4" cols="80"><?=$data->CAPTION?></textarea>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="youtube_url">Youtube URL:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="Youtube URL" value="<?=$data->VIDEO?>">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="type">Type:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input <?php if($data->TIPE == 'REGULAR') echo 'checked="checked"'; ?> type="radio" value="REGULAR" name="type">Regular</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input <?php if($data->TIPE == 'HEADLINE') echo 'checked="checked"'; ?> type="radio" value="HEADLINE" name="type">Headline</label>
                  </div>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="editor_pick">Editor Pick:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input <?php if($data->EDITORPICK == 0) echo 'checked="checked"'; ?> type="radio" value="0" name="editor_pick">NO</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input <?php if($data->EDITORPICK == 1) echo 'checked="checked"'; ?> type="radio" value="1" name="editor_pick">YES</label>
                  </div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="status">Status:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input <?php if($data->STATUS == 1) echo 'checked="checked"'; ?> type="radio" value="1" name="status">Publish</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input <?php if($data->STATUS == 0) echo 'checked="checked"'; ?> type="radio" value="0" name="status">UnPublish</label>
                  </div>
               </div>
            </div>         

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="editor_pick">Sticky</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input <?php if($data->STICKY == '' || $data->STICKY == 0) echo 'checked="checked"'; ?> type="radio" value="0" name="sticky">NO</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input <?php if($data->STICKY == 1) echo 'checked="checked"'; ?> type="radio" value="1" name="sticky">YES</label>
                  </div>
               </div>
            </div>
  

            <?php 
               $temp = explode(" ", $data->PUBLISH_TIMESTAMP);
               $d = explode("-", $temp[0]);
               $date = isset($temp[0]) ? $d[2].'-'.$d[1].'-'.$d[0] : date("d-m-Y");
               $time = isset($temp[1]) ? $temp[1] : date("H:i:s");
            ?>

            <div class="form-group">
               <label class="control-label col-sm-2" for="upperdeck">Publish Date:</label>
               <div class="col-sm-10">
                  <input type='text' class="form-control" id='publish_date' name="publish_date" value="<?=$date?>" />
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="publish_time">Publish Time:</label>
               <div class="col-sm-10">
                  <input type='text' class="form-control" id='publish_time' name="publish_time" value="<?=$time;?>" />
               </div>
            </div>
            
            <div class="form-group"> 
               <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" name="saveData" value="submit">Save</button>
                  <button type="submit" class="btn btn-success" name="saveData" value="preview">Preview</button>
                  <a href="javascript: history.back()" class="btn btn-primary">Kembali</a>
               </div>
            </div>
         </form>

      </div>
      <!-- /.box-body -->
   </div>
</div>

<script type="text/javascript">
   $('#category').select2();
   $('#redaktur').select2();
   $('#reporter').select2();
   // CKEDITOR.replace('taicing');
   CKEDITOR.replace('editor1');
   CKEDITOR.replace('caption');

   $(function () {
      $('#publish_date').datetimepicker({
             format: 'dd-mm-yyyy',
              minView: 2,
              maxView: 4,
              autoclose: true
      });

      $('#publish_time').timepicker({
          showMeridian: false,
          showSeconds: true,
      });
   });

   $(function(){

      $('#title_counter').html($('#title').val().length +'/70');
      $('#upperdeck_counter').html($('#upperdeck').val().length +'/70');
      $('#taicing_counter').html($('#taicing').val().length +'/160');


      $('#title').keyup(function(){
         var charsno = $(this).val().length;
         $('#title_counter').html(charsno +'/70');
      });
      $('#upperdeck').keyup(function(){
         var charsno = $(this).val().length;
         $('#upperdeck_counter').html(charsno +'/70');
      });
      $('#taicing').keyup(function(){
         var charsno = $(this).val().length;
         $('#taicing_counter').html(charsno +'/160');
      });
   });

</script>