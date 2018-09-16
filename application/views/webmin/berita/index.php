<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Artikel</b></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="nav nav-pills" style="margin-bottom: 10px">
            <li class="active"><a href="<?=site_url('webmin/berita/add');?>">Add Data</a></li>
         </ul>
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead>
               <tr>
                  <th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>Title</th>
                  <th>Photo</th>
                  <th>Category</th>
                  <th>Publish Date</th>
                  <!-- <th>Sticky</th> -->
                  <th>Status</th>
                  <th>Headline</th>
                  <!-- <th>Editor's Pick</th> -->
                  <!-- <th>Hit</th> --> 
                  <th style="width: 220px;">-</th>
               </tr>
            </thead>
            <tbody>               
            </tbody>
         </table>
      </div>
      <!-- /.box-body -->
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
                    "url": "<?php echo site_url('webmin/berita/data/ajax')?>",
                    "type": "POST"
                },

                 columns: [
                    { data: "0" },
                    { data: "1" },
                    { data: "2" },
                    { data: "3" },
                    { data: "4" },
                    { data: "5" },
                    { data: "6" , orderable: false},
                    { data: "7" , orderable: false},
                ],
                "columnDefs": [
                { 
                    "targets": [ 0 ],
                    "orderable": false,
                },
                ],    });
                
        } );

        function hapus(id)
        {
          if (confirm("Apakah anda yakinmenghapus artikel ini ?") == true) {
            window.location.href = "<?=site_url("webmin/berita/destroy");?>/"+id;
          }
        }
</script>