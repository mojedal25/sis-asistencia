<?php
    session_start();
    session_destroy();
    header("location:/asistencia/vista/login/login.php");
?>