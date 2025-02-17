<?php
$id_grado_get = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_materia_get = $_GET['id_materia'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/estudiantes/listado_de_estudiantes.php');
    include('../../app/controllers/calificaciones/listado_de_calificaciones.php');
$curso ="";
$paralelo ="";
    foreach ($estudiantes as $estudiante){
        if($id_grado_get == $estudiante['id_grado']){ 
            $curso = $estudiante['curso'];
            $paralelo = $estudiante['paralelo'];
          
        }
      
      }
?>  




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h2>Listado de estudiantes del grado: <?=$curso;?>  <?=$paralelo;?> </h2>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Estudiantes registrados</h3>
       </div>
           <div class="card-body">
           <table id="example1" class="table table-hover table-dark table-bordered table-sm">
                <thead>
                                    
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Apellidos y Nombres</center></th>
                             
                    <th><center>Nivel</center></th>
                    <th><center>Turno</center></th>
                    <th><center>Grado</center></th>
                    <th><center>División</center></th>
                    <th><center>1° ETAPA</center></th>
                    <th><center>2° ETAPA</center></th>
                 
                    
                    </tr>
                </thead>
                <tbody>

            <?php
              $contador_estudiantes = 0;
              
              foreach ($estudiantes as $estudiante){
                if($id_grado_get == $estudiante['id_grado']){ 
                    $id_estudiante = $estudiante['id_estudiante'];
                    $contador_estudiantes = $contador_estudiantes + 1; 
                    ?>                
                         
              <tr>
                 <td style="text-align: center">
                   <input type="text" id="estudiante_<?=$contador_estudiantes;?>" value="<?=$id_estudiante;?>" hidden> </input> 
                 <?=$contador_estudiantes;?></td>
                 <td style="text-align: center"><?=$estudiante['apellidos']." ".$estudiante['nombres'];?></td>
                 <td style="text-align: center"><?=$estudiante['nivel'];?></td>
                 <td style="text-align: center"><?=$estudiante['turno'];?></td>
                 <td style="text-align: center"><?=$estudiante['curso'];?></td>
                 <td style="text-align: center"><?=$estudiante['paralelo'];?></td>
                 <?php
                 $nota1 = "";
                 $nota2 = "";
                 foreach($calificaciones as $calificacione){
                    if( ($calificacione['docente_id']==$id_docente_get)
                      &&($calificacione['estudiante_id']==$id_estudiante)
                      &&($calificacione['materia_id']==$id_materia_get)
                    ){
                      $nota1 = $calificacione['nota1'];
                      $nota2 = $calificacione['nota2'];

                    }
                 }
                 ?>
                 <td> 
                    <input style="text-align: center" value="<?=$nota1;?>" id="nota1_<?=$contador_estudiantes;?>" type="number" class = "form-control"> </center>
                 </td>
                 <td> 
                    <input style="text-align: center" value="<?=$nota2;?>" id="nota2_<?=$contador_estudiantes;?>" type="number" class = "form-control"></center>
                 </td>
                 
                </tr>
                    <?php
                }
            }
            ?>                       
                </tbody>
            </table>
            <button class="btn btn-primary" id="btn_guardar">Guardar notas </button>
            <script>
                $('#btn_guardar').click(function () {
                    var n = '<?=$contador_estudiantes;?>';
                    var i = 1;
                    var id_docente = '<?=$id_docente_get;?>'
                    
                    var id_materia = '<?=$id_materia_get;?>'
                    
                    for (i = 1; i<=n; i++){
                        var a = '#nota1_'+i;
                        var nota1 = $(a).val();
                  
                        var b = '#nota2_'+i;
                        var nota2 = $(b).val();

                        var d = '#estudiante_'+i;
                        var id_estudiante = $(d).val();

//alert("id_docente:"+id_docente+"-id_estudiante:"+id_estudiante+"-id_materia:"+id_materia);

                        
                        var url ="../../app/controllers/calificaciones/create.php";
                        $.get(url,{id_docente:id_docente,id_estudiante:id_estudiante,id_materia:id_materia,nota1:nota1,nota2:nota2}, function (datos) {
                          
                            
                            $('#respuesta').html(datos);
                            //alert("mando los datos");

                        });
                        
                    
                    }
                    Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se actualizaron las notas",
            showConfirmButton: false,
            timer: 5000
        });
                });
            </script>
            <div id="respuesta" hidden></div>
           </div> 
     </div>
  </div>
  </div>
      
            
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

  
            