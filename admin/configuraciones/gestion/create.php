<?php

    include('../../../app/config.php');
    include('../../../admin/layout/parte1.php');
    include('../../../admin/layout/parte2.php');
    include('../../../layout/mensajes.php');
    

    ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
   <!-- Main content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <h1>Registro de nueva gestion educativa</h1>
        </div>
        
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">LLene los datos</h3>
               
            </div>

            <div class="card-body">
            <form action="<?=APP_URL;?>/app/controllers/configuraciones/gestion/create.php" method="post">
                
                
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Gestión educativa<b>*</b></label>
                                <input type="text" name= "gestion" class="form-control" required>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Estado<b>*</b></label>
                                <select name= "estado" id="" class=form-control>
                                  <option value="ACTIVO">ACTIVO</option>
                                  <option value="INACTIVO">INACTIVO</option>

                                </select>
                            </div>
                        </div>
                    </div>

                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="<?=APP_URL;?>/admin/configuraciones" class="btn btn-secondary">Cancelar</a>
           
                        </div> 
                    </div>
        </div>
            </form>
  
            <script>
              function archivo(evt) {
                  var files = evt.target.files; //FileList object
             
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
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" width="300px" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('file').addEventListener('change', archivo, false);
      </script>
        
            <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div> 

  