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
        <p class="remember">En caso de necesitar comunicarse con soporte hacer click en "SOPORTE", atendemos tanto problemas de inicio de sesiòn, como tambien solicitudes de psychologist.</p>
        <a href="http://localhost/login-register/soporte.php">SOPORTE</a>
    </div>
        <?php
        if (isset($_POST["submit"])){
            $apodo = $_POST["apodo"];
            $email = $_POST["email"];
            $razon = $_POST["razon"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($apodo) OR empty($email) OR empty($password) OR empty($passwordRepeat) OR empty($razon)){
                array_push($errors,"Primero llena todos los requisitos");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Correo no valido");
            }
            if (strlen($password)<12){
                array_push($errors, "La contraseña debe tener 12 caracteres");
            }
            if ($password!==$passwordRepeat){
                array_push($errors, "¡Hey, la contraseña debe coincidir!");
            }
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors, "Este correo ya existe");
            }
            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div>$error<div>";
                }
            }else{
                
                $sql = "INSERT INTO users (apodo, email, razon, password) VALUES ( ?, ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"ssss",$apodo, $email, $razon, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "¡Felicidades, ya puedes ingresar!";
                }else{
                    die("Algo salio mal");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <input type="text" name="apodo" placeholder="Apodo">
            <input type="email" name="email" placeholder="Correo electrónico">
            <input type="text" name="razon" placeholder="Motivo (Privado)">
            <input type="password" name="password" placeholder="Contraseña">
            <input type="password" name="repeat_password" placeholder="Repita contraseña">
            <input id="ok" type="submit" value="Registrarse" name="submit">
            <a href="http://localhost/login-register/login.php">Si ya tienes una cuenta, hazme click</a>
        </form>
    </div>
</body>
</html>