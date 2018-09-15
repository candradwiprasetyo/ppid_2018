<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Subcriber</b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Telp </th>
                  <th>Email</th>
                  <th>Reg Timestamp</th>
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
                <label class="control-label col-sm-2" style="padding-top: 0px" for="nama">Nama:</label>
                <div class="col-sm-10">
                  <span id="nama"></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" style="padding-top: 0px" for="nama">Telpon:</label>
                <div class="col-sm-10">
                  <span id="telpon"></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" style="padding-top: 0px" for="nama">Email:</label>
                <div class="col-sm-10">
                  <span id="email"></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" style="padding-top: 0px" for="nama">Alamat:</label>
                <div class="col-sm-10">
                  <span id="alamat"></span>
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
                    "url": "<?php echo site_url('webmin/subcriber/data/ajax')?>",
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

        function showModal(email)
        {   
            
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/subcriber/view')?>',
                    data: {
                        'email' : email,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Data Subcriber");
                        $("#nama").html(data.NAME);                      
                        $("#telpon").html(data.PHONE);                      
                        $("#email").html(data.EMAIL);
                        $("#alamat").html(data.ADDRESS);
                        $('#form').attr('action', '<?php echo site_url('webmin/penulis/put')?>');
                        $("#formModal").modal('show');
                    }
                });
            
        }
</script>