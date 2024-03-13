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
            <p>llene el formulario y Soporte se comunicara en breve con usted por celular o Correo, si llena todos los campos lo más probable que le contestaremos mucho más rapido.</p>
            <p class="remember">En caso de ser Psicologo por este medio tambien lo atenderemos.</p>
        </div>
        <form action="https://formsubmit.co/BRAKMEL6@icloud.com" method="POST">
            <input type="Name" name="Apodo" placeholder="Apodo" required>
            <input type="text" name="razon" placeholder="Motivo de consulta" required>
            <input type="email" name="Correo" placeholder="Correo electrónico" required>
            <input type="text" name="Celular" placeholder="Celular (Opcional)">
            <textarea class="resume" name="Problematica" placeholder="Aqui se puede explayar libremente" required></textarea>
            <input id="ok" type="submit" value="Enviar formulario" name="submit">
            <input type="hidden" name="_next" value="http://localhost/login-register/nice.php">
            <a href="http://localhost/login-register/index.php">¿Deseas regresar?, Hazme click</a> 
        </form>
    </div>
</body>
</html>