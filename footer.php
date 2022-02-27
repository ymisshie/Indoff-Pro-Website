</main>
<!--!start #main-site-->

<!--start #footer-->
<footer>

</footer>
<!--!start #footer-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<!--
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
-->

<!--  isotope plugin cdn 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>
-->

<!--select-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Custom Javascript -->
<script src="index.js"></script>

<script>
    jQuery('button').click(function(e) {
        jQuery('.collapse').collapse('hide');
    });


    //Seleccion de colores de producto por el admin

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
        var precios_lista = document.getElementById("cantidad_producto[]");


        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        console.log(valor);

        var arreglo = valor.split(",")

        console.log(arreglo);

        if (valor != 'Unidades') {

            for (var i = 0; i < miArray.length; i += 1) {

                var modificarlabelprecio = document.getElementById("precioselect_producto");
                modificarlabelprecio.textContent = 'Costo: ' + arreglo[0];
                var modificarlabelcostounidad = document.getElementById("precioIndividual");
                modificarlabelcostounidad.textContent = arreglo[1] + '/Unidad';
            }
        }
    }
</script>

</body>

</html>