<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/docentes/listado_de_docentes.php');
  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado del personal docente</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Docentes registrados</h3>
                <div class="card-tools">
                  
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nuevo docente</a>
                
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Nombre del docente</center></th>
                    <th><center>Rol</center></th>
                    <th><center>DNI</center></th>
                    <th><center>Fecha de nacimiento</center></th>
                    <th><center>email</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

            <?php
              $contador_docentes = 0;
              foreach ($docentes as $docente){
              $id_docente = $docente['id_docente'];
              $contador_docentes = $contador_docentes + 1 ;?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_docentes;?></td>
                 <td><?=$docente['nombres']." ".$docente['apellidos'];?></td>
                 <td><?=$docente['nombre_rol'];?></td>
                 <td><?=$docente['ci'];?></td>
                 <td><?=$docente['fecha_nacimiento'];?></td>
                 <td><?=$docente['email'];?></td>
                 <td style="text-align: center">
                    <?php
                    if($docente['estado']=="1") echo "ACTIVO";
                    else echo "INACTIVO";
                    ?>
                </td>
                    
                 <td style="text-align: center">
                <div class="btn-group" usuario="group" aria-label="Basic example">
                    <a href="show.php?id=<?=$id_docente;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="edit.php?id=<?=$id_docente;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                    
                    <form action="<?=APP_URL;?>/app/controllers/docentes/delete.php" onclick="preguntar<?=$id_docente;?>(event)" method="post" id="miFormulario<?=$id_docente;?>">
                        <input type="text" name="id_docente" value="<?=$id_docente;?>" hidden>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                        

                  </form>

    <script>
    function preguntar<?=$id_docente;?>(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Eliminar registro',
        text: '¿Desea eliminar este registro',
        icon: 'question',
        showDenyButton: true,
        confirmButtonText: 'Eliminar',
        confirmButtonColor: '#a5161d',
        denyButtonColor: '#3B033B', 
        denyButtonText: 'Cancelar', 

     }).then ((result) => {
      if (result.isConfirmed) {
        var form = $('#miFormulario<?=$id_docente;?>');
        form.submit();
      }
     });
    }
</script> 
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Docentes",
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