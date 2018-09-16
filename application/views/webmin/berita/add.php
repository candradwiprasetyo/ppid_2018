<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Add Data Artikel</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <form class="form-horizontal" action="<?=site_url('webmin/berita/save');?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label class="control-label col-sm-2" for="title">Title:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title" maxlength="70">
                  <div id="title_counter">0/70</div>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="upperdeck">Upperdeck:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="upperdeck" id="upperdeck" placeholder="Upperdeck" maxlength="70">
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
                              echo '<option  value="'.$valueSub['ID'].'">'.$valueSub['SUBCATEGORY_NAME'].'</option>';
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
                  <textarea id="taicing" name="taicing" rows="4" cols="80" class="form-control" maxlength="160"></textarea>
                  <div id="taicing_counter">0/160</div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="title">Content:</label>
               <div class="col-sm-10">
                  <textarea id="editor1" name="editor1" rows="4" cols="80"></textarea>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="reporter">Reporter:</label>
               <div class="col-sm-6">
                  <select name="reporter" id="reporter" class="form-control">
                     <option value="">-reporter-</option>
                     <?php
                        foreach ($reporter as $key => $value) {                           
                           echo '<option value="'.$value['EMAIL'].'">'.$value['FULLNAME'].'</option>';
                        }
                     ?>   
                  </select>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="redaktur">Redaktur:</label>
               <div class="col-sm-6">
                  <select name="redaktur" id="redaktur" class="form-control">
                     <option value="">-redaktur-</option>
                     <?php
                        foreach ($redaktur as $key => $value) {
                           echo '<option value="'.$value['EMAIL'].'">'.$value['FULLNAME'].'</option>';
                        }
                     ?>   
                  </select>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="keyword">Keyword:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword" >
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="keyword">Photo:</label>
               <div class="col-sm-4">
                  <input type="file" name="photo"  class="form-control">
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="caption">Caption:</label>
               <div class="col-sm-10">
                  <textarea id="caption" name="caption" rows="4" cols="80"></textarea>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="youtube_url">Youtube URL:</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="youtube_url" id="youtube_url" placeholder="Youtube URL" >
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="type">Type:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input checked="checked"' type="radio" value="REGULAR" name="type">Regular</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input type="radio" value="HEADLINE" name="type">Headline</label>
                  </div>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="editor_pick">Editor Pick:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input checked="checked" type="radio" value="0" name="editor_pick">NO</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input type="radio" value="1" name="editor_pick">YES</label>
                  </div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="status">Status:</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input checked="checked" type="radio" value="1" name="status">Publish</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input  type="radio" value="0" name="status">UnPublish</label>
                  </div>
               </div>
            </div>

            <div class="form-group" style="display: none">
               <label class="control-label col-sm-2" for="editor_pick">Sticky</label>
               <div class="col-sm-10">
                  <div class="radio-inline">
                     <label><input checked="checked" type="radio" value="0" name="sticky">NO</label>
                  </div>
                  
                  <div class="radio-inline">
                     <label><input type="radio" value="1" name="sticky">YES</label>
                  </div>
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="upperdeck">Publish Date:</label>
               <div class="col-sm-10">
                  <input type='text' class="form-control" id='publish_date' name="publish_date" value="<?=date("d-m-Y");?>" />
               </div>
            </div>

            <div class="form-group">
               <label class="control-label col-sm-2" for="publish_time">Publish Time:</label>
               <div class="col-sm-10">
                  <input type='text' class="form-control" id='publish_time' name="publish_time" value="<?=date("H:i:s");?>" />
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