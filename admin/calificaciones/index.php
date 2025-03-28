<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../app/controllers/docentes/listado_de_asignaciones.php');
  
    ?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Grados asignados para calificaciones</h1>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Asignaciones registradas</h3>
              </div>

            <div class="card-body">
             
           <table class="table table-hover table-dark table-bordered table-sm">
                <thead>
                                              
                <tr>    
                    <th><center>N°</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Turno</center></th>
                    <th><center>Grado</center></th>
                    <th><center>Paralelo</center></th>
                    <th><center>Materia</center></th>
                    <th><center>Acciones</center></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $contador = 0;
                foreach ($asignaciones as $asignacione){
                    $id_grado = $asignacione['id_grado'];
                    if($email_sesion == $asignacione['email']){ 
                        $contador = $contador + 1; ?>
                    <tr>
                        <td><center><?=$contador;?></center></td>
                        <td><center><?=$asignacione['nivel'];?></center></td>
                        <td><center><?=$asignacione['turno'];?></center></td>
                        <td><center><?=$asignacione['curso'];?></center></td>
                        <td><center><?=$asignacione['paralelo'];?></center></td>
                        <td><center><?=$asignacione['nombre_materia'];?></center></td>
                        <td><center><a href="create.php?id_grado=<?=$id_grado;?>&&id_docente=<?=$asignacione['docente_id'];?>&&id_materia=<?=$asignacione['materia_id'];?>" class="btn btn-primary btn-sm"><i class="bi bi-check2-square"></i> Subir Notas</a> </center></td>
                    </tr>
                <?php
                    }

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

  
 