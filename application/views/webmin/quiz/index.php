<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Quiz</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
        <ul class="nav nav-pills" style="margin-bottom: 10px">
            <li class="active"><button type="button" onclick="showModal()" class="btn btn-primary">Add Data</button>  </li>
         </ul>
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>ID</th>
                  <th>Quistion</th>
                  <th>Period </th>
                  <th>Status</th>
                  <th width="200px">-</th>
               </tr>
            </thead>
            <tbody>               
            </tbody>
         </table>
      </div>
      <!-- /.box-body -->
   </div>
</div>

<!-- Modal -->
    <div id="formModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div id="error_code" style="color: red">
                
            </div>
            
            <form id="form" class="form-horizontal" method="post" >
              <div class="form-group">
                <label class="control-label col-sm-2" for="title">Title:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="question">QUESTION:</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="question" id="question" rows="5"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="option_a">Option A:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="option_a" id="option_a" placeholder="Option A">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="option_b">Option B:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="option_b" id="option_b" placeholder="Option B">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="option_c">Option C:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="option_c" id="option_c" placeholder="Option C">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="option_d">Option D:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="option_d" id="option_d" placeholder="Option D">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="answer">Answer</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="answer" id="answer" placeholder="Answer">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="periode">Periode</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="periode" id="periode" placeholder="Periode">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="photo">Photo</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="photo" id="photo">
                  <input type="hidden" name="image" id="image">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-5">
                    <div id="temp_image">
                      
                    </div>
                </label>                
              </div>

              <div class="form-group">
                  <label class="control-label col-sm-2" for="status">Status:</label>
                  <div class="col-sm-10"> 
                    <div class="radio-inline">
                       <label><input type="radio" value="1" name="status">Aktif</label>
                    </div>
                    
                    <div class="radio-inline">
                       <label><input type="radio" value="0" name="status">Non Aktif</label>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="role">Role:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="role" id="role">
                    <option value="superadmin">SUPERADMIN</option>
                    <option value="admin">ADMIN</option>
                    <option value="reporter">REPORTER</option>
                  </select>
                </div>
              </div>

              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="id" id="id">
                  <a id="submit-form" class="btn btn-primary">Submit</a>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
<script>
   		var table; 
        $(document).ready(function() {
            table = $('#data_place').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('webmin/quiz/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                    { data: "4" },
                ],
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],    });
                
        } );

        $("#submit-form").click(function() {
            var form = $('#form');
            var data = new FormData($("#form")[0]);
             $.ajax( {
                type: "POST",
                dataType: "json",
                url: form.attr( 'action' ),
                processData: false,
                contentType: false,
                data: data,
                success: function(data){
                    if(data.error === true)
                    {
                        $("#error_code").html(data.message).show().delay(1000).fadeOut();
                    } else {
                        $("#formModal").modal('hide');
                        swal('Succes!', data.message, 'success').catch(swal.noop);
                        table.ajax.reload();
                    }
                }
            } );
        });

        function showModal(type = 'add', id = 0)
        {   
            if(type == 'add')
            {
                $(".modal-title").html("Add Data QUIZ");
                $('#form').attr('action', '<?php echo site_url('webmin/quiz/store')?>');
                $("#title").val("");
                $("#question").val("");                        
                $("#option_a").val("");
                $("#option_b").val("");
                $("#option_c").val("");
                $("#option_d").val("");
                $("#answer").val("");
                $("#image").val("");
                $("#temp_image").html("");
                $("#id").val("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/quiz/edit')?>/'+id,
                    data: {
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {                      
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data QUIZ");
                        $("#title").val(data.TITLE);
                        $("#question").val(data.QUESTION);                        
                        $("#option_a").val(data.OPTION_A);
                        $("#option_b").val(data.OPTION_B);
                        $("#option_c").val(data.OPTION_C);
                        $("#option_d").val(data.OPTION_D);
                        $("#answer").val(data.ANSWER);
                        $("#image").val(data.IMAGE);
                        var date = data.START_DATE+" - "+data.END_DATE;
                        $("#periode").val(date);
                        if(data.IMAGE != "")
                        {
                          var img = '<img width="200px" src="<?=site_url("assets/images/view")?>/'+data.IMAGE+'">';
                          $("#temp_image").html(img);
                        }

                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        $("#id").val(data.ID);

                        $('#form').attr('action', '<?php echo site_url('webmin/quiz/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

        $('#periode').daterangepicker({
          timePicker: false,
          timePickerIncrement: 0,
          locale: {
            format: 'YYYY-MM-DD'
          }
      });
</script>