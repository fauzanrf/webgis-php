
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li>
        <a href="<?=url('beranda')?>">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>

          <?php if ($session->get('level')=='Admin'): ?>
        <li>
        <a href="<?=url('data')?>">
            <i class="fa fa-dashboard"></i> <span>Data Sekolah</span>
          </a>
        </li>
        <?php endif ?>  

         <?php if ($session->get('level')=='User'): ?>
         <li>
        <a href="<?=url('leaflet-standar')?>">
            <i class="fa fa-dashboard"></i> <span>Geografis</span>
          </a>
        </li>
      <?php endif?>
       


        <li>
        <a href="<?=url('leaflet-routingmachine')?>">
            <i class="fa fa-map"></i> <span>Rute Sekolah</span>
          </a>
        </li>

        <li>
          <a href="<?=url('logout')?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
