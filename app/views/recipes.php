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
        <section class="section__imageSession">
            <div id="receta1" class="sectionCard">
                <div class="contentCard">
                    <h1>RECETAS</h1>
                </div>
                <div class="overlay"></div>
            </div>
            <div id="receta2" class="sectionCard">
                <div class="contentCard">
                    <h1>SALUDABLES</h1>
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
            <?php if ($_SESSION['rol'] === 'ADMIN') : ?>
                <!-- Listado de recetas -->
                <section class="section__recipeList py-5">
                    <div class="container">
                        <h2 class="main__title border-bottom">TODAS LAS RECETAS</h2>
                        <div class="row">
                            <?php foreach ($recipes as $recipe) : ?>
                                <div class="recipe-card mt-4">
                                    <div class="recipe-card__img">
                                        <img src="<?= $recipe->getRecipePhoto() ?>" alt="Imagen de la receta" class="recipe-card__image">
                                    </div>
                                    <div class="recipe-card__content">
                                        <h3 class="recipe-card__title"><?= $recipe->getTitle() ?></h3>
                                        <p class="recipe-card__description"><?= $recipe->getDescription() ?></p>
                                        <ul class="recipe-card__details">
                                            <li class="recipe__items"><strong>Tiempo de preparación:</strong> <?= $recipe->getPrepTime() ?></li>
                                            <li class="recipe__items"><strong>Tiempo de cocinar:</strong> <?= $recipe->getCookTime() ?></li>
                                            <li class="recipe__items"><strong>Dificultad:</strong> <?= $recipe->getDifficulty() ?></li>
                                        </ul>
                                        <button class="recipe-card__button">Ver más</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if ($_SESSION['rol'] === 'CLIENTE') : ?>
                <!-- Listado de recetas -->
                <section class="section__recipeList py-5">
                    <div class="container">
                        <h2 class="main__title border-bottom">TODAS TUS PUBLICACIONES</h2>
                        <div class="row">
                            <?php foreach ($recipes as $recipe) : ?>
                                <?php
                                $recipeFavouriteDAO = new RecipeFavouriteDAO($conn);
                                $idRecipe = $recipe->getId();
                                if ($_SESSION['idUser']) {
                                    $idUser = $_SESSION['idUser'];
                                    $existsFavourite = $recipeFavouriteDAO->existByIdUserIdRecipe($idUser, $idRecipe);
                                }
                                ?>
                                <div class="recipe-card mt-4">
                                    <div class="recipe-card__img">
                                        <img src="<?= $recipe->getRecipePhoto() ?>" alt="Imagen de la receta" class="recipe-card__image">
                                    </div>
                                    <div class="recipe-card__content">
                                        <h3 class="recipe-card__title"><?= $recipe->getTitle() ?></h3>
                                        <p class="recipe-card__description"><?= $recipe->getDescription() ?></p>
                                        <ul class="recipe-card__details">
                                            <li class="recipe__items"><strong>Tiempo de preparación:</strong> <?= $recipe->getPrepTime() ?></li>
                                            <li class="recipe__items"><strong>Tiempo de cocinar:</strong> <?= $recipe->getCookTime() ?></li>
                                            <li class="recipe__items"><strong>Dificultad:</strong> <?= $recipe->getDifficulty() ?></li>
                                        </ul>
                                        <button class="recipe-card__button">Ver más</button>
                                    </div>
                                    <div class="recipe-card__like">
                                        <?php if ($recipe->isCreatedByUser($_SESSION['idUser'])) : ?>
                                            <a href="index.php?accion=deleteRecipe&id=<?= $recipe->getId() ?>"><i class="fa-regular fa-circle-xmark deleteIcon"></i></a>
                                        <?php else : ?>
                                            <?php if ($existsFavourite) : ?>
                                                <i class="fa-solid fa-heart iconoRecipeFavoritoOn" data-idRecipe="<?= $recipe->getId() ?>"></i>
                                            <?php else : ?>
                                                <i class="fa-regular fa-heart iconoRecipeFavoritoOff" data-idRecipe="<?= $recipe->getId() ?>"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
                <!-- Botón para mostrar formulario de envío de recetas -->
                <div class="text-center my-4">
                    <button id="showRecipeFormBtn" class="button__addTraining"><i class="fas fa-plus"></i> Añadir Receta</button>
                </div>
                <!-- Formulario de envío de recetas -->
                <section id="recipeFormSection" class="section__recipeForm d-none">
                    <div class="container">
                        <h2 class="main__title border-bottom">Comparte tu receta</h2>
                        <form action="index.php?accion=insertRecipe" method="POST" enctype="multipart/form-data" id="recipeForm">
                            <div class="mb-3">
                                <label for="recipeName" class="label__diet">Nombre de la receta</label>
                                <input type="text" class="input__diet" name="title" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="label__diet">Descripción</label>
                                <textarea class="input__diet" name="description" rows="3" id="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="ingredients" class="label__diet">Ingredientes</label>
                                <textarea class="input__diet" name="ingredients" rows="3" id="ingredients" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="prepTime" class="label__diet">Tiempo de preparación</label>
                                <input type="text" class="input__diet" name="prepTime" id="prepTime" required>
                            </div>
                            <div class="mb-3">
                                <label for="cookTime" class="label__diet">Tiempo de cocinar</label>
                                <input type="text" class="input__diet" name="cookTime" id="cookTime" required>
                            </div>
                            <div class="mb-3">
                                <label for="difficulty" class="label__diet">Dificultad de la realización</label>
                                <select name="difficulty" id="difficulty" class="input__diet">
                                    <option value="facil" disabled selected>Dificultad</option>
                                    <option value="facil">Fácil</option>
                                    <option value="intermedio">Intermedio</option>
                                    <option value="avanzado">Avanzado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipePhoto" class="form-label">Imagen de la receta</label>
                                <input type="file" class="input__diet" name="recipePhoto[]" id="repicePhoto" accept="image/*" required>
                            </div>
                            <div class="text-center m-5">
                                <button type="submit" class="button__addTraining" id="buttonAddRecipe">Enviar receta</button>
                            </div>
                        </form>
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
    <script src="web/js/recipe.js"></script>
    <script src="web/js/favourite.js"></script>
</body>

</html>