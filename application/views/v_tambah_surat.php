<body class="">
   
    <div class="content">
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-12">
              <section class="section">

                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="material-icons">add</i>
                    </div>
                    <h4 class="card-title title-per-section">
                      Tambah surat
                    </h4>
                  </div>

                  <div class="card-header">
                    <div class="row">
                    </div>

                    <div class="card-body">

                      <form id="simpan">
                        <div class="row mt-4">

                          <div class="form-group col-12">
                            <label for="agendaform" class="bmd-label-floating">Nomor agenda..</label>
                            <input type="number" name="no_agenda" class="form-control" id="agendaform">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <label for="j_suratform" class="bmd-label-floating">Jenis surat...</label>
                            <input type="text" name="jenis_surat" class="form-control" id="j_suratform">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <label for="tahunform" class="bmd-label-floating">Tahun...</label>
                            <input type="number" name="tahun" class="form-control" id="tahunform">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <label for="nosuratform" class="bmd-label-floating">Nomor surat...</label>
                            <input type="text" name="no_surat" class="form-control" id="nosuratform">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <input type="text" name="tgl_surat" class="form-control datepicker" placeholder="Tanggal surat...">
                          </div>

                          <div class="form-group col-12 mb-2">
                            <label for="perihalform" class="bmd-label-floating">Perihal...</label>
                            <input type="text" name="perihal" class="form-control" id="perihalform">
                          </div>

                          <div class="form-group col-12 mb-2">
                            <label for="suratdariform" class="bmd-label-floating">Surat dari...</label>
                            <input type="text" name="surat_dari" class="form-control" id="suratdariform">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <label for="isi_disposisi" class="bmd-label-floating">Isi disposisi...</label>
                            <input type="text" name="isi_disposisi" class="form-control" id="isi_disposisi">
                          </div>

                          <div class="form-group col-lg-6 col-md-6 mb-2">
                            <select id="diteruskan" name="diteruskan_kepada" class="selectpicker" data-style="select-with-transition" multiple title="Diteruskan kepada..." data-size="7">
                              <option disabled>Diteruskan kepada...</option>

                              <?php foreach($usr as $dat_usr){ ?>

                              <option value="<?= $dat_usr->nik ?>"><?= $dat_usr->name ?></option>
                              
                              <?php } ?>

                            </select>
                          </div>

                          <input type="hidden" id="pilihan" name="pilihan">
                          <input type="hidden" name="id_log" value="0">
                          <input type="hidden" value="<?= $this->session->userdata('nik') ?>" name="nik">

                          <!-- button upload berkas scan surat -->
                          <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                              <p class="mb-0"><i class="material-icons">attach_file</i></p>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                              <span class="btn btn-rose btn-file">
                                <span class="fileinput-new">Unggah berkas scan surat</span>
                                <span class="fileinput-exists">Ganti berkas</span>
                                <input type="file" name="file"/>
                              </span>
                              <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>Batalkan</a>
                            </div>
                          </div>               
                          <!-- button upload berkas scan surat -->

                          <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-success float-right">
                              <i class="material-icons">save</i>&nbsp;
                              <span>Simpan</span>
                            </button>
                          </div>

                        </div>
                      </form>

                    </div>
                  </div>
                </section>
              </div>           

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script>
    $(document).ready(function() {
		$("#simpan").submit(function(e){
          e.preventDefault();
		      // const fileupload = $('#fileupload').prop('files')[0];
 
	        // let formData = new FormData();
	        // formData.append('fileupload', fileupload);
	        // formData.append('nama_customer', $('#nama_customer').val());
          // formData.append('alamat', $('#alamat').val());

          $('#pilihan').val($('#diteruskan').val());

          var data = $(this).serialize();
          
	        $.ajax({
	            type: 'POST',
	            url: "<?= base_url('SuratKeluar/sys_tambah_surat') ?>",
                data: new FormData(this),
                cache: false,
	            processData: false,
	            contentType: false,
	            success: function (msg) {
                    if (msg == "berhasil") {
                        alert('Upload Berhasil');
                        window.location.replace('');    
                    }else{
                        alert(msg);
                    }
                    
                    console.log(msg);
	            },
	            error: function (e) {
                  alert("Data Gagal Diupload"+e.status);
                  console.log(e);
	            }
	        });
        });
    });
  </script>

  <!--   Core JS Files   -->
  <script src="<?= base_url('assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>

  <!-- Plugin for the momentJs  -->
  <script src="<?= base_url('assets/js/plugins/moment.min.js') ?>"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?= base_url('assets/js/plugins/jquery.validate.min.js') ?>"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?= base_url('assets/js/plugins/jquery.bootstrap-wizard.js') ?>"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-selectpicker.js') ?>"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-datetimepicker.min.js') ?>"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-tagsinput.js') ?>"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?= base_url('assets/js/plugins/jasny-bootstrap.min.js') ?>"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?= base_url('assets/js/plugins/fullcalendar.min.js') ?>"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?= base_url('assets/js/plugins/jquery-jvectormap.js') ?>"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url('assets/js/plugins/nouislider.min.js') ?>"></script>  
  <!-- Library for adding dinamically elements -->
  <script src="<?= base_url('assets/js/plugins/arrive.min.js') ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/material-dashboard.min1c51.js') ?>" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?= base_url('assets/demo/demo.js') ?>"></script>
  <script src="<?= base_url('assets/demo/set-picker.js') ?>"></script>