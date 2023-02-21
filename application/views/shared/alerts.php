<?php if ($this->session->flashdata('success')): ?>
    <script>
        swal({
            title: "<?php echo $this->session->flashdata('success'); ?>",
            icon: "success"
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        swal({
            title: "<?= $this->session->flashdata('error') ?>",
            icon: "error"
        });
    </script>
<?php endif; ?>