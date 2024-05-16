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
        <section class="section__video">
            <video src="web/video/intro.mp4" muted autoplay playsinline loop class="video"></video>
            <div class="button-container">
                <button class="play-button"><a href="index.php?accion=register" class="link__video">COMIENZA HOY</a></button>
            </div>
        </section>
        <h1 class="main__title mt-5 border-bottom">BIENVENIDO A HEALTHMASTERY</h1>
        <section class="section__description">
            <div class="description">
                <h3 class="description__title">MUCHO MÁS QUE UNA WEB DE ENTRENAMIENTO Y ALIMENTACIÓN SALUDABLE</h3>
                <p class="description__text">HealthMastery es una plataforma digital diseñada para ser el destino definitivo para todos aquellos que buscan mejorar su bienestar físico y mental. Orientada a entrenamientos, dietas, salud y fitness, HealthMastery se destaca por ofrecer 
                    un enfoque holístico y personalizado, adaptado a las necesidades y objetivos individuales de cada usuario.</p>
            </div>
            <div class="descripction__image">
                <img src="web/images/foto1.webp" alt="" class="img__description">
            </div>
        </section>
        <section class="section__tarifas">
            <div class="container text-center d-flex justify-content-around">
                <div class="row">
                    <div class="col-6">
                        <div class="card" style="width: 25rem; background-color: #131518;">
                            <div class="card-text d-flex justify-content-around border-bottom">
                                <h5 class="mt-2">PAGO ANUAL</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-tittle">PRUEBA 5 DÍAS GRATIS</h5>
                                <h5 class="card-price"><span class="price">200€</span> 70€/AÑO</h5>
                                <p class="card-text">130€ descuento</p>
                                <button class="button__login"><a href="#" class="link__login">Comienza</a></button>
                            </div>
                            <div class="card-footer">
                                <p class="card-info">Rutinas de entrenamiento adaptadas a cada persona.</p>
                                <p class="card-info">Todo la información necesaria que necesita una persona para poder comenzar su cambio físico.</p>
                                <p class="card-info">Ejercicios explicados por profesionales dentro de su campo.</p>
                                <p class="card-info">Pautas de alimentación con menús saludables, para que sepas lo que tienes que comer cada día.</p>
                                <p class="card-info">Acceso a toda la web para poder disfrutar de entrenamientos y dietas saludables.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card" style="width: 25rem; background-color: #131518;">
                            <div class="card-text d-flex justify-content-around border-bottom">
                                <h5 class="mt-2">PAGO MENSUAL</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-tittle">PRUEBA 5 DÍAS GRATIS</h5>
                                <p class="card-text">después</p>
                                <h5 class="card-price">17€/MES</h5>
                                <button class="button__login"><a href="#" class="link__login">Comienza</a></button>
                            </div>
                            <div class="card-footer">
                                <p class="card-info">Rutinas de entrenamiento adaptadas a cada persona.</p>
                                <p class="card-info">Todo la información necesaria que necesita una persona para poder comenzar su cambio físico.</p>
                                <p class="card-info">Ejercicios explicados por profesionales dentro de su campo.</p>
                                <p class="card-info">Pautas de alimentación con menús saludables, para que sepas lo que tienes que comer cada día.</p>
                                <p class="card-info">Acceso a toda la web para poder disfrutar de entrenamientos y dietas saludables.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <section class="section__info">
            <div class="section__accordion">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" id="accordOne">
                                Entrenamiento
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Alimentación Saludable
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Recetas
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </main>
    <footer class="bg-dark text-white py-4 mt-auto border-top">
        <div class="container">
            <div class="row">
                <!-- Navigation Links -->
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
                <!-- Social Media Links -->
                <div class="col-md-4 mb-3">
                    <h5>Síguenos</h5>
                    <ul class="list-unstyled d-flex">
                        <li><a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <!-- Contact Info -->
                <div class="col-md-4 mb-3">
                    <h5>Contacto</h5>
                    <p class="mb-1"><i class="fas fa-envelope me-2"></i>info@healthmastery.com</p>
                    <p class="mb-1"><i class="fas fa-phone me-2"></i>+34 123 456 789</p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt me-2"></i>Calle Ejemplo, 123, Madrid, España</p>
                </div>
            </div>
            <!-- Copyright -->
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
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- <script type="module" src="web/js/swiper.js"></script> -->
<script src="web/js/js.js"></script>
</body>

</html>