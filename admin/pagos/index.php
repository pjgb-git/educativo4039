<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado de estudiantes</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Estudiantes registrados</h3>
                <div class="card-tools">
                  
                  
                
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Apellidos y Nombres</center></th>
                    <th><center>DNI</center></th>
                    <th><center>Fecha de nacimiento</center></th>
                    <th><center>email</center></th>
                    <th><center>Celular</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Turno</center></th>
                    <th><center>Grado</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

            <?php
              $contador_estudiantes = 0;
              foreach ($estudiantes as $estudiante){
              $id_estudiante = $estudiante['id_estudiante'];
              $contador_estudiantes = $contador_estudiantes + 1 ;?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_estudiantes;?></td>
                 <td><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></td>
                 <td><?=$estudiante['ci'];?></td>
                 <td><?=$estudiante['fecha_nacimiento'];?></td>
                 <td><?=$estudiante['email'];?></td>
                 <td><?=$estudiante['celular'];?></td>
                 <td><?=$estudiante['nivel'];?></td>
                 <td><?=$estudiante['turno'];?></td>
                 <td><?=$estudiante['curso']." - ".$estudiante['paralelo'];?></td>

                 <td style="text-align: center">
                    <?php
                    if($estudiante['estado']=="1") echo "ACTIVO";
                    else echo "INACTIVO";
                    ?>
                </td>
                    
                 <td style="text-align: center">
                <div class="btn-group" usuario="group" aria-label="Basic example">
                    <a href="create.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-cash-coin"></i></a>
                    <a href="contrato.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-warning btn-sm"><i class="bi bi-printer"></i></a>
                    
                  </div>
                  </td>
                </tr>
              <?php
              }
              ?>  
              
              </tbody>
            </table>
           </div> 
     </div>
  </div>
        <br> <br>
            
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "lengthMenu": "Mostrar _MENU_ ",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>