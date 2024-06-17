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
                                <li><a class="dropdown-item" href="#">Todos Clientes</a></li>
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
        <section class="section__imageSession">
            <div id="fuerza" class="sectionCard">
                <div class="contentCard">
                    <h1>FUERZA</h1>
                </div>
                <div class="overlay"></div>
            </div>
            <div id="cardio" class="sectionCard">
                <div class="contentCard">
                    <h1>CARDIO</h1>
                </div>
                <div class="overlay"></div>
            </div>
            <div id="hiit" class="sectionCard">
                <div class="contentCard">
                    <h1>HIIT</h1>
                </div>
                <div class="overlay"></div>
            </div>
            <div id="estiramientos" class="sectionCard">
                <div class="contentCard">
                    <h1>ESTIRAMIENTOS</h1>
                </div>
                <div class="overlay"></div>
            </div>
            <div id="yoga" class="sectionCard">
                <div class="contentCard">
                    <h1>YOGA</h1>
                </div>
                <div class="overlay"></div>
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
            <?php if ($_SESSION['rol'] === 'ADMIN') :  ?>
                <!-- Código pertenenciente si el usuario es administrador -->
                <h1 class="main__title border-bottom">RUTINAS DE ENTRENAMIENTO</h1>
                <section class="section__allTrainings">
                    <!-- Aquí se mostrarán todos los entrenamientos donde se puedan editar borrar -->
                    <div class="row">
                        <?php foreach ($trainings as $training) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12" style="margin: 10px auto;">
                                <div class="card__allTraining">
                                    <button class="btn-delete"><a href="index.php?accion=deleteTraining&id=<?= $training->getId() ?>" class="link__btn-delete">×</a></button>
                                    <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editModal-<?= $training->getId() ?>">✎</button>
                                    <img src=<?= $training->getTrainingPhoto() ?> alt="Imagen de pesas" class="img__allTraining">
                                    <div class="card-content__allTraining">
                                        <h2 class="title__allTraining"><?= $training->getName() ?></h2>
                                        <p class="text__allTraining"><?= $training->getDescription() ?></p>
                                        <p class="text__allTraining">Dificultad: <?= $training->getDifficultyLevel() ?></p>
                                        <p class="text__allTraining">Tiempo: <?= $training->getDuration() ?></p>
                                        <a href="index.php?accion=inicioSession&id=<?= $training->getId() ?>" class="link__allTraining">MOSTRAR EJERCICIOS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editModal-<?= $training->getId() ?>" tabindex="-1" aria-labelledby="editModalLabel-<?= $training->getId() ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel-<?= $training->getId() ?>">Editar Entrenamiento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="index.php?accion=editTraining&id=<?= $training->getId() ?>" method="POST" enctype="multipart/form-data">
                                                <label for="name" class="label__addTraining">Nombre de la Rutina</label><br>
                                                <input type="text" name="name" class="input__addTraining" value="<?= $training->getName() ?>"><br>
                                                <label for="duration" class="label__addTraining">Duración de la Rutina</label><br>
                                                <input type="text" name="duration" class="input__addTraining" value="<?= $training->getDuration() ?>"><br>
                                                <label for="difficultyLevel">Nivel de Dificultad</label><br>
                                                <select name="difficultyLevel" class="input__addTraining">
                                                    <option value="PRINCIPIANTE" <?= $training->getDifficultyLevel() == 'PRINCIPIANTE' ? 'selected' : '' ?>>PRINCIPIANTE</option>
                                                    <option value="INTERMEDIO" <?= $training->getDifficultyLevel() == 'INTERMEDIO' ? 'selected' : '' ?>>INTERMEDIO</option>
                                                    <option value="AVANZADO" <?= $training->getDifficultyLevel() == 'AVANZADO' ? 'selected' : '' ?>>AVANZADO</option>
                                                    <option value="EXPERTO" <?= $training->getDifficultyLevel() == 'EXPERTO' ? 'selected' : '' ?>>EXPERTO</option>
                                                </select><br>
                                                <label for="category">Categoría</label><br>
                                                <select name="category" class="input__addTraining">
                                                    <option value="FUERZA" <?= $training->getCategory() == 'FUERZA' ? 'selected' : '' ?>>FUERZA</option>
                                                    <option value="CARDIO" <?= $training->getCategory() == 'CARDIO' ? 'selected' : '' ?>>CARDIO</option>
                                                    <option value="HIIT" <?= $training->getCategory() == 'HIIT' ? 'selected' : '' ?>>HIIT</option>
                                                    <option value="ESTIRAMIENTOS" <?= $training->getCategory() == 'ESTIRAMIENTOS' ? 'selected' : '' ?>>ESTIRAMIENTOS</option>
                                                    <option value="YOGA" <?= $training->getCategory() == 'YOGA' ? 'selected' : '' ?>>YOGA</option>
                                                </select><br>
                                                <textarea name="description" class="textarea__addTraining" placeholder="Descripción de la rutina"><?= $training->getDescription() ?></textarea> <br>
                                                <input type="submit" value="GUARDAR" class="btn btn-success">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
                <section class="section__add">
                    <!-- Sección para añadir una nueva rutina a mi página web -->
                    <!-- Button trigger modal -->
                    <button type="button" class="button__addTraining" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        AÑADIR NUEVA RUTINA DE ENTRENAMIENTO
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
                                    <form action="index.php?accion=registerTraining" method="POST" class="form__addTraining" enctype="multipart/form-data">
                                        <label for="name" class="label__addTraining">NOMBRE DE LA RUTINA</label>
                                        <input type="text" name="name" class="input__addTraining">

                                        <label for="duration" class="label__addTraining">DURACIÓN DE LA RUTINA</label>
                                        <input type="text" name="duration" class="input__addTraining">

                                        <label for="difficultyLevel" class="label__addTraining">NIVEL DE DIFICULTAD</label>
                                        <select name="difficultyLevel" class="select__addTraining">
                                            <option value="PRINCIPIANTE">PRINCIPIANTE</option>
                                            <option value="INTERMEDIO">INTERMEDIO</option>
                                            <option value="AVANZADO">AVANZADO</option>
                                            <option value="EXPERTO">EXPERTO</option>
                                        </select>

                                        <label for="category" class="label__addTraining">CATEGORÍA</label>
                                        <select name="category" class="select__addTraining">
                                            <option value="FUERZA">FUERZA</option>
                                            <option value="CARDIO">CARDIO</option>
                                            <option value="HIIT">HIIT</option>
                                            <option value="ESTIRAMIENTOS">ESTIRAMIENTOS</option>
                                            <option value="YOGA">YOGA</option>
                                        </select>

                                        <label for="trainingPhoto" class="label__addTraining">PRESENTACIÓN</label>
                                        <input type="file" name="trainingPhoto[]" multiple class="input__addTraining">

                                        <label for="description" class="label__addTraining">DESCRIPCIÓN</label>
                                        <textarea name="description" class="textarea__addTraining"></textarea>

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
                <h1 class="main__title border-bottom">RUTINAS DE ENTRENAMIENTO</h1>
                <section class="section__allTrainings">
                    <!-- Aquí se mostrarán todos los entrenamientos donde se puedan editar borrar -->
                    <div class="row">
                        <?php foreach ($trainings as $training) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12" style="margin: 10px auto;">
                                <div class="card__allTraining">
                                    <img src=<?= $training->getTrainingPhoto() ?> alt="Imagen de pesas" class="img__allTraining">
                                    <div class="card-content__allTraining">
                                        <h2 class="title__allTraining"><?= $training->getName() ?></h2>
                                        <p class="text__allTraining"><?= $training->getDescription() ?></p>
                                        <p class="text__allTraining">Dificultad: <?= $training->getDifficultyLevel() ?></p>
                                        <p class="text__allTraining">Tiempo: <?= $training->getDuration() ?></p>
                                        <a href="index.php?accion=inicioSession&id=<?= $training->getId() ?>" class="link__allTraining">MOSTRAR EJERCICIOS</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="web/js/swiper.js"></script>
    <script src="web/js/chat.js"></script>
</body>

</html>