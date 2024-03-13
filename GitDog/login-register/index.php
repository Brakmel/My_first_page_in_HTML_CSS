<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PsicoShake</title>
    <link rel="stylesheet" href="Style/regis.css">
</head>
<body>
    <div class="container">
        <div class="information">
                <div class="tittle">
                    <h1 class="psico_h1">Psico</h1><h1 class="check_h1">Check</h1>
                </div>
            <p>¡Welcome!, se espera que disfrutes del foro y que su busqueda de psychologist sea exitosa.</p>
            <p class="remember">¡Se le recuerda!, se le enviara al correo el "Check" de verified, si no es contestado dentro de las 24hrs su cuenta sera borrada, gracias por la atención.</p>
            <a href="http://localhost/login-register/logout.php">Cerrar sesión </a>
         </div>
        <div id="container_chat">
            <div class="sends">
            </div>
            <form class="container_writing" action="" method="post">
                <input name="" class="url_writing" type="url" placeholder="URL">
                <input name="" class="writing" type="text" placeholder="¿Que opinas?...">
                <input name="" class="send_writing" type="submit">
            </form>
        </div>
    </div>  
</body>
</html>