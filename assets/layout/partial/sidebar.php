<?php

defined('__VALID_ENTRANCE') or die('Dilarang Akses Halaman Ini :v');

require_once("../common/menu.php");

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
    </div>
    <div class="info">
      <a href="#" class="d-block"><?php echo $judul;?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
             <?php foreach($menu as $key => $value) {
               ?>
               <li class="nav-item">
               <a href="<?php echo $value['link'];?>" class="nav-link">
                 <i class="nav-icon fas fa-th"></i>
                 <p>
                   <?php echo $value['name'];?>
                   <span class="right badge badge-danger">New</span>
                 </p>
               </a>
               </li>
             <?php } ?>
         </ul>
       </nav>
       <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
   </aside>
