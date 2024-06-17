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
                            <a class="nav-link" href="index.php?accion=inicioRecipe">Recetas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?accion=sobreMi">Sobre Mí</a>
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
                                <li><a class="dropdown-item" href="index.php?accion=clients">Todos Clientes</a></li>
                            <?php elseif ($_SESSION['rol'] === 'CLIENTE') : ?>
                                <li><a class="dropdown-item" href="index.php?accion=inicioFavourite">Favoritos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="index.php?accion=logout" id="logout-button">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="main">
        <section class="section__imageDiets position-relative">
            <div class="overlay-diet position-absolute top-50 start-50 translate-middle text-center text-white p-3">
                <h2 class="fw-bold">BIENVENIDOS A LA SECCIÓN DE DIETAS</h2>
                <p>En esta sección encontrarás diversas dietas recomendadas por expertos para ayudarte a alcanzar tus objetivos de salud y bienestar. Ya sea que busques ganar masa muscular, perder peso, o simplemente mantener una alimentación equilibrada, aquí podrás encontrar planes dietéticos adaptados a tus necesidades.</p>
            </div>
            <img src="web/images/dietFondo.jpg" alt="" class="img-fluid image__diets w-100">
            <div class="text-center bg-dark text-white py-2">
                <h3>INFORMACIÓN SOBRE LA DIETA</h3>
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
            <?php if ($_SESSION['rol'] === 'ADMIN') : ?>
                <!-- Código pertenenciente si el usuario es administrador -->

            <?php elseif ($_SESSION['rol'] === 'CLIENTE') : ?>
                <!-- Código perteneciente si el usuario es cliente -->
                <section class="section__dietInfo py-5">
                    <div class="container">
                        <h1 class="main__title border-bottom text-center"><?= $diet->getName() ?></h1>
                        <article class="article__dietInfo row">
                            <div class="col-md-6 article__image text-center">
                                <img src="web/images/dieta.webp" alt="" class="img-fluid image__diet">
                            </div>
                            <div class="col-md-6 article__presentation">
                                <h2>Descripción</h2>
                                <p><?= $diet->getDescription() ?></p>
                                <h2>Beneficios</h2>
                                <ul>
                                    <li>Mejora tu salud cardiovascular</li>
                                    <li>Aumenta tu energía</li>
                                    <li>Ayuda a mantener un peso saludable</li>
                                    <li>Fomenta hábitos alimenticios saludables</li>
                                </ul>
                                <h2>Restricciones</h2>
                                <p><?= $diet->getRestrictions() ?></p>
                                <h4 class="main__title">DATOS TOTALES DIETA</h4>
                                <table class="text-center w-100">
                                    <tr>
                                        <th>CALORÍAS</th>
                                        <th>PROTEÍNA</th>
                                        <th>CARBOHIDRATOS</th>
                                        <th>GRASAS</th>
                                    </tr>
                                    <tr>
                                        <td><?= $diet->getCalories() ?></td>
                                        <td><?= $diet->getProtein() ?></td>
                                        <td><?= $diet->getCarbohydrates() ?></td>
                                        <td><?= $diet->getFats() ?></td>
                                    </tr>
                                </table>
                            </div>
                        </article>
                    </div>
                </section>
                <section class="section__table mt-5">
                    <h1 class="main__title">SEGUIMIENTO DE ALIMENTACIÓN DIARIA</h1>
                    <table class="table__infoDiet table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Comida</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Calorías</th>
                                <th scope="col">Proteínas</th>
                                <th scope="col">Carbohidratos</th>
                                <th scope="col">Grasas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Desayuno</td>
                                <td class="td__text">7:00 AM</td>
                                <td class="td__text">Avena con frutas y nueces</td>
                                <td class="td__text">350</td>
                                <td class="td__text">10g</td>
                                <td class="td__text">50g</td>
                                <td class="td__text">10g</td>
                            </tr>
                            <tr>
                                <td>Snack</td>
                                <td class="td__text">10:00 AM</td>
                                <td class="td__text">Yogur griego con miel</td>
                                <td class="td__text">150</td>
                                <td class="td__text">10g</td>
                                <td class="td__text">15g</td>
                                <td class="td__text">5g</td>
                            </tr>
                            <tr>
                                <td>Almuerzo</td>
                                <td class="td__text">1:00 PM</td>
                                <td class="td__text">Ensalada de pollo con quinoa y aguacate</td>
                                <td class="td__text">450</td>
                                <td class="td__text">30g</td>
                                <td class="td__text">40g</td>
                                <td class="td__text">15g</td>
                            </tr>
                            <tr>
                                <td>Snack</td>
                                <td class="td__text">4:00 PM</td>
                                <td class="td__text">Hummus con zanahorias y pepinos</td>
                                <td class="td__text">200</td>
                                <td class="td__text">5g</td>
                                <td class="td__text">20g</td>
                                <td class="td__text">10g</td>
                            </tr>
                            <tr>
                                <td>Cena</td>
                                <td class="td__text">7:00 PM</td>
                                <td class="td__text">Salmón al horno con espárragos y arroz integral</td>
                                <td class="td__text">500</td>
                                <td class="td__text">35g</td>
                                <td class="td__text">50g</td>
                                <td class="td__text">20g</td>
                            </tr>
                            <tr>
                                <td>Snack Nocturno</td>
                                <td class="td__text">9:00 PM</td>
                                <td class="td__text">Batido de proteínas con leche de almendras</td>
                                <td class="td__text">200</td>
                                <td class="td__text">20g</td>
                                <td class="td__text">10g</td>
                                <td class="td__text">8g</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section class="section__infoTable">
                    <canvas id="mealChart" width="400" height="200"></canvas>
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