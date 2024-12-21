<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- datatables -->


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<!-- font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
    integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
</script>
<!-- ckeditor -->
<script src="<?=$main_url?>assets/ckeditor/ckeditor.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=$main_url?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=$main_url?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=$main_url?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=$main_url?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=$main_url?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$main_url?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$main_url?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
<script>
new DataTable('#table');
</script>
</body>

</html>
