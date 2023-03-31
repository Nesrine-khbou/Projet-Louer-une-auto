<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.min.css">


    <link rel="stylesheet" href="shared.css">
    <link rel="stylesheet" href="styles.css">
    <script src="bootstrap.min.js"></script>
    <title>Louer Une Auto</title>
</head>
<body>
    <!-- <header>
        <div id="page-title">
            <a href="index.html">Louer Une Auto</a>
        </div>
        <div id="options">
            <ul>
                <li>
                    <a id="acceuil" href="index.php">
                        <p>Acceuil</p>
                    </a>
                </li>

                <li>
                    <a href="formulaire_voiture.php">
                        <p>Gestion Voitures</p>
                    </a>
                </li>
                
                <li>
                    <a href="tutorials.html">
                        <p>Gestion Clients</p>
                    </a>
                </li>
                <li>
                    <a href="quizzes.html">
                        <p>Gestions Locations</p>
                    </a>
                </li>
            </ul>
        </div>

    </header> -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Louer Une Auto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
                    </li>
                    

                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gestion Voitures
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="affichageVoitures.php">Afficher voitures </a></li>
                        <li><a class="dropdown-item" href="formulaire_voiture.php">Inserer voiture</a></li>
                        <li><a class="dropdown-item" href="formulaire_modifier_voiture.php">Modifier Voiture</a></li>
                        <li><a class="dropdown-item" href="formulaire_supprimer_voiture.php">Supprimer voiture</a></li>

                    </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion clients
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="affichageClient.php">Afficher clients </a></li>
                            <li><a class="dropdown-item" href="formulaire_client.php">Inserer client</a></li>
                            <li><a class="dropdown-item" href="formulaire_modifier_client.php">Modifier clients</a></li>
                            <li><a class="dropdown-item" href="formulaire_supprimer_client.php">Supprimer client</a></li>

                        </ul>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestion Locations
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Afficher Locations </a></li>
                            <li><a class="dropdown-item" href="#">Inserer Location</a></li>
                            <li><a class="dropdown-item" href="#">Modifier Locations</a></li>
                            <li><a class="dropdown-item" href="#">Supprimer Location</a></li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="hero-section">
            <div id="bg-pic"></div>
            </div>
        </section>

<!--         <section id="services">
            <h2>What We provide ?</h2>
            <hr>
            <ul>
                <li class="service">
                    <div class="title">
                        <img src="/photos/icons/courses-green.PNG" alt="courses"> 
                        <p>Courses</p>
                    </div>
                    <div class="details">
                        <p>We provide online complete courses in many differents programming languages and technologies such as HTML , CSS , PHP , JAVASCRIPT , Laravel , Symfony , Nodejs , Reactjs and more ...</p>
                    </div>
                </li>

                <li class="service">
                    <div class="title">
                        <img src="/photos/icons/tutos-green.PNG" alt="tutorials"> 
                        <p>Tutotials</p>
                    </div>
                    <div class="details">
                        <p> We provide online sessions and workshops about how to do specific thing in development processus ...</p>
                    </div>
                </li>
                
                <li class="service">
                    <div class="title">
                        <img src="/photos/icons/tests-green.PNG" alt="tests"> 
                        <p>Tests</p>
                    </div>
                    <div class="details">
                        <p> We offer you a wide range of placement tests that help you choose the right courses and lessons for your abilities.</p>
                    </div>
                </li>
                
                <li class="service">
                    <div class="title">
                        <img src="/photos/icons/forum-green.PNG" alt="Forum"> 
                        <p>Forum</p>
                    </div>
                    <div class="details">
                        <p> A forum where you can ask your questions or software problems and share them with experts in the field.</p>
                    </div>
                </li>
            </ul>
        </section> -->
    </main>
<!-- 
    <footer>
        <img src="/photos/icons/logo-black.PNG" alt="logo-black">
        <h3>Hamdaoui Academy</h3>
        <p>Tunisian E-learning plateform that provide free and paid Web development courses and tutorials in arabic language.</p>
        <ul id="social-media">
            <li>
                <a href="https://www.facebook.com/">
                    <img src="/photos/icons/facebook.PNG" alt="facebook_icon">
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/">
                    <img src="/photos/icons/youtube.PNG" alt="youtube_icon">
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/">
                    <img src="/photos/icons/instagram.PNG" alt="instagram_icon">
                </a>
            </li>
        </ul>
        <ul class="more-info">
            <li> <a href="">Contact Us</a></li>
            <li> <a href="">Terms</a></li>
            <li> <a href="">Sitemap</a></li>
            <li> <a href="">Blog</a></li>
            <li> <a href="">About Us</a></li>
            <li> <a href="">Privacy Policy</a></li>
            <li> <a href="">Help and Support</a></li>
            <li> <a href="">Tests</a></li>
        </ul>
        <p id="rights">All rights reserved for HamdaouiAcademy.com © 2022</p>
    </footer>    --> 
</body>
</html>