</main>
<!--!start #main-site-->

<!--start #footer-->
<footer class="color-aqua-bg">
    <div class="container-fluid text-white px-5 py-3">
        <div class="row justify-content-center py-md-3">
            <a class="navbar-brand fw-500 mx-2 text-white" href="index.php">Indoff Pro</a>
        </div>
        <div class="row justify-content-center pb-2">
            <div class="col-12 col-md-3">
                <h5 class="uppercase py-4 fw-600">Productos Promocionales</h5>
                <p> <a href="categorias.php" class="uppercase text-white fw-500">Categorias</a></p>
                <p> <a href="eventos.php" class="uppercase text-white fw-500">Eventos</a></p>
                <p> <a href="contacto.php" class="uppercase text-white fw-500">Contacto</a></p>
                <p> <a href="nosotros.php" class="uppercase text-white fw-500">Nosotros</a></p>
            </div>
            <div class="col-12 col-md-3">
                <h5 class="uppercase py-4 fw-600">Contáctanos</h5>
                <p><span><i class="fas fa-map-marker-alt me-3 fs-1-2"></i></span> Tijuana, México</p>
                <p><a href="mailto:mexico@indoff.com" class="text-white"><span><i class="fas fa-envelope me-3 fs-1-2"></i></span>mexico@indoff.com</a></p>
                <p><span><i class="fas fa-phone me-3 fs-1-2"></i></span>(664) 625 11 11</p>
                <p><span><i class="fas fa-phone me-3 fs-1-2"></i></span>(664) 123 39 90</p>
            </div>

            <div class="col-12 col-md-3 pb-2">
                <h5 class="uppercase py-4 fw-600 col-md-9 col-10">Conecta con nuestras redes sociales</h5>
                <div class="col-7 d-flex justify-content-between">
                    <div class="">
                        <a href="https://www.linkedin.com/company/31381210/admin/"><i class="fab fa-linkedin fs-3 text-white"></i></a>
                    </div>
                    <div class="">
                        <a href="https://www.facebook.com/indoffpro"><i class="fab fa-facebook fs-3 text-white"></i></a>
                    </div>
                    <div class="">
                        <a href="mailto:mexico@indoff.com"><i class="fas fa-envelope fs-3 text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-center copyright py-3 py-md-4">
    © 2022 Copyright:
    <a class="text-reset fw-bold mb-0" href="index.php">indoffpro.com</a>
</div>

<!--!start #footer-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Custom Javascript -->
<script src="index.js"></script>

<script>
    jQuery('button').click(function(e) {
        jQuery('.collapse').collapse('hide');
    });

    $("#color-select").select2({
        placeholder: 'Seleccione los colores deseados o puede buscarlos por nombre con la referencia de abajo.',
        allowClear: true
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    //Obtener el valor del color
    function color_selected() {
        var buttonName = event.target.name;
        console.log(buttonName);
        document.getElementById('mostrarColorNombre').innerHTML = buttonName;
        document.getElementById('mostrarColor').style.backgroundColor = buttonName;
    };

    /*
        var nextinput = 0;

        $("#nuevo_campo").click(function(e) {
            nextinput++;
            var campo = '<div class="d-flex pt-lg-2 pb-lg-2"> <h6 class=" col-form-label col-lg-3 fw-600 color-grey2">Cantidad mínima ' + newinput + '</h6> <div class="form-group col-lg-3 mx-lg-3"> <input class=" col-12 qty-dropdown" type="number" name="q' + newinput + '_producto" placeholder="0" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1"> <small class="d-flex form-text text-disbabled">Cantidad mínima ' + newinput + '</small> </div> <h6 class="col-form-label fw-600 col-lg-2 color-grey2 ms-lg-4">Costo ' + newinput + '</h6> <div class="form-group col-lg-3"> <input class=" col-12 qty-dropdown" type="number" name="p' + newinput + '_producto" placeholder="0" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1"> <small class="d-flex form-text text-disbabled">Costo ' + newinput + '</small></div></div>'
        });
        */

    function cambiarPrecio() {

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones1_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad1_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect1_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual1_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)


        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones2_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad2_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect2_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual2_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones3_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad3_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect3_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual3_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones4_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad4_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect4_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual4_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones5_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad5_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect5_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual5_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones6_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad6_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect6_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual6_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones7_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad7_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect7_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual7_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones8_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad8_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect8_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual8_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones9_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad9_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect9_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual9_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones10_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad10_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect10_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual10_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

    }
</script>

</body>

</html>