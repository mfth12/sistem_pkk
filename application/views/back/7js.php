<!-- javascript -->
<script src="<?php echo base_url('back_assets/js/all.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('back_assets/js/jquery-3.5.1.min.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/panel.sidebar.js') ?>"></script>
<script src="<?php echo base_url('back_assets/js/datatables-used.js') ?>"></script>
<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>
</body>

</html>