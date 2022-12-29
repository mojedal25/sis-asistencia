<?php

if (!empty($_POST["btnentrada"])) {
    if (!empty($_POST["txtdni"])) { 
        $dni=$_POST["txtdni"];
        $consulta=$conexion->query(" select count(*) as 'total' from empleado where dni='$dni' ");
        $id=$conexion->query(" select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {

            $fecha=date("Y-m-d h:i:s");
            $id_empleado=$id->fetch_object()->id_empleado;

            $consultaFecha=$conexion->query(" select entrada from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1 ");
            $fechaBD=$consultaFecha->fetch_object()->entrada;
              
            if (substr($fecha,0,10)==substr($fechaBD,0,10)) {
                ?>
                    <script>
                        $(function notificacion(){
                            new PNotify({
                                title:"INCORRECTO",
                                type:"error",
                                text:"Ya registraste tu entrada",
                                styling:"bootstrap3"
                            })
                        })
                    </script>
                <?php
            } else {
                $sql=$conexion->query(" insert into asistencia(id_empleado,entrada)values($id_empleado,'$fecha') ");
                if ($sql == true) { ?>
                    <script>
                        $(function notificacion(){
                            new PNotify({
                                title:"CORRECTO",
                                type:"success",
                                text:"Hola, BIENVENIDO",
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
                                text:"Error al registrar entrada",
                                styling:"bootstrap3"
                            })
                        })
                    </script>
                <?php }
            }
            

           
            

            
        } else { ?>
            <script>
                $(function notificacion(){
                    new PNotify({
                        title:"INCORRECTO",
                        type:"error",
                        text:"El DNI ingreaso no existe",
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
                        text:"Ingrese el DNI",
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

<!-- Registro de Salida  -->

<?php

if (!empty($_POST["btnsalida"])) {
    if (!empty($_POST["txtdni"])) { 
        $dni=$_POST["txtdni"];
        $consulta=$conexion->query(" select count(*) as 'total' from empleado where dni='$dni' ");
        $id=$conexion->query(" select id_empleado from empleado where dni='$dni' ");
        if ($consulta->fetch_object()->total > 0) {

            $fecha=date("Y-m-d h:i:s");
            $id_empleado=$id->fetch_object()->id_empleado;
            $busqueda=$conexion->query(" select id_asistencia from asistencia where id_empleado=$id_empleado order by id_asistencia desc limit 1 ");
            $id_asistencia=$busqueda->fetch_object()->id_asistencia;
            $sql=$conexion->query(" update asistencia set salida='$fecha' where id_asistencia=$id_asistencia ");
            if ($sql == true) { ?>
                <script>
                    $(function notificacion(){
                        new PNotify({
                            title:"CORRECTO",
                            type:"success",
                            text:"ADIOS, VUELVE PRONTO",
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
                            text:"Error al registrar SALIDA",
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
                        text:"El DNI ingreaso no existe",
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
                        text:"Ingrese el DNI",
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