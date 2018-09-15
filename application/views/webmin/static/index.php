<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Static Content</b></h3>
      </div>
      <!-- /.box-header -->  
      <div class="box-body">
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Static</th>
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
                <label class="control-label col-sm-2" for="content">Content:</label>
                <div class="col-sm-10">
                  <textarea id="content" name="content" rows="4" cols="40"></textarea>
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
                    "url": "<?php echo site_url('webmin/static/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
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
             $.ajax( {
                type: "POST",
                dataType: "json",
                url: form.attr( 'action' ),
                data: form.serialize(),
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
                $(".modal-title").html("Add Data STATIC");
                $('#form').attr('action', '<?php echo site_url('webmin/static/store')?>');
                $("#content").val("");
                $("#id").val("");
                $("#formModal").modal('show');
                 CKEDITOR.replace('content');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/static/edit')?>/'+id,
                    data: {
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data STATIC");                        
                        $("#id").val(data.ID);
                        CKEDITOR.instances.content.setData(data.CONTENT);
                        $('#form').attr('action', '<?php echo site_url('webmin/static/put')?>');
                        $("#formModal").modal('show');
                        
                    }
                });

            }


        }

       CKEDITOR.replace('content');
</script>