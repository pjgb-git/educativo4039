<?php

$id_administrativo = $_GET['id'];

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/roles/listado_de_roles.php');
    include('../../app/controllers/administrativos/datos_administrativos.php');

    ?>

  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

      <div class="row">
          <h1>Personal administrativo: <?=$nombres." ".$apellidos;?></h1>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/administrativos/update.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <input type = "text" name= "id_persona" value="<?=$id_persona;?>" hidden> </input>
                        <input type = "text" name= "id_administrativo" value="<?=$id_administrativo;?>" hidden> </input>
                        <input type = "text" name= "id_usuario" value="<?=$id_usuario;?>" hidden> </input>
                         
                        <label for="">Nombre del rol</label>
                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 10px" class="btn btn-primary btn_sm"><i class="bi bi-file-plus"></i></a>  

                            <div class="form-inline">
                            
                            <select name="rol_id" id="" class="form-control">
                            <?php 
                            foreach ($roles as $role){ ?>
                                <option value="<?=$role['id_rol'];?>"<?=$nombre_rol==$role['nombre_rol']? 'selected': ''?>><?=$role['nombre_rol'];?></option>
                            <?php
                            }
                            
                            ?>
                                
                              </select>
                              
                            
           
                        </div> 
                    </div>
                </div>

                                    
                
                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Nombres</label>
                            <input type="text" name= "nombres" value="<?=$nombres;?>" <class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Apellidos</label>
                            <input type="text" name= "apellidos" value="<?=$apellidos;?>" class="form-control" required>

                        </div>
                        </div>

                
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Documento de identidad</label>
                            <input type="number" name= "ci" value="<?=$ci;?>" class="form-control" required>

                    </div>
                </div>
                
                <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Fecha de nacimiento</label>
                            <input type="date" name= "fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control">

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Celular</label>
                            <input type="number" name="celular" value="<?=$celular;?>" class="form-control" >

                        </div>
                        </div>

                        <div class="col-md-4">
                        <div class="form-group">

                            <label for="">Profesión</label>
                            <input type="text" name="profesion" value="<?=$profesion;?>" class="form-control" >

                        </div>
                        </div>

                        
                        <div class="col-md-8">
                        <div class="form-group">

                            <label for="">dirección</label>
                            <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>

                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">

                            <label for="">correo</label>
                            <input type="email" name="email" value="<?=$email;?>" class="form-control" required>

                        </div>
                        </div>
                        



                         
                      
                

        <hr>
        <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/administrativos" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

