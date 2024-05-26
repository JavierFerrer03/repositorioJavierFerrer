<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="web/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body">
    <main class="container__register">
        <section class="section__intro">
            <h2 class="title__intro">HealthMastery</h2>
        </section>
        <section class="section__formlogin">
            <form action="index.php?accion=register" method="POST" class="form__login">
                <h1 class="title__login border-bottom">INTRODUCE TUS DATOS</h1>
                <label for="username" class="label__login">Nombre Usuario</label><br>
                <input type="text" name="username" class="input__login" placeholder="Username"><br>
                <label for="email" class="label__login">Correo Electrónico</label><br>
                <input type="email" name="email" class="input__login" placeholder="example@example.com"><br>
                <label for="password" class="label__login">Contraseña</label><br>
                <input type="password" name="password" class="input__login" placeholder="***********"><br>
                <label for="firstName" class="label__login">Nombre</label><br>
                <input type="text" name="firstName" class="input__login" placeholder="Nombre"><br>
                <label for="lastName" class="label__login">Apellidos</label><br>
                <input type="text" name="lastName" class="input__login" placeholder="Apellidos"><br>
                <label for="dni" class="label__login">DNI</label><br>
                <input type="text" name="dni" class="input__login" placeholder="12345678H"><br>
                <input type="submit" class="button__login" value="REGISTRAR">
                <h4 class="error__messages"><?= $error ?></h4>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>