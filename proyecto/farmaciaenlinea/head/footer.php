<?php 
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
// $fechadehoy = strftime("%F"); //strftime("%F") ó strftime("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
?>

<!-- Footer -->
<footer class="sticky-footer" style="background:brown; color:white;">
<!-- style="width: 100%;height: 400px;background-image: url(https://digitalcorp.cl/tracking/img/banner@3x.fd8b14ef.png);background-size: 100% 100%;" -->
      <div class="container my-auto">
          <div class="row" style="padding: 120px;">
              <div class="col">
              <div class="copyright text-center my-auto">
              <span>Copyright &copy; Todos los derechos reservados <?php echo $anoactual; ?></span>
          </div>
              </div>
          </div>
         
      </div>
  </footer>
<!-- End of Footer -->