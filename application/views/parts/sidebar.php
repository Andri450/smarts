<div class="sidebar" data-color="azure" data-background-color="black" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="javascript:void(0);" class="simple-text logo-mini">
          SM
        </a>
        <a href="javascript:void(0);" class="simple-text logo-normal">
          Smart
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?php echo base_url('assets/img/faces/') . $this->session->userdata('foto'); ?>"/>
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $this->session->userdata('name'); ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> P </span>
                    <span class="sidebar-normal"> Profil </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Setting </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Login/signout') ?>">
                    <span class="sidebar-mini"> LO </span>
                    <span class="sidebar-normal"> Log out </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item dashboard">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url(); ?>suratmasuk">
              <i class="material-icons">email</i>
              <p> Surat Masuk </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">drafts</i>
              <p> Surat Keluar
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item suratkeluar">
                  <a class="nav-link" href="<?= base_url('suratkeluar') ?>">
				  <span class="sidebar-mini"> SK </span>
                    <span class="sidebar-normal"> Data Surat Keluar </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?= base_url('SuratKeluar/tambah_surat') ?>">
				  <span class="sidebar-mini"> BS </span>
                    <span class="sidebar-normal"> Buat Surat Keluar </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesDisposisi">
              <i class="material-icons">next_week</i>
              <p> Disposisi
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesDisposisi">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="pages/pricing.html">
				  <span class="sidebar-mini"> SK </span>
                    <span class="sidebar-normal"> Surat Keluar </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="pages/rtl.html">
				  <span class="sidebar-mini"> SM </span>
                    <span class="sidebar-normal"> Surat Masuk </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesUsers">
              <i class="material-icons">people</i>
              <p> Manajemen Pengguna
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesUsers">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="pages/pricing.html">
				  <span class="sidebar-mini"> DP </span>
                    <span class="sidebar-normal"> Data Pengguna </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="pages/rtl.html">
				  <span class="sidebar-mini"> TP </span>
                    <span class="sidebar-normal"> Tambah Pengguna </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- <script>
      $('.nav-item').click(function(){
      $('li a').removeClass("active");
      $(this).addClass("active");}

    </script> -->