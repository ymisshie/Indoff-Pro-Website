<?php
 require 'vendor/autoload.php';


 if(isset($_GET['id']) && is_numeric($_GET['id'])){
    
 $id=$_GET['id'];
 $categoria = new ameri\Categoria;

 $resultado=$categoria->mostrarPorId($id);

 if(!$resultado)
 header('Location: dashboard.php');

 /*
 print '<pre>';
 print_r($resultado);
 die;
 */
 }
 else
 {
    
        header('Location: dashboard.php');
 }
?>


<section>
    <div class="container" id="form-actualizar-c">
        <div class="row justify-content-center">
        <h2 class="section-title m-0 mt-5 mb-3">Actualizar categoria</h2>
            <div class="col-8 color-grey-bg p-3 my-4 text-center">
            <form method="POST" action="acciones_c.php" enctype="multipart/form-data" >

            <input type="hidden" name="id" value="<?php print $resultado['id']?>">

                    <div class="form-group text-start">
                        <label class="col-form-label">Nombre de la categoria</label>
                        <input value="<?php print $resultado['nombre']?>" class="form-control" name="nombre_categoria" type="text" placeholder="" required>
                    </div>
                    <div class="form-group text-start">
                        <label class="col-form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion_categoria" id="" type="text" placeholder="" required><?php print $resultado['descripcion']?> </textarea>

                    </div>
                    <div class="col-12 form-group text-start">
                        <label class="col-form-label">Imagen</label>
                        <input name="imagen" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen']?>">
                    </div>
                    
                    <input type="submit" name="accion" class="btn btn-success my-4" value="Actualizar">
                    <a href="dashboard.php" type="submit" class="btn btn-danger my-4" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</section>