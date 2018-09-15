<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Akun</b></h3>
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
                  <th>Nama</th>
                  <th>Akses</th>
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
                <label class="control-label col-sm-2" for="nama">Nama:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
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
                    "url": "<?php echo site_url('webmin/account/data/ajax')?>",
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
                $(".modal-title").html("Edit Data Akun");
                $('#form').attr('action', '<?php echo site_url('webmin/account/store')?>');
                $("#nama").val("");                      
                $("#email").val("");
                $("#password").val("");
                $("#id").val("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/account/edit')?>/'+id,
                    data: {
                        'id' : id,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data AKUN");
                        $("#nama").val(data.FULLNAME);
                        $("#email").val(data.EMAIL);
                        $("#id").val(data.ID);
                        $("#password").val(data.PASSWD);
                        $("#role").val(data.ROLE);
                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        $('#form').attr('action', '<?php echo site_url('webmin/account/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

        $('#tgl').datetimepicker({
          format: 'yyyy-mm-dd hh:ii:ss'
        });
</script>