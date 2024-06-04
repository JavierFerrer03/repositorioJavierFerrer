<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthMastery</title>
    <link rel="stylesheet" href="web/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="body">
    <header class="header bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="index.php?accion=inicio"><img src="web/images/logo.png" alt="" class="imageLogo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-75 justify-content-around">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=inicioTraining">Entrenamientos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=inicioDiets">Dietas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Recetas</a>
                        </li>
                    </ul>
                </div>
                <?php if (!isset($_COOKIE['sid']) || !isset($_SESSION['username'])) : ?>
                    <div class="navbar-login">
                        <button class="button__login"><a href="index.php?accion=login" class="link__login">Iniciar Sesión</a></button>
                    </div>
                <?php else : ?>
                    <div class="dropdown login__user">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user icon__user"></i>
                            <?= $_SESSION['username'] ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="index.php?accion=profile">Mi perfil</a></li>
                            <?php if ($_SESSION['rol'] === 'ADMIN') : ?>
                                <li><a class="dropdown-item" href="#">Todos Clientes</a></li>
                            <?php elseif ($_SESSION['rol'] === 'CLIENTE') : ?>
                                <li><a class="dropdown-item" href="#">Clientillos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="index.php?accion=logout" id="logout-button">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="main">
        <section class="section__imageDiets py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="web/images/fondoDietas.png" alt="" class="img-fluid image__diets">
                    </div>
                    <div class="col-lg-6 section__infoDiets">
                        <h2 class="border-bottom">BIENVENIDOS A LA SECCIÓN DE DIETAS</h2>
                        <p>En esta sección encontrarás diversas dietas recomendadas por expertos para ayudarte a alcanzar tus objetivos de salud y bienestar. Ya sea que busques ganar masa muscular, perder peso, o simplemente mantener una alimentación equilibrada, aquí podrás encontrar planes dietéticos adaptados a tus necesidades. Además, podrás registrar tus comidas diarias, calcular las calorías y macronutrientes ingeridos, y llevar un seguimiento detallado de tu progreso.</p>
                    </div>
                </div>
            </div>
        </section>
        <?php if (!isset($_COOKIE['sid']) || !isset($_SESSION['username'])) : ?>
            <!-- Código perteneciente si no se ha iniciado sesión -->
            <h1 class="main__title mt-5 border-bottom">BIENVENIDO A HEALTHMASTERY</h1>
            <section class="section__cardLogin">
                <div class="custom-card">
                    <h2 class="border-bottom title__cardLogin">FAMILIA HEALTHMASTERY</h2>
                    <p class="text__cardLogin border-bottom">Todavía no perteneces a nuestra familia, únete para poder disfrutar <br>
                        de todas nuestras ventajas.</p>
                    <ul>
                        <li>Acceso a rutinas personalizadas</li>
                        <li>Seguimiento de tu progreso</li>
                        <li>Acceso a dietas y recetas exclusivas</li>
                        <li>Participación en la comunidad</li>
                    </ul>
                    <a href="index.php?accion=login" class="btn btn-primary">INICIAR SESIÓN</a>
                </div>
            </section>
            <section class="section__testimonials py-5">
                <div class="container-swiper">
                    <h2 class="text-center">Testimonios de nuestros usuarios</h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial">
                                    <p>"HealthMastery ha cambiado mi vida. He logrado mis objetivos de fitness y me siento mejor que nunca."</p>
                                    <h5>Juan Pérez</h5>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial">
                                    <p>"Las recetas y planes de alimentación son increíbles. Nunca había comido tan saludable y delicioso."</p>
                                    <h5>María García</h5>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial">
                                    <p>"El soporte y la comunidad en HealthMastery me han mantenido motivado y en el camino correcto."</p>
                                    <h5>Carlos Sánchez</h5>
                                </div>
                            </div>
                            <!-- Agrega más testimonios según sea necesario -->
                        </div>
                        <!-- Agregar navegación de swiper -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        <?php else : ?>
            <h1 class="main__title border-bottom">DIETAS SALUDABLES</h1>
            <?php if ($_SESSION['rol'] === 'ADMIN') :  ?>
                <!-- Código pertenenciente si el usuario es administrador -->
                <section class="section__allDiets mt-5">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($diets as $diet) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="card-container-diet">
                                        <div class="card-diet">
                                            <div class="front-content-diet">
                                                <p><?= $diet->getName() ?></p>
                                            </div>
                                            <div class="content-diet">
                                                <p class="heading-diet"><?= $diet->getName() ?></p>
                                                <p><?= $diet->getDescription() ?></p>
                                                <p>BENEFICIOS: <?= $diet->getGoal() ?></p>
                                                <a href="index.php?accion=infoDiet&id=<?= $diet->getId() ?>" class="link__diets">Más información</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <section class="section__add">
                    <button type="button" class="button__addTraining" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        AÑADIR NUEVA DIETA
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">INTRODUCE LOS DATOS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php?accion=registerDiet" method="POST" class="form__addTraining">
                                        <label for="name" class="label__addTraining">NOMBRE</label>
                                        <input type="text" name="name" class="input__addTraining">

                                        <label for="description" class="label__addTraining">DESCRIPCIÓN</label>
                                        <textarea name="description" class="textarea__addTraining"></textarea>

                                        <label for="goal" class="label__addTraining">GOAL</label>
                                        <input type="text" name="goal" class="input__addTraining">

                                        <label for="restrictions" class="label__addTraining">RESTRINCIONES</label>
                                        <input type="text" name="restrictions" class="input__addTraining">

                                        <label for="calories" class="label__addTraining">CALORÍAS</label>
                                        <input type="text" name="calories" class="input__addTraining">

                                        <label for="protein" class="label__addTraining">PROTEÍNAS</label>
                                        <input type="text" name="protein" class="input__addTraining">

                                        <label for="carbohydrates" class="label__addTraining">CARBOHIDRATOS</label>
                                        <input type="text" name="carbohydrates" class="input__addTraining">

                                        <label for="fats" class="label__addTraining">GRASAS</label>
                                        <input type="text" name="fats" class="input__addTraining">

                                        <div class="modal-footer">
                                            <input type="submit" value="GUARDAR" class="button__addTraining">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ($_SESSION['rol'] === 'CLIENTE') : ?>
                <!-- Código perteneciente si el usuario es cliente -->
                <section class="section__allDiets mt-5">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($diets as $diet) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="card-container-diet">
                                        <div class="card-diet">
                                            <div class="front-content-diet">
                                                <p><?= $diet->getName() ?></p>
                                            </div>
                                            <div class="content-diet">
                                                <p class="heading-diet"><?= $diet->getName() ?></p>
                                                <p><?= $diet->getDescription() ?></p>
                                                <p>BENEFICIOS: <?= $diet->getGoal() ?></p>
                                                <a href="index.php?accion=infoDiet&id=<?= $diet->getId() ?>" class="link__diets">Más información</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <section class="section__meal-log py-5 d-flex justify-content-center mt-5">
                    <div class="container">
                        <h2 class="text-center border-bottom main__title">REGISTRO DIARIO DE COMIDAS</h2>
                        <form id="meal-log-form" class="form__diet mt-5">
                            <div class="form-group">
                                <label for="meal-type" class="label__diet">Tipo de Comida:</label> <br>
                                <select id="meal-type" name="meal-type" class="select__diet" required>
                                    <option value="desayuno" class="option__diet">Desayuno</option>
                                    <option value="almuerzo" class="option__diet">Almuerzo</option>
                                    <option value="cena" class="option__diet">Cena</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="food" class="label__diet">Alimento:</label><br>
                                <input type="text" id="food" name="food" class="input__diet" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="label__diet">Cantidad (gramos):</label> <br>
                                <input type="number" id="quantity" name="quantity" class="input__diet" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="button__login btn-diet">Añadir Comida</button>
                            </div>
                        </form>
                        <div class="section__canvas">
                            <canvas id="nutrition-chart" class="text-center"></canvas>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endif; ?>
    </main>
    <footer class="bg-dark text-white py-4 mt-auto border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>HealthMastery</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Inicio</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Entrenamientos</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Dietas</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Recetas</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Síguenos</h5>
                    <ul class="list-unstyled d-flex">
                        <li><a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contacto</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>info@healthmastery.com</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i>+34 603 435 249</p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Calle Ejemplo, 123, Madrid, España</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 HealthMastery. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="web/js/js.js"></script>
    <script src="web/js/swiper.js"></script>
</body>

</html>