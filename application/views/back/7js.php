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
<script>
    function showME() {
        var x = document.getElementById("laporanku");
        var button = document.getElementById("btnku");
        if (x.style.display === "none") {
            x.style.display = "block";
            button.style.btn = "btn-danger";
        } else {
            x.style.display = "none";
        }
    }
</script>
</body>

</html>