<?php
// print_r($_SESSION);
if(!empty($_SESSION['contacto'])) {
    $mensaje = '<p class="message text-center mt-2" > '.$_SESSION['contacto'].'</p>';
    // print $mensaje;
    //unset($_SESSION['contacto']);
}
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section >
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 mt-5 mb-3">
                <div class="main-heading-content text-center">
                    <h2 class="hero-title mbr-fonts-style mbr-section-title align-center display-2">Contáctanos</h2>
                    
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >            
                <div id="thank_you" hidden="false">Thanks for filling out the form!</div>
                <form  action="contact-form-email.php" method="post">
                    <div class="row row-sm-offset">
                        <div class="col-md-12 multi-horizontal mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-md-12 multi-horizontal mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-md-12 multi-horizontal mb-3">
                            <div class="form-group">
                                <input type="tel" class="form-control" name="phone" placeholder="Phone" required >
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3" data-for="message">
                        <textarea type="text" class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                    </div>
                    <?php
                    if($_GET){
                    if(isset($_GET['message'])){
                        ?>
                        <br>
                        <h4 class="text-danger text-center uppercase" > Captcha Inválido </h4>
                        <?php
                    }}
                    ?> 
                    <div class="g-recaptcha  align-self-center d-flex justify-content-center mt-5" data-sitekey="6LehDuMeAAAAAJlutCCDPTkVLTMacM8vqUqNzHdK"></div>
                    <span class="input-group-btn"><button type="submit" class="btn btn-form btn-primary display-4 mb-3 mx-auto">SEND</button></span>
                    
                </form>

                  
            </div>
            <div class="col-md-6 ">
                <div class="container pb-5">
                <div class="row justify-content-center mx-auto">
                    <div class="d-flex justify-content-center col-11 mx-auto">
                        <i class="pt-1 fas fa-bell fs-2 col-2 <?php if(empty($_SESSION['contacto'])) echo "d-none" ?>" style="color: #c54955; padding-left: 20px"></i>
                        <button type="button" class="btn btn-form btn-primary display-4 mb-3 col-7 <?php if(empty($_SESSION['contacto'])) echo "d-none" ?>" data-bs-toggle="modal" data-bs-target="#nuevoMensaje">
                            Nuevo mensaje
                        </button>
                    </div>
                    
                    <div class="mt-5 col-10 rounded p-2" style="border-style: solid; border-width: 5px; ">
                        <div class="pt-2 row">
                            <p class="col-1"></p>
                            <i class="col-1  pt-1 fa-solid fa-location-dot" style="color: #c54955"></i>
                            <p class="col-8">Parque Industrial El Águila, Tijuana, México </p>
                        </div>
                        <div class="pt-2 row ">
                            <p class="col-1"></p>
                            <i class="col-1 pt-1 fa-solid fa-phone" style="color: #c54955"></i>
                            <p class="col-8" >(664) 625 1111 </p>
                        </div>
                        <div class="pt-2 row">
                            <p class="col-1"></p>
                            <i class="col-1 pt-1 fa-solid fa-envelope" style="color: #c54955"></i>
                            <p class="col-8" >mexico@indoff.com </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
   </div>
  

</section>


<!-- Modal -->
<div class="modal fade" id="nuevoMensaje" tabindex="-1" role="dialog" aria-labelledby="nuevoMensajeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoMensajeLabel">Nuevo mensaje</h5>
        <button type="button" class="close" id="alertCerrarBoton2" onclick="borrarMensaje()" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $mensaje ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="borrarMensaje()" id="alertCerrarBoton" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    function borrarMensaje(){
        <?php
           unset($_SESSION['contacto']);
        ?>
        // var = document.getElementById('alertCerrarBoton').value;
        // var = document.getElementById('pwd2_user').value;
    }
    
</script>