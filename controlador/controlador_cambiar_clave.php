<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtclaveactual"]) and !empty($_POST["txtclavenueva"]) and !empty($_POST["txtid"])) {
        $claveactual=md5($_POST["txtclaveactual"]);
        $clavenueva=md5($_POST["txtclavenueva"]);
        $id=$_POST["txtid"];
        $verificarClaveActual=$conexion->query(" select password from usuario where id_usuario=$id ");
        if ($verificarClaveActual->fetch_object()->password==$claveactual ) { 
            $sql=$conexion->query(" update usuario set password='$clavenueva' where id_usuario=$id ");
            if ($sql == true) { ?>
                <script>
                $(function notificacion(){
                    new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"La contraseña actual es correcta",
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
                        text:"Error al modifcar la contraseña",
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
                        text:"La contraseña actual es incorrecta",
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
         <script>
            setTimeout(() => {
                window.history.replaceState(null,null,window.location.pathname);
            }, 0);
         </script>
<?php }

?>