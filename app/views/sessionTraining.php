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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="body">
    <header class="header bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="web/images/logo.png" alt="" class="imageLogo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-75 justify-content-around">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Entrenamientos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dietas</a>
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
                    <div class="login__user">
                        <i class="fa-solid fa-user icon__user"></i>
                        <h4 class="user__name"><?= $_SESSION['username'] ?></h4>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="main">
        <!-- Aqui ira una imagen sobre las sesiones de entrenamiento -->
        <?php if (!isset($_COOKIE['sid']) || !isset($_SESSION['username'])) : ?>
            <!-- Código para cuando el usuario no ha iniciado sesión -->
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
                <div class="container">
                    <h2 class="text-center mb-4">Testimonios de nuestros usuarios</h2>
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
        <?php elseif ($_SESSION['rol'] == 'ADMIN') : ?>
            <h1 class="main__title border-bottom">SESIONES DE ENTRENAMIENTO</h1>
            <section class="section__allSession">
                <?php foreach ($sessions as $session) : ?>
                    <div class="card__allTraining">
                        <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?= $session->getId() ?>">✎</button>
                        <button class="btn-delete"><a href="index.php?accion=deleteSession&id=<?= $session->getId() ?>" class="link__btn-delete">×</a></button>
                        <img src="<?= $session->getSessionPhoto() ?>" alt="" class="img__allTraining">
                        <div class="card-content__allTraining">
                            <h2 class="title__allTraining"><?= $session->getType() ?></h2>
                            <p class="text__allTraining"><?= $session->getDescription() ?></p>
                            <a href="" class="link__allTraining">MOSTRAR EJERCICIOS</a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop-<?= $session->getId() ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-<?= $session->getId() ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel-<?= $session->getId() ?>">Editar Sesión</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí puedes añadir el formulario de edición de sesión -->
                                    <form action="index.php?accion=editSession&id=<?= $session->getId() ?>" method="POST">
                                        <div class="mb-3">
                                            <input type="hidden" name="idTraining" value="<?= $session->getIdTraining() ?>">
                                            <label for="sessionType-<?= $session->getId() ?>" class="form-label">Tipo de Sesión</label>
                                            <input type="text" class="form-control" id="sessionType-<?= $session->getId() ?>" name="type" value="<?= $session->getType() ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sessionDescription-<?= $session->getId() ?>" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="sessionDescription-<?= $session->getId() ?>" name="description"><?= $session->getDescription() ?></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <section class="section__addSession">
                <button type="button" class="button__addTraining" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    AÑADIR NUEVA SESIÓN DE ENTRENAMIENTO
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
                                <form action="index.php?accion=registerSession" method="POST" class="form__addTraining" enctype="multipart/form-data">
                                    <label for="type" class="label__addTraining">TIPO SESIÓN</label>
                                    <input type="text" name="type" class="input__addTraining">

                                    <label for="description" class="label__addTraining">DESCRIPCIÓN</label>
                                    <textarea name="description" class="textarea__addTraining"></textarea>

                                    <label for="sessionPhoto" class="label__addTraining">PRESENTACIÓN</label>
                                    <input type="file" name="sessionPhoto[]" multiple class="input__addTraining">
                                    
                                    <div class="modal-footer">
                                        <input type="submit" value="GUARDAR" class="button__addTraining">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif ($_SESSION['rol'] == 'CLIENTE') : ?>
            <!-- Código si el usuario introducido pertenece a cliente -->
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
                    <p class="mb-1"><i class="fas fa-phone me-2"></i>+34 123 456 789</p>
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
    <script src="web/js/js.js"></script>
    <script src="web/js/swiper.js"></script>
</body>

</html>