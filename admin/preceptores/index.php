<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/preceptores/listado_de_preceptores.php');
  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado de Preceptores</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Preceptores registrados</h3>
                <div class="card-tools">
                  
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nuevo preceptor</a>
                
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Nombre del preceptor</center></th>
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
              $contador_preceptores = 0;
              foreach ($preceptores as $preceptore){
              $id_preceptore = $preceptore['id_preceptore'];
              $contador_preceptores = $contador_preceptores + 1 ;?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_preceptores;?></td>
                 <td><?=$preceptore['nombres']." ".$preceptore['apellidos'];?></td>
                 <td><?=$preceptore['nombre_rol'];?></td>
                 <td><?=$preceptore['ci'];?></td>
                 <td><?=$preceptore['fecha_nacimiento'];?></td>
                 <td><?=$preceptore['email'];?></td>
                 <td style="text-align: center">
                    <?php
                    if($preceptore['estado']=="1") echo "ACTIVO";
                    else echo "INACTIVO";
                    ?>
                </td>
                    
                 <td style="text-align: center">
                <div class="btn-group" usuario="group" aria-label="Basic example">
                    <a href="show.php?id=<?=$id_preceptore;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="edit.php?id=<?=$id_preceptore;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                    
                    <form action="<?=APP_URL;?>/app/controllers/preceptores/delete.php" onclick="preguntar<?=$id_preceptore;?>(event)" method="post" id="miFormulario<?=$id_preceptore;?>">
                        <input type="text" name="id_preceptore" value="<?=$id_preceptore;?>" hidden>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                        

                  </form>

    <script>
    function preguntar<?=$id_preceptore;?>(event) {
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
        var form = $('#miFormulario<?=$id_preceptore;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Preceptores",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Preceptores",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Preceptores",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Preceptores",
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