<div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- top-card-surat -->
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">mail_outline</i>
                  </div>
                  <p class="card-category">Surat Masuk</p>
                  <h3 class="card-title sm"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">inbox</i>&nbsp;<span class="sm"></span> &nbsp; Surat Masuk
                  </div>
                </div>
              </div>
            </div>
            <!-- top-card-surat -->

            <!-- top-card-surat -->
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">send</i>
                  </div>
                  <p class="card-category">Surat Keluar</p>
                  <h3 class="card-title sk"></h3>
                </div>
                <div class="card-footer">
                 <div class="stats">
                  <i class="material-icons">send</i>&nbsp;<span class="sk"></span> &nbsp; Surat Keluar
                </div>
              </div>
            </div>
          </div>
          <!-- top-card-surat -->

          <!-- top-card-surat -->
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">people_outline</i>
                </div>
                <p class="card-category">Jumlah Users</p>
                <h3 class="card-title j_users"></h3>
              </div>
              <div class="card-footer">
               <div class="stats">
                <i class="material-icons">people_outline</i>&nbsp;<span class="j_users"></span> &nbsp; Jumlah Users
              </div>
            </div>
          </div>
          <!-- top-card-surat -->
        </div>
            </div>
          </div>
        </div>
      </div>

<script>
  $.ajax({
	  type: 'get',
    url: "<?= base_url('dashboard/tampil_jumlah_sm') ?>",
    data: { nik: <?= $this->session->userdata('nik') ?> },
    crossDomain: true,
	  cache: false,
	  success: function (msg) {
        $('.sm').text(msg);
	  }
	});
</script>

<script>
  $.ajax({
	  type: 'get',
    url: "<?= base_url('dashboard/tampil_jumlah_sk') ?>",
    data: { nik: <?= $this->session->userdata('nik') ?> },
    crossDomain: true,
	  cache: false,
	  success: function (msg) {
        $('.sk').text(msg);
        // alert(msg);
        // console.log(msg);
	  }
	});
</script>

<script>
  $.ajax({
	  type: 'get',
    url: "<?= base_url('dashboard/tampil_jumlah_users') ?>",
    crossDomain: true,
	  cache: false,
	  success: function (msg) {
        $('.j_users').text(msg);
	  }
	});
</script>

