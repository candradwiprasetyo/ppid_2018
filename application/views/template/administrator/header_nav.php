   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>webmin" class="logo">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini">PPID</span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg"><b>Admin</b> PPID</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
               <span class="sr-only">Toggle navigation</span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/images/no-people.png" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?=$ddtc['FULLNAME'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                           <!-- User image -->
                           <li class="user-header">
                              <img src="<?= base_url() ?>assets/images/no-people.png" class="img-circle" alt="User Image">                             
                           </li>                           
                           <!-- Menu Footer-->
                           <li class="user-footer">                              
                              <div class="pull-right">
                                 <a href="<?=site_url('webmin/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                           </li>
                        </ul>
                     </li>                     
                  </ul>
               </div>
            </nav>
         </header>