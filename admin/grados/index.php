<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../admin/layout/mensajes.php');
    
    include('../../app/controllers/grados/listado_de_grados.php');
     
   
    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado de Grados</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Grados registrados</h3>
                <div class="card-tools">
                  
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nuevo grado</a>
                
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Turno</center></th>
                    <th><center>Curso</center></th>
                    <th><center>Paralelo</center></th>
                    <th><center>Acciones</center></th>
                </tr>
                </thead>
                <tbody>

            <?php
              $contador_grados = 0;
              foreach ($grados as $grado){
              $id_grado = $grado['id_grado'];
              $contador_grados = $contador_grados + 1; ?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_grados;?></td>
                 <td><?=$grado['nivel'];?></td>
                 <td><?=$grado['turno'];?></td>
                 <td><?=$grado['curso'];?></td>
                 <td><?=$grado['paralelo'];?></td>
                 
                   
                 <td style="text-align: center">
                <div class="btn-group" usuario="group" aria-label="Basic example">
                    <a href="show.php?id=<?=$id_grado;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="edit.php?id=<?=$id_grado;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                    
    <form action="<?=APP_URL;?>/app/controllers/grados/delete.php" onclick="preguntar<?=$id_grado;?>(event)" method="post" id="miFormulario<?=$id_grado;?>">
    <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                  </form>

    <script>
    function preguntar<?=$id_grado;?>(event) {
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
        var form = $('#miFormulario<?=$id_grado;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cursos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cursos",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cursos",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cursos",
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

