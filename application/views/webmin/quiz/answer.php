<div class="box-body">
   <div class="box">
      <div class="box-header">         
         <h3 class="box-title"><b>Data Answer <?=$data->TITLE?></b></h3>
      </div>
      <!-- /.box-header --> 
      <div class="box-body">
        
         <table id="data_place" width="100%" class="table table-bordered table-striped">
            <thead> 
               <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Answer </th>
                  <th>Phone </th>
                  <th>University </th>
                  <th>Twitter </th>
                  <th>Facebook </th>
                  <th>Instagram </th>
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
                    "url": "<?php echo site_url('webmin/quiz/data/answer/ajax')?>",
                    "type": "POST",
                    "data":{
                      "quiz_id" :<?=$this->uri->segment(4)?>
                    }
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

</script>