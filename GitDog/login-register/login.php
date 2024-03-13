<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
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
        <p>Le facilitamos su busqueda de psychologist conforme a su necesidad, ademas podra interactuar en un foro 100% Online las 24 Hrs.</p>
    </div>
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "usuario";
                    header("location: index.php");
                    die();
                }else{
                    echo "¡Contraseña incorrecta!";
                }
            }else{
                echo "Correo inexistente...";
            }
        }
        ?>
        <form action="login.php" method="POST">
            <input type="email" placeholder="Correo electrónico" name="email">
            <input type="password" placeholder="Contraseña" name="password">
            <input id="ok" type="submit" value="Iniciar sesión" name="login">
            <a href="http://localhost/login-register/registration.php">¿Deseas registrarte?, Hazme click</a> 
        </form>
    </div>
</body>
</html>