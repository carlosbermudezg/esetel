<!-- Main Container -->
<main id="main-container">
    <div class="content">

        <!-- Dynamic Table Full Pagination -->
        <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Clientes <small>Todos</small></h3>
            <a href="<?php echo base_url()?>clientes/agregar" class="btn btn-sm btn-success me-1 mb-3">
                <i class="fa fa-fw fa-plus me-1"></i> Nuevo Cliente
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table id="tblclientes" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                <th class="text-center" style="width: 80px;">ID</th>
                <th>Nombres</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Fecha de ingreso</th>
                <th style="width: 15%;">Dirección</th>
                <th style="width: 15%;">Estado</th>
                </tr>
            </thead>
            </table>
        </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->

    </div>     
</main>
<!-- END Main Container -->
<script src="<?php echo base_url()?>/app-assets/src/assets/js/dashmix.app.min.js"></script>
<!-- jQuery (required for DataTables plugin) -->
<script src="<?php echo base_url()?>/app-assets/src/assets/js/lib/jquery.min.js"></script>

<!-- Page JS Plugins -->
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>/app-assets/src/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>

<!-- Page JS Code -->
<script src="<?php echo base_url()?>/app-assets/src/assets/js/pages/be_tables_datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tblclientes').DataTable({
        stateSave: true,
        
        "language": {
                "emptyTable":           "No hay datos disponibles en la tabla.",
                "info":                 "Del _START_ al _END_ de _TOTAL_ ",
                "infoEmpty":            "Mostrando 0 registros de un total de 0.",
                "infoFiltered":         "(filtrados de un total de _MAX_ registros)",
                "infoPostFix":          "(actualizados)",
                "lengthMenu":           "Mostrar _MENU_ registros",
                "loadingRecords":       "Cargando...",
                "processing":           "Cargando...",
                "search":               "Buscar:",
                "searchPlaceholder":    "Dato para buscar",
                "zeroRecords":          "No se han encontrado coincidencias.",
                "paginate": {
                "first":                "Primera",
                "last":                 "Última",
                "next":                 "Siguiente",
                "previous":             "Anterior",
                "colvis":               "Columnas"
                },
            },
        
        lengthMenu: [[5, 10, 25, 100,-1], [5, 10, 25, 100, "Todos"]],
        pageLength: 5,
        
        "order": [[ 1, "desc" ]],
        "ordering": false,
         
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
         'url':'<?php echo base_url('/listar/clientes');?>',
        },
        'columns': [
         { data: 'id' },
         { data: 'nombres' },
         { data: 'fecha' },
         { data: 'direccion' },
         { data: 'estado' }
        ],
          
        });
    });
</script>