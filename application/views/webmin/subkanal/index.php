<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Sub Kanal</b></h3>
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
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>SEO</th>
                  <th>TYPE</th>
                  <th>URL</th>
                  <th>POS</th>
                  <th>STATUS</th>
                  <th width="220px">-</th>
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
                <label class="control-label col-sm-2" for="category">Category:</label>
                <div class="col-sm-10">
                  <select class="form-control" name="category" id="category">
                  	<option>-Silahkan Pilih-</option>
                  	<?php
                  		foreach ($category as $key => $value) {
                  			echo "<option value='".$value['ID']."'>".$value['CATEGORY_NAME']."</option>";
                  		}
                  	?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="seo">SEO:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="seo" id="seo" placeholder="SEO">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="type">TYPE:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="type" id="type" placeholder="TYPE">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="url">URL:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="url" id="url" placeholder="URL">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="pos">POS:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pos" id="pos" placeholder="POS">
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
                    "url": "<?php echo site_url('webmin/subKanal/data/ajax')?>",
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
                    { data: "7" },
                    { data: "8" },
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
                $(".modal-title").html("Add Data Sub Kanal");
                $('#form').attr('action', '<?php echo site_url('webmin/subKanal/store')?>');
                $("#name").val("");
                $("#type").val("");
                $("#url").val("");
                $("#pos").val("");
                $("#seo").val("");
                $("#id").val("");
                $("#category option[value='']").prop('selected', true);
                $("#formModal").modal('show');
            } else {
                $(".loader").show();
                $.ajax({ 
                    url: '<?php echo site_url('webmin/subKanal/edit')?>/'+id,
                    data: {
                        'single' : true
                    },
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $(".loader").hide();
                        $(".modal-title").html("Edit Data Sub KANAL");
                        
                        $("#name").val(data.SUBCATEGORY_NAME);
                        $("#type").val(data.TYPE);
                        $("#url").val(data.URL);
                        $("#pos").val(data.POS);
                        $("#seo").val(data.SEO);
                        $("#id").val(data.ID);
                        $("#category option[value='"+data.CATEGORY_ID+"']").prop('selected', true);

                        
                        if(data.STATUS == "1")
                          $('input:radio[name=status][value=1]').click();
                        else
                          $('input:radio[name=status][value=0]').click();

                        $('#form').attr('action', '<?php echo site_url('webmin/subKanal/put')?>');
                        $("#formModal").modal('show');
                    }
                });

            }
            
        }

        function hapusSubkanal(id)
      	{
        	if (confirm("Apakah anda yakin menghapus data ini ?") == true) {
            	window.location.href = "<?=site_url("webmin/subKanal/destroy");?>/"+id;
          	}
      	}
</script>