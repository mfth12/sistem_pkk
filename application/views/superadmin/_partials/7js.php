<!-- Ini adalah script dari link internet -->
<script src="<?php echo base_url('assets/jquery-3.5.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dataTables.bootstrap4.min.js') ?>"></script>
<!--  -->
<!--  -->
<script src="<?php echo base_url('assets/sidebar/panel.sidebar.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables-used.js') ?>"></script>
<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>
</body>

</html>