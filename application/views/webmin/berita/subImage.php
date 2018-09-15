<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Artikel</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="nav nav-pills" style="margin-bottom: 10px">
            <li class="active"><button type="button" onclick="showModal()" class="btn btn-primary">Add Data</button>  </li>
         </ul>
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Caption</th>
                  <th>urut</th>
                  <th>Image</th>
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
                <label class="control-label col-sm-2" for="nama">Caption:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="caption" id="caption" placeholder="Caption">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="urut">Urut:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="urut" id="urut" placeholder="Urut">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="photo">Photo:</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="photo" id="photo">
                  <input type="hidden" class="form-control" name="image" id="image">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-5" for="photo">
                    <div id="temp_image"></div>
                </label>                
              </div>

              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="id" id="id">
                  <input type="hidden" name="id_article" id="id_article" value="<?=$this->uri->segment(4);?>">
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
                    "url": "<?php echo site_url('webmin/berita/data/image/ajax')?>",
                    "type": "POST",
                    "data":{
                      "ARTICLE_ID" :<?=$this->uri->segment(4)?>
                    }
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
                $(".modal-title").html("Add Data Writer");
                $('#form').attr('action', '<?php echo site_url('webmin/berita/image/store')?>');
                $("#caption").val("");
                $("#urut").val("");
                $("#image").val("");
                $("#temp_image").html("");
                $("#id").val("");
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/berita/image/edit')?>/'+id,
                    data: {
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data Writer");
                        $("#caption").val(data.CAPTION);
                        $("#urut").val(data.SEQNUMBER);
                        $("#image").val(data.IMAGE);
                        if(data.IMAGE != "")
                        {
                          var img = '<img width="100px" src="<?=site_url("assets/images/view")?>/'+data.IMAGE+'" />'; 
                          $("#temp_image").html(img);
                        }
                        $("#id").val(data.ID);

                        $('#form').attr('action', '<?php echo site_url('webmin/berita/image/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

        function hapus(article_id, id)
        {
          if (confirm("Apakah anda yakin menghapus data ini ?") == true) {
            window.location.href = "<?=site_url("webmin/berita/image/destroy");?>/"+article_id+"/"+id;
          }
        }
</script>