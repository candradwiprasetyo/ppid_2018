<style type="text/css">
  .select2-container {
    z-index: 99999;
        background-color: #FFFFFF;
    background-image: none;
    border: 1px solid #e5e6e7;
    border-radius: 1px;
    color: inherit;
    display: block;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 350px !important;
    font-size: 14px;
}
</style>
<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Fokus</b></h3>
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
    <div id="formModalSub" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Modal Header</h4>
          </div>
          <div class="modal-body">
            <div id="error_code" style="color: red">
                
            </div>
            
            <form id="form-Sub" class="form-horizontal" method="post" >
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="article">Artikel</label>
                <div class="col-sm-10">
                  <select class="form-control" name="article" id="article">
                      
                  </select>
                </div>
              </div>            

              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="fokus_id" id="fokus_id">
                  <a id="submit-form-sub" class="btn btn-primary">Submit</a>
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
                <label class="control-label col-sm-2" for="judul">Judul:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                </div>
              </div>

              <div class="form-group">
                  <label class="control-label col-sm-2" for="masa_asuransi">Status:</label>
                  <div class="col-sm-10"> 
                    <div class="radio-inline">
                       <label><input type="radio" value="1" name="status">Publish</label>
                    </div>
                    
                    <div class="radio-inline">
                       <label><input type="radio" value="0" name="status">UnPublish</label>
                    </div>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="tgl">Tanggal Publish:</label>
                <div class="col-sm-10"> 
                  <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Index Rate" value="<?= date("d-m-Y H:i:s")?>">
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

    <script type="text/javascript">   
    var table;
        $(document).ready(function() {      

            table = $('#data_place').DataTable({
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('webmin/fokus/data/ajax')?>",
                    "type": "POST"
                },
                columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "3" },
                    { data: "2" },
                    { data: "4", orderable: false },
                ],

                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },
                ],    
            });
                
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

        $("#submit-form-sub").click(function() {
            var form = $('#form-Sub');
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
                        $("#formModalSub").modal('hide');
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
                $(".modal-title").html("Edit Data Fokus");
                $('#form').attr('action', '<?php echo site_url('webmin/fokus/store')?>');
                $("#judul").val("");                      
                //$("#tgl").val("");
                $('input:radio[name=status][value=1]').click();
                $("#id").val("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/fokus/edit')?>/'+id,
                    data: {
                        'id' : id,
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data Fokus");
                        $("#judul").val(data.TITLE);
                        $("#id").val(data.ID);

                        var day = data.PUBLISH_TIMESTAMP.split(" ");
                        var date = day[0].split("-");
                        var new_date = date[2] + '-' + date[1] + '-' + date[0];

                        $("#tgl").val(new_date+' '+day[1]);
                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        $('#form').attr('action', '<?php echo site_url('webmin/fokus/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

        $('#tgl').datetimepicker({
               format: 'dd-mm-yyyy hh:ii:ss'
         });


        $('#article').select2();

        function addSub(id){
          $("#formModalSub").modal('show');
          $("#fokus_id").val(id);
          $('#form-Sub').attr('action', '<?php echo site_url('webmin/fokus/sub/store')?>');
          $('#article').html("");
          $('#article').select2({
            placeholder: '--- Select Item ---',
            ajax: {
              url: '<?php echo site_url('webmin/fokus/get/sub')?>/'+id,
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                return {
                  results: data
                };
              },
              cache: true
            }
          }); 
        }
         
    </script>

    