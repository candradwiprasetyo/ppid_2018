<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?= base_url() ?>assets/images/no-people.png" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?=$ddtc['FULLNAME'];?></p>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">MAIN NAVIGATION</li>
         <li>
            <a href="<?=site_url('webmin/berita')?>">
            <i class="fa fa-th"></i> <span>Berita</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/fokus')?>">
            <i class="fa fa-th"></i> <span>Fokus</span>
            </a>
         </li>
         <?php 
            if($ddtc['ROLE'] == "superadmin")
            {
         ?>
         <li>
            <a href="<?=site_url('webmin/account')?>">
            <i class="fa fa-th"></i> <span>Akun</span>
            </a>
         </li>
         <?php 
            }
         ?>
         <li>
            <a href="<?=site_url('webmin/penulis')?>">
            <i class="fa fa-th"></i> <span>Penulis</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/kanal')?>">
            <i class="fa fa-th"></i> <span>Kanal</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/subKanal')?>">
            <i class="fa fa-th"></i> <span>Sub Kanal</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/static')?>">
            <i class="fa fa-th"></i> <span>Static</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/indikator')?>">
            <i class="fa fa-th"></i> <span>Indikator</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/indikator_detail')?>">
            <i class="fa fa-th"></i> <span>Kurs Pajak</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/banner')?>">
            <i class="fa fa-th"></i> <span>Banner</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/popup')?>">
            <i class="fa fa-th"></i> <span>Pop Up</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/quiz')?>">
            <i class="fa fa-th"></i> <span>Quiz</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/subcriber')?>">
            <i class="fa fa-th"></i> <span>Subscriber</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/publikasi')?>">
            <i class="fa fa-th"></i> <span>Publikasi</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/lomba')?>">
            <i class="fa fa-th"></i> <span>Lomba</span>
            </a>
         </li>
         <li>
            <a href="<?=site_url('webmin/config')?>">
            <i class="fa fa-th"></i> <span>Config</span>
            </a>
         </li>

      </ul>
   </section>
   <!-- /.sidebar -->
</aside>