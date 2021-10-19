<?php
session_start();
unset($_SESSION['sesionFarmacia']['rut']);
// session_destroy();
header("location:./");
?>