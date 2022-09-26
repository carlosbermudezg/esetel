<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3"><?php echo $result->codigo.' - '.$result->nombres.' '.$result->apellidos;?></h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Cliente</li>
                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
            </ol>
            </nav>
        </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        <!-- Horizontal Navigation - Hover Centered -->
        <div class="bg-white p-3 rounded push">
            <!-- Navigation -->
            <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
              <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                <li class="nav-main-item">
                  <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                    <i class="nav-main-link-icon fa fa-rocket"></i>
                    <span class="nav-main-link-name">Vista General</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-book"></i>
                    <span class="nav-main-link-name">Cuenta</span>
                  </a>
                  <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                      <a class="nav-main-link" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-book-open"></i>
                        <span class="nav-main-link-name">Estado de cuenta</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-file-invoice"></i>
                        <span class="nav-main-link-name">Facturas</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-dollar-sign"></i>
                        <span class="nav-main-link-name">Pagos</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="#">
                        <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                        <span class="nav-main-link-name">Proformas</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-globe"></i>
                    <span class="nav-main-link-name">Servicios</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="javascript:void(0)">
                    <i class="nav-main-link-icon fa fa-file-upload"></i>
                    <span class="nav-main-link-name">Documentos</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="javascript:void(0)">
                    <i class="nav-main-link-icon fa fa-ticket-alt"></i>
                    <span class="nav-main-link-name">Tickets</span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- END Navigation -->
          </div>
          <!-- END Horizontal Navigation - Hover Centered -->

          <!-- Dummy content -->
          <div class="block block-rounded d-none d-lg-block">
            <div class="block-content">
              <p class="text-center py-8">
                Center aligned, light themed
              </p>
            </div>
          </div>
          <!-- END Dummy content -->
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