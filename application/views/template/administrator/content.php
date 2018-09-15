         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
               <!-- Small boxes (Stat box) -->
               <div class="row">
                  <?php 
                     if($content != null)
                        $this->view($content, $data); 
                  ?>
               </div>
               <!-- /.row (main row) -->
            </section>
            <!-- /.content -->
         </div>