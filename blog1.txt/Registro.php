<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';

if (isset($_POST['enviar'])) {
    Conexion :: abrir_conexion();
    
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());
    
    if ($validador -> registro_valido()){
        $usuario = new Usuario('', $validador-> obtener_nombre(), $validador -> obtener_email(), $validador -> obtener_clave(), '', '');
        $usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);
        
        if ($usuario_insertado){
            // Redirigir a login
            
        }
    }
    Conexion :: cerrar_conexion();
}

$titulo = 'Registro';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones:
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        Para unirte al blog de los diseñadores, introduce un nombre de usuario, tu email y una contaseña. 
                        El email que escribas debe ser real ya que lo necesitaras para gestionar tu cuenta.
                        Te recomendamos que uses una contraseña que contenga letras minusculas, mayusculas, numeros y simbolos.
                    </p>
                    <br>
                    <br>
                    <a href="#">¿Ya tienes cuenta?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidastes tu contraseña?</a>
                    <br>
                    <br>
                </div>
            </div>

        </div>

        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                        if (isset($_POST['enviar'])) {
                            include_once 'plantillas/registro_validado.inc.php';
                        } else {

                            include_once 'plantillas/registro_vacio.inc.php';
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once 'plantillas/documento-cierre.inc.php';
        ?>
           