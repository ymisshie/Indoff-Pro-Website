<?php


/*
print '<pre>';
print_r($_POST);
print_r($_FILES);
*/

require '../vendor/autoload.php';

$categoria = new ameri\Categoria;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['nombre_categoria']))
            exit('Completar titulo');
        
        if(empty($_POST['descripcion_categoria']))
            exit('Completar titulo');

        $_params = array(
            'nombre'=>$_POST['nombre_categoria'],
            'descripcion'=>$_POST['descripcion_categoria'],
            'imagen'=>subirFoto(),
            'fecha'=> date('Y-m-d')
        );

        $rpt = $categoria->registrar($_params);

        if($rpt)

        //cuando se el registro se de de forma correcta se direccina a 
            header('Location: categorias/index.php');

        else
            print 'Error al registrar una categoria';
        
    }


    if ($_POST['accion']==='Actualizar')
    {

        print '<pre>';
        print_r($_POST);

      if(empty($_POST['nombre_categoria']))
            exit('Completar titulo');
        
        if(empty($_POST['descripcion_categoria']))
            exit('Completar descripcion');
            
    
        $_params = array(
            'nombre'=>$_POST['nombre_categoria'],
            'descripcion'=>$_POST['descripcion_categoria'],
            'fecha'=> date('Y-m-d'),
            'id'=>$_POST['id'],
        );

        if(!empty($_POST['imagen_temp']))
        $_params['imagen']=$_POST['imagen_temp'];

        if(!empty($_FILES['imagen']['name']))
        $_params['imagen']=subirFoto();

        $rpt = $categoria->actualizar($_params);

        if($rpt)

        //cuando se el registro se de de forma correcta se direccina a 
            header('Location: categorias/index.php');
            
        else
            print 'Error al actualizar un producto';
        

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET')
{


    $id =$_GET['id'];
    
    $rpt = $categoria->eliminar($id);

    if($rpt)

    //cuando se el registro se de de forma correcta se direccina a 
        header('Location: categorias/index.php');

    else
        print 'Error al eliminar una categoria';
    

}



function subirFoto() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo);

    return $_FILES['imagen']['name'];




}

