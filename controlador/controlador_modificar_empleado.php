<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtcargo"]) and !empty($_POST["txtid"])) {        
        $nombre = $_POST["txtnombre"];
        $apellido = $_POST["txtapellido"];        
        $cargo = $_POST["txtcargo"];
        $id = $_POST["txtid"];
        $sql1=$conexion->query(" update empleado set nombre='$nombre', apellido='$apellido', cargo=$cargo where id_empleado='$id' ");
        if ($sql1 == true) { ?>
            <script>
                $(function notificacion(){
                    new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"El empleado se ha modificado correctamente",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion(){
                    new PNotify({
                        title:"INCORRECTO",
                        type:"error",
                        text:"Error al modificar empleado",
                        styling:"bootstrap3"
                    })
                })
            </script>
        <?php }
        
    } else { ?>
        <script>
                $(function notificacion(){
                    new PNotify({
                        title:"INCORRECTO",
                        type:"error",
                        text:"Los campos estan vacios",
                        styling:"bootstrap3"
                    })
                })
            </script>
    <?php } ?>
    
<?php }

?>