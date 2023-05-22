  <div class="wh-api">
    <div class="wh-fixed">
      <a target="_blank" href="https://api.whatsapp.com/send?phone=+6289663112386&text=Saya butuh bantuan">
        <button class="wh-ap-btn"></button>
      </a>
    </div>
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('include/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('include/assets/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('include/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('include/assets/dist/js/adminlte.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('include/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- Event Kalender -->
<script src="<?= base_url('include/assets/plugins/moment/moment.min.js') ?>"></script>
<!-- page script -->
<script type="text/javascript">
	$(function () {
      $("#example1").DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $(function(){
      var title = '<?= $this->session->flashdata("title") ?>';
      var text = '<?= $this->session->flashdata("text") ?>';
      var type = '<?= $this->session->flashdata("type") ?>';
      if (title) {
          Swal.fire({
            title: title,
            text: text,
            type: type,
            button: true,
          });
      };
  });
  });
</script>
</body>
</html>
