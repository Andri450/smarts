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
                  <h4 class="card-title">Data Surat Masuk</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
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
                          $nipp = explode(",", $data['diteruskan_kepada']);
                          foreach($nipp as $nips){
                              if($nips == $this->session->userdata('nik')){
                      ?>
                      <tr>
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
                                echo $nu . " || ";
                              }
                            ?>
                          </td>
                          <td><a class="download" onclick="download_file(<?= $data['id_surat'] ?>);" href="javascript: void(0)"><?= substr($data['scan_surat'], 0,18) ?>...</a></td>
                          <td class="text-right">
                            <a href="javascript: void(0)" onclick="download_file(<?= $data['id_surat'] ?>);" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">arrow_downward</i></a>
                            <a onclick="prnt('<?= $data['scan_surat'] ?>');" href="javascript: void(0)" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">print</i></a>
                          </td>
                        </tr>
                        <?php }}}}?>                   
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
      </div>

<!-- <script>
  $.ajax({
	  type: 'get',
    dataType: "json",
    url: " base_url('SuratMasuk/tampil_surat_masuk') ",
    crossDomain: true,
	  cache: false,
	  success: function (msg) {
      $.each(msg, function(i, item) {
        // alert(msg[i].tahun);
        $.('#isi').append(
          `<tr>
              <td>Tiger Nixon</td>
              <td>System Architect</td>
              <td>Edinburgh</td>
              <td>61</td>
              <td>2011/04/25</td>
              <td class="text-right">
              <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
              <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
              <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
              </td>
          </tr>`
        );
      });
	  }
	});
</script> -->