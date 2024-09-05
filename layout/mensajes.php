<?php
      //se inicia una sesion
     //session_start();
      //aca se verifica la existencia de una session y un icono
      if((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono']))){
          $mensaje = $_SESSION['mensaje'];
          $icono = $_SESSION['icono'];
          ?>
          <script>
            //sweetalert
              Swal.fire({
                position: "top-middle",
                icon: "<?=$icono;?>",
                title: "<?=$mensaje?>",
                showConfirmButton: false,
                timer: 4000
              });
          </script>

       <?php
       //permite eliminar una sesion en especifico
       unset($_SESSION['mensaje']);
       unset($_SESSION['icono']);
      }
       ?>     