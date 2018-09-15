<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Publikasi</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Hit </th>
                  <th>Download</th>
                  <th>Status</th>
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
        <div class="modal-content" style="width: 130%;margin-left: -5%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div id="error_code" style="color: red">
                
            </div>
            
            <form id="form" class="form-horizontal" method="post" >              
              <div class="form-group">
                <label class="control-label col-sm-2" for="judul">Judul:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="upperdeck">Upperdeck:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="upperdeck" id="upperdeck" placeholder="Upperdeck">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="isi">Isi:</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="isi" id="isi"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="photo">Cover:</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="photo" id="photo">
                  <input type="hidden" name="image" id="image">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-6" for="photo">
                  <div id="temp_image">
                    
                  </div>

                </label>                  
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="file_pdf">Pdf:</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="file_pdf" id="file_pdf">
                  <input type="hidden" name="pdf" id="pdf">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="file_pdf">Tanggal Rilis:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="tgl_rilis" id="tgl_rilis">
                </div>
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
                    "url": "<?php echo site_url('webmin/publikasi/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                    { data: "4" },
                    { data: "5" },
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

                $(".modal-title").html("Add Data Publikasi");
                $('#form').attr('action', '<?php echo site_url('webmin/publikasi/store')?>');
                $("#urut").val("");
                $("#component").val("");
                $("#realisasi").val("");
                $("#periode").val("");
                $("#id").val("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/publikasi/edit')?>/'+id,
                    data: {
                        'id' : id,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {                      
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data Publikasi");
                        $("#judul").val(data.TITLE);
                        $("#upperdeck").val(data.UPPERDECK);
                        $("#isi").val(data.CONTENT);
                        $("#realisasi").val(data.REALIZATION);
                        $("#periode").val(data.PERIOD);
                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        if(data.IMAGE != "")
                        {
                          var img = '<img width="150px" src="<?=site_url('assets/images/thumb')?>/'+data.IMAGE+'"></img>';
                          $("#temp_image").html(img);
                        }
                        $("#image").val(data.IMAGE);
                        $("#pdf").val(data.PDF);
                        $("#tgl_rilis").val(data.PUBLISH_TIMESTAMP);

                        $("#id").val(data.ID);
                        $('#form').attr('action', '<?php echo site_url('webmin/publikasi/put')?>');
                        $("#formModal").modal('show');
                        CKEDITOR.replace('isi');
                    }
                });

            }
            
        }

    $(function () {
      $('#tgl_rilis').datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss'
      });
   });
</script>