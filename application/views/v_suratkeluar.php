<script>
  function download_file(id){
    $.ajax({
      type: 'POST',
      url: "<?= base_url('SuratMasuk/download') ?>",
      data: {id: id},
      crossDomain: true,
      cache: false,
      success: function (msg) {
        alert(msg);
      }
    });
  };
</script>

<script>
  function prnt(fils){
    alert(fils);
    $('#pdf').attr("src",'http://localhost/smart-master/assets/file_surat/'+fils).load(function(){
      document.getElementById('pdf').contentWindow.print();
    });
  };
</script>
<!--  -->
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">mail_outline</i>
                  </div>
                  <h4 class="card-title">Data Surat Keluar</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  <div class="card-header">
                  <div class="row">

                  <!-- button tambah surat -->
                  <p class="float-right mb-0 mt-3">
                    <a href="<?= base_url('SuratKeluar/tambah_surat') ?>" class="btn btn-success">
                      <i class="material-icons">add</i>&nbsp;Tambah surat
                    </a>
                  </p>
                  <!-- button tambah surat -->

                  </div>
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr style="text-align: center;">
                          <th>No Agenda</th>
                          <th>Jenis Surat</th>
                          <th>Tahun</th>
                          <th>No Surat</th>
                          <th>Date</th>
                          <th>Perihal</th>
                          <th>Surat Dari</th>
                          <th>Isi Disposisi</th>
                          <th>Diteruskan Kepada</th>
                          <th>Scan Surat</th>
                          <th class="disabled-sorting text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody id="isi">
                      <?php 
                      if($dat != NULL) { 
                        foreach($dat as $data){ 
                            if($data['nik'] == $this->session->userdata('nik')){
                      ?>
                      <tr style="text-align: center;">
                          <td><?= $data['no_agenda'] ?></td>
                          <td><?= $data['jenis_surat'] ?></td>
                          <td><?= $data['tahun'] ?></td>
                          <td><?= $data['no_surat'] ?></td>
                          <td><?= date("d/M/Y", strtotime($data['tgl_surat'])) ?></td>
                          <td><?= $data['perihal'] ?></td>
                          <td><?= $data['surat_dari'] ?></td>
                          <td><?= $data['isi_disposisi'] ?></td>
                          <td>
                            <?php
                              foreach($data['nama_user'] as $nu){
                                echo $nu . " || <br>";
                              }
                            ?>
                          </td>
                          <td><a class="download" onclick="download_file(<?= $data['id_surat'] ?>);" href="javascript: void(0)">
                          <?php
                            if (strlen($data['scan_surat']) >= 18) {
                                echo substr($data['scan_surat'], 0,18) . "...";
                            }else {
                                echo $data['scan_surat'];
                            }
                          ?></a>
                          </td>
                          <td class="text-right">
                            <?php if($data['publish'] == "U") { ?>
                                <a href="<?= base_url('suratkeluar/edit_surat/').$data['id_surat'] ?>"  class="btn btn-warning btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                            <?php }else{ ?>
                                <a href="<?= base_url('suratkeluar/edit_surat/').$data['id_surat'] ?>"  class="btn btn-primary btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                            <?php } ?>
                            <a onclick="hapus(<?= $data['id_surat'] ?>)" href="javascript: void(0)" class="btn btn-link btn-danger btn-just-icon edit"><i class="material-icons">delete_outline</i></a>
                          </td>
                        </tr>
                        <?php }}} ?>                   
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end content-->
              </div>
              <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
          </div>
          <!-- <iframe id="pdf" style="display:none;"> -->
          <!-- end row -->
        </div>
        <div class="content">
            <a href="<?= base_url('suratkeluar/edit_surat/').$data['id_surat'] ?>"  class="btn btn-warning btn-info btn-just-icon like"><i class="material-icons">edit</i></a> <span> Data Sudah Pernah Diubah/Diedit</span>
            &nbsp;&nbsp;
            <a href="<?= base_url('suratkeluar/edit_surat/').$data['id_surat'] ?>"  class="btn btn-primary btn-info btn-just-icon like"><i class="material-icons">edit</i></a> <span> Data Belum Pernah Diubah/Diedit</span>
        </div>
      </div>


<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>assets/js/material-dashboard.min1c51.js?v=2.1.2" type="text/javascript"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/demo/set-table.js"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  <script>
    function hapus(id){
        Swal.fire({
            title: 'Hapus Surat?',
            showCancelButton: true,
            confirmButtonText: `Hapus`,
            denyButtonText: `Don't save`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Surat Dihapus!', '', 'success');
                location.href = "<?= base_url('suratkeluar/hapus_surat/') ?>"+id;
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        });
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });
	}
</script>
