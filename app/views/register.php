<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="web/css/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <form action="index.php?accion=registro" method="post">
            <label for="username" class="label__register">Nombre Usuario</label>
            <input type="text" name="username" class="input__register"><br>
            <label for="email" class="label__register">Correo Electrónico</label>
            <input type="email" name="email" class="input__register"><br>
            <label for="password" class="label__register">Contraseña</label>
            <input type="password" name="password" class="input__register"><br>
            <label for="firstName" class="label__register">Primer Nombre</label>
            <input type="text" name="firstName" class="input__register"><br>
            <label for="lastName" class="label__register">Apellidos</label>
            <input type="text" name="lastName" class="input__register"><br>
            <label for="dni" class="label__register">DNI</label>
            <input type="text" name="dni" class="input__register"><br>
            <input type="submit" value="Registrar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>