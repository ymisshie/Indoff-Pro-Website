<?php

require '../../vendor/autoload.php';
$evento = new ameri\Evento;

$info_evento = $evento->mostrar();

$cantidad = count($info_evento);

?>




<!--categorias-->
<section id="categorias">
    <div class="container-fluid px-md-5">

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title pt-md-5 text-center"><?php
                                                                print $cantidad;

                                                                if ($cantidad == 1) {

                                                                    print ' Evento registrada';
                                                                } else {
                                                                    print ' Eventos registradas';
                                                                }

                                                                ?></h2>
            </div>
            <div class="col-md-4 py-md-3 py-lg-3 text-center">
                <a class="btn btn-primary " href="form-registrar-e.php" role="button">Agregar nuevo <i class="fas fa-plus ms-lg-2 me-lg-1"></i></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <table class="table table-hover my-md-4">
                <thead>
                    <tr class="text-center color-red-bg color-white">
                        <th scope="col">ID</th>
                        <th scope="col">Orden</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>

             <?php

                    if ($cantidad > 0) {
                        $c = 0;
                        for ($x = 0; $x < $cantidad; $x++) {
                            $c++;
                            $item = $info_evento[$x];
                    ?>

                            <tr class="text-center align-items-center">
                                <td scope="col" class="fw-600 id-value"><?php print $c ?></td>
                                <td>
                                <select  name="orden_eventos " class="orden_eventos">
                                    <option value="1" <?php if ($item['orden'] == 1) print "selected" ?> > 1 </option>
                                    <option value="2" <?php if ($item['orden'] == 2) print "selected" ?> >2</option>
                                    <option value="3" <?php if ($item['orden'] == 3) print "selected" ?>  >3</option>
                                    <option value="4" <?php if ($item['orden'] == 4) print "selected" ?> > 4  </option>
                                    <option value="5" <?php if ($item['orden'] == 5) print "selected" ?> > 5  </option>
                                    <option value="6" <?php if ($item['orden'] == 6) print "selected" ?> >  6  </option>
                                    <option value="7" <?php if ($item['orden'] > 6) print "selected" ?> > x   </option>
                                    
                                </select>
                                </td>
                                <td scope="col" class="text-center">
                                    <?php
                                    $imagen = '../../upload/' . $item['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" height="100px">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td scope="col" class="fw-600"><?php print $item['nombre'] ?>
                                    <br>
                                    <a href="../productos-eventos/index.php?id=<?php print $item['id'] ?>" class="btn btn-sm btn-secondary my-md-2" role="button">Ver productos</a>
                                </td>
                                <td scope="col" class="text-start fs-07"><?php print $item['descripcion'] ?></td>
                                <td scope="col"><?php print $item['fecha'] ?></td>
                                <td scope="col" class="text-center">
                                    <a href="form-editar-e.php?id=<?php print $item['id'] ?>" class="btn-secondary btn btn-sm mx-lg-3 my-lg-4 my-md-3 color-purple-bg " role="button">Editar<i class="far fa-edit ms-lg-2 me-lg-1"></i></a>
                                    <a href="../acciones-e.php?id=<?php print $item['id'] ?>" class="btn-primary btn btn-sm my-lg-4" role="button">Eliminar<i class="far fa-trash-alt ms-lg-2 me-lg-1"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">
                                Sin registro
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

        
        <!-- <button onclick="ordenEventos()"> Probar </button> -->
        
    </div>
    
    <!-- <p id="orden_verificar" class="text-center">  </p>
    <p id="variable" class="text-center">  </p>

    <form name = "formulario" action="../acomodos.php" method="post" onsubmit="validateAcomodo(event);">
        <input type="text" id="one" name="first" hidden>
        <input type="text" id="two" name="second" hidden>
        <input type="text" id="three" name="third" hidden>
        <input type="text" id="four" name="fourth" hidden>
        <input type="text" id="five" name="fifth" hidden>
        <input type="text" id="six" name="sixth" hidden>

        <div class="form-check d-flex justify-content-center mb-4">
            <button type="submit" class="btn btn-secondary btn-lg mt-3 text-center" name="accion" value="eventos"> Guardar Acomodo </button>
        </div>
    </form> -->


</section>

<script>

    function ordenEventos(){ 
        lista = document.getElementsByClassName("orden_eventos");

        var orden = {
            one: "",
            two: "",
            three: "",
            four: "",
            five: "",
            six: "",
        };
        var selectedValues = [];
        for (let i = 0; i < lista.length; i++) {
            // console.log(lista[i].value);
            if(selectedValues.includes(lista[i].value) && lista[i].value != "none"){
                document.getElementById('orden_verificar').textContent = "No se pueden repetir valores del orden";
                // console.log("No se pueden repetir valores");
                selectedValues = [];
                return false;
            }
            selectedValues.push(lista[i].value);          
        }
        var numbers = ["one","two", "three", "four", "five", "six"];
        for (let i = 0; i < numbers.length; i++) {
            if(!selectedValues.includes(numbers[i])){
                document.getElementById('orden_verificar').textContent = "Tienen que ser del 1 al 6";
                // console.log("Tienen que tener del 1 al 6");
                return false;
            }            
        }
        var lista_ids = document.getElementsByClassName("id-value");
        // console.log(lista_ids);
        for (let i = 0; i < selectedValues.length; i++) {
            if (orden[selectedValues[i]] != 'undefined') {
                orden[selectedValues[i]] = lista_ids[i].innerText;
                if(selectedValues[i]!= 'none'){
                var a= document.getElementById(selectedValues[i]).value = lista_ids[i].innerText;
            }    }         
        }
        // console.log(orden);
        return true;
        
    }

    function validateAcomodo(event)
    {
      if(!ordenEventos())
      { 
        event.preventDefault();
        alert("Acomodo Incorrecto");
        returnToPreviousPage();
        //return false;
      }

      // alert("validations passed");
      document.forms['formulario'].submit();
      return true;
    }
</script>


<!--!categorias-->