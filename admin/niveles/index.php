<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../admin/layout/mensajes.php');
    include('../../app/controllers/niveles/listado_de_niveles.php');
     
   
    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Listado de Niveles educativos</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Niveles registrados</h3>
                <div class="card-tools">
                  
                  <a href="create.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>Crear nuevo nivel</a>
                
                </div>
            </div>

            <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                <body>
                                
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Gestión educativa</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Turno</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

            <?php
              $contador_niveles = 0;
              foreach ($niveles as $nivele){
              $id_nivel = $nivele['id_nivel'];
              $contador_niveles = $contador_niveles + 1; ?>                
                         
              <tr>
                 <td style="text-align: center"><?=$contador_niveles;?></td>
                 <td><?=$nivele['gestion'];?></td>
                 <td><?=$nivele['nivel'];?></td>
                 <td><?=$nivele['turno'];?></td>
                 <td style="text-align: center">
                    <?php
                      if($nivele['estado'] == "1"){ ?>
                      <button class="btn btn-success btn-sm" syle="border-radius: 20 px">ACTIVO</button>
                    <?php  
                    }else{ ?>
                     <button class="btn btn-danger btn-sm" syle="border-radius: 20 px">INACTIVO</button>
                    <?php
                    }
                    ?>

                 </td>
                 
                 
                    
                 <td style="text-align: center">
                <div class="btn-group" usuario="group" aria-label="Basic example">
                    <a href="show.php?id=<?=$id_nivel;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                    <a href="edit.php?id=<?=$id_nivel;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                    
    <form action="<?=APP_URL;?>/app/controllers/niveles/delete.php" onclick="preguntar<?=$id_nivel;?>(event)" method="post" id="miFormulario<?=$id_nivel;?>">
    <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden>
    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>

                  </form>

    <script>
    function preguntar<?=$id_nivel;?>(event) {
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
        var form = $('#miFormulario<?=$id_nivel;?>');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                "infoEmpty": "Mostrando 0 a 0 de 0 ",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
                "infoFiltered": "(Filtrado de _MAX_ total )",
                "infoPostFix": "",
                "thousands": ",",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Niveles",
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
