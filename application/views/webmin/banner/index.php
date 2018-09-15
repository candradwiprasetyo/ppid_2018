<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Banner</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">      
        <ul class="nav nav-pills" style="margin-bottom: 10px">
            <li class="active"><button type="button" onclick="showModal()" class="btn btn-primary">Add Data</button>  </li>
         </ul>
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>Order No</th>
                  <th>Title</th>
                  <th>Position </th>
                  <th>Status</th>
                  <th>Period</th>
                  <th>Hit </th>
                  <th>-</th>
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
                <label class="control-label col-sm-2" for="title">TITLE:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Nama">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="url">Url:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="url" id="url" placeholder="URL">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="url">Position:</label>
                <div class="col-sm-10">
                  <select name="POS" id="POS" class="form-control">       
                    <option value="">-- POSITION --</option>  
                    <option value="header">HEADER (960x250)</option>
                    <option value="bottom">BOTTOM (1000x445)</option>
                    <option value="section-0">SECTION-0 (360x300)</option>
                    <option value="section-1">SECTION-1 (445x1000)</option>
                    <option value="section-2">SECTION-2 (445x1000)</option>
                    <option value="section-3">SECTION-3 (445x1000)</option>
                    <option value="section-4">SECTION-4 (445x1000)</option>              
                    <option value="mobile">MOBILE (960x250)</option>              
                    <option value="wing-left">WING-LEFT (181x500)</option>              
                    <option value="wing-right">WING-RIGHT (181x500)</option>
                    <option value="bottom-data-alat">BOTTOM DATA & ALAT</option>     
                    <option value="bottom-detail-news">BOTTOM DETAIL NEWS</option>            
                  </select>
                </div>
              </div>

              <div class="form-group">
               <label class="control-label col-sm-2" for="publish">Publish:</label>
               <div class="col-sm-6">
                  <input type="text" name="publish" class="form-control" id="publish" value="<?=date("d-m-Y")?> - <?=date("d-m-Y")?>" />
               </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="order">Order:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="order" id="order" placeholder="order">
                </div>
              </div>            

              <div class="form-group">
               <label class="control-label col-sm-2" for="keyword">Image:</label>
               <div class="col-sm-6">
                  <input type="file" name="photo" id="photo"  class="form-control">
                  <input type="hidden" name="image" id="image" >
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
                    "url": "<?php echo site_url('webmin/banner/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                    { data: "4" },
                    { data: "5" },
                    { data: "6" },
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
                $(".modal-title").html("Add Data Banner");
                $('#form').attr('action', '<?php echo site_url('webmin/banner/store')?>');
                $("#title").val("");
                $("#url").val("");
                $("#POS").val("").change();
                $("#image").val("");
                $("#id").val("");
                $("#temp_image").html("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                
                $.ajax({ 
                    url: '<?php echo site_url('webmin/banner/edit')?>/'+id,
                    data: {
                        'id' : id,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data Banner");

                        $("#title").val(data.TITLE);
                        $("#url").val(data.URL);
                        $("#POS").val(data.POS).change();
                        $("#image").val(data.FILENAME);

                        if(data.FILENAME != "")
                        {
                          var img = "<img  src='<?=site_url('assets/images/banners')?>/"+data.FILENAME+"' width='100px' height='100px' />";
                          $("#temp_image").html(img);
                        }
                        var start_date = data.START_DATE.split("-");
                        var end_date = data.END_DATE.split("-");

                        var daterange = start_date[2] + '-' + start_date[1] + '-' + start_date[0] +" - "+end_date[2] + '-' + end_date[1] + '-' + end_date[0];
                        $("#publish").val(daterange); 
                        $("#order").val(data.ORDERNUM);

                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        $("#id").val(data.ID);                        

                        $('#form').attr('action', '<?php echo site_url('webmin/banner/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

      $('input[name="publish"]').daterangepicker({
          timePicker: false,
          timePickerIncrement: 0,
          locale: {
            format: 'DD-MM-YYYY'
          }
      });

      function hapusBanner(id)
      {
        if (confirm("Apakah anda yakin menghapus banner ini ?") == true) {
            window.location.href = "<?=site_url("webmin/banner/destroy");?>/"+id;
          }
      }
</script>