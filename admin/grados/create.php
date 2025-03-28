<?php

    include('../../app/config.php');
    include('../../admin/layout/parte1.php');
    include('../../admin/layout/parte2.php');
    include('../../layout/mensajes.php');
    include('../../app/controllers/niveles/listado_de_niveles.php');

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Registro de nuevo grado</h1>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/grados/create.php" method="post">
                
                
                    
                    <div class="row">
                 <div class="col-md-8">
                    <div class="form-group">
                        <label for="">Nivel<b></b></label>
                        <select name="nivel_id" id="" class="form-control">
                            <?php
                            foreach ($niveles as $nivele){ 
                                 ?>
                                <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel']." - ".$nivele['turno'];?></option>
                                <?php
                                } ?>
                                
                                
                            
                        </select>

                        </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Curso<b></b></label>
                                <select name= "curso" id="" class=form-control>
                                  
                                  <option value="SECUNDARIA PRIMERO">SECUNDARIA PRIMERO</option>
                                  <option value="SECUNDARIA SEGUNDO">SECUNDARIA SEGUNDO</option>
                                  <option value="SECUNDARIA TERCERO">SECUNDARIA TERCERO</option>
                                  <option value="SECUNDARIA CUARTO">SECUNDARIA CUARTO</option>
                                  <option value="SECUNDARIA QUINTO">SECUNDARIA QUINTO</option>
                                  <option value="SECUNDARIA SEXTO">SECUNDARIA SEXTO</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Division<b></b></label>
                                <select name= "paralelo" id="" class=form-control>
                                  <option value="PRIMERA">PRIMERA</option>
                                  <option value="SEGUNDA">SEGUNDA</option>
                                  <option value="TERCERA">TERCERA</option>
                                  <option value="CUARTA">CUARTA</option>

                                </select>
                            </div>
                        </div>
                    </div>


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>
  
            <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result,'" whidth="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
            </script>
            <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

  <script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result,'" whidth="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
            </script>
              