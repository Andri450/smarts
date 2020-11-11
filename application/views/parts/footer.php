<footer class="footer">
        <div class="container-fluid">
          
          <div class="copyright float-right">
            &copy;
            2020, Crafted with <i class="material-icons">favorite</i> by
            Blondev Team
          </div>
        </div>
      </footer>
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
  </body>
</html>