<script>
    //EFECTOS DINAMICOS DEL MODAL
    $(".modal").each(function(l) {
        $(this).on("show.bs.modal", function(l) {
            var o = $(this).attr("data-easein");
            "shake" == o ? $(".modal-dialog").velocity("callout." + o) : "pulse" == o ? $(".modal-dialog").velocity("callout." + o) : "tada" == o ? $(".modal-dialog").velocity("callout." + o) : "flash" == o ? $(".modal-dialog").velocity("callout." + o) : "bounce" == o ? $(".modal-dialog").velocity("callout." + o) : "swing" == o ? $(".modal-dialog").velocity("callout." + o) : $(".modal-dialog").velocity("transition." + o)
        })
    });
</script>


<?php
$añoactualfooter = strftime("%Y");
?>

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Todos los derechos reservados <?php echo $añoactualfooter; ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->