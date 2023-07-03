<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="shortcut icon" href="/img/favicon.png.ico">    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="preload" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body-login">

    <div class="login-container sombra">

        <div class="login-izquierda">
            <div class="contenido-izquierda ">

            </div>
        </div>
        <div class="login-derecha ">
            <div class="logo-login">
                <img class="imagen-login" src="img/Comisión_Federal_de_Electricidad_(logo)_.svg.png" alt="cfe-logo">
            </div>
            <h1 class="titulo-login"> <span>si</span>stema de <span>se</span>guimiento de <span>de</span>sperfectos</h1>

            <form class="inputs-container" action="login-post.php" method="post">
                <fieldset>
                    <legend>Ingresa tus datos</legend>
                    <div class="container-campos">
                        <div class="campos">
                            <label>RPE:</label>
                            <input class="input" type="numero"  name="rpe_traba" id="rpe_traba" placeholder="Ingresa aqui tu RPE">
                        </div>
                        <div class="campos">
                            <label>Contraseña:</label>
                            <input class="input" type="password" name="llave_traba" id="llave_traba" placeholder="Ingresa aqui tu contraseña">
                        </div>
                        
                        <button class="btn-login">Ingresar</button>
                    </div>
                </fieldset>
            </form>
        </div><!--.login-derecha-->

    </div><!--.login-container-->
    <footer>
        <p>Comisión Federal de Electricidad :: C.T. Presidente Juárez :: Preacuerdos
            © 2008 Todos los derechos reservados
        </p>
    </footer>
</body>

</html>