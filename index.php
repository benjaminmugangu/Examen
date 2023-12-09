<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lg-transitions.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <header class="header">
        
        <a href="#" class="logo"><img src="photos/logo ami JC_Plan de travail 22222.png" style="height: 50px; width: 50px;" alt=""><span></span></a>
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#about">about</a>
            <a href="#services">services</a>
            <a href="#projects">project</a>
            <a href="#pricing">pricing</a>
            <a href="#contact">contact</a>
            <a href="#blogs">blogs</a>
            
        </nav>
        <div class="icons">
            <div id="info-btn" class="fas fa-info-circle"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="side-btn" class="fas fa-add"></div>
        </div>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="" class="login-form" method="POST">
            <h3>login form</h3>
            <input type="email" name="username" class="box" placeholder="entrer votre email">
            <input type="password" name="password" placeholder="entrer votre mot de passe" class="box">
           
            <input type="submit" class="btn" value="login now" name="submit_login">
            <p>vous n'avez pas encore de compte <a href="#">Create a compte</a></p>
            <?php
        // Afficher les messages d'erreur s'il y en a
                if (!empty($error_message)) {
                    echo '<p style="color: red;">' . $error_message . '</p>';
                }
                ?>
        </form>

        <?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "compact_tech";

    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }
    // Vérifier si l'utilisateur est déjà connecté
    session_start();
    if (isset($_SESSION['user_id'])) {
        // Redirection vers la page d'accueil si déjà connecté
        header("Location: index2.php");
        exit();
    }

    // Logique de connexion
    if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['submit_login'])) {
       

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $sql = "SELECT id, username, password FROM utilisateurs WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($user_id, $user_username, $hashed_password);

            if ($stmt->fetch() && password_verify($password, $hashed_password)) {
                // Connexion réussie, enregistrement de l'ID de l'utilisateur en session
                $_SESSION['user_id'] = $user_id;
                header("Location: index2.php");
                exit();
            } else {
                echo '<p style="color: red;">Nom d\'utilisateur ou mot de passe incorrect. Veuillez réessayer.</p>';
            }

            $stmt->close();
        } else {
            echo '<p style="color: red;">Erreur de connexion. Veuillez réessayer.</p>';
        }

        $conn->close();
    }
    ?>

    


    </header>

    
<!-- bar de navigation gauche -->

    <div class="side-info">

        <div id="close-side-info" class="fas fa-times"></div>
        <ul class="menu">
            
            <p id="temo">Ajouter un temoignage</p>
            
        </ul>
       
    </div>

<!-- bar de navigation gauche -->


<!-- formulaire client -->

    <form action="" class="form client-form">
        <h3>client form</h3>
        <input type="email" class="box" placeholder="entrer votre email">
        <input type="password" placeholder="entrer votre mot de passe" class="box">
        <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
            <a href="#">forgot password</a>
        </div>
        <input type="submit" class="btn" value="login now" id="clt">
        
    </form>

<!-- formulaire client -->


<!-- formulaire entreprise -->

    <form action="" class="form entreprise-form">
        <h3>entreprise form</h3>
        <input type="email" class="box" placeholder="entrer votre email">
        <input type="password" placeholder="entrer votre mot de passe" class="box">
        <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
            <a href="#">forgot password</a>
        </div>
        <input type="submit" class="btn" value="login now" id="clt1">
        
    </form>

<!-- formulaire entreprise -->



<!-- formulaire employer -->

    <form action="" class="form employer-form">
        <h3>employer form</h3>
        <input type="email" class="box" placeholder="entrer votre email">
        <input type="password" placeholder="entrer votre mot de passe" class="box">
        <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
            <a href="#">forgot password</a>
        </div>
        <input type="submit" class="btn" value="login now" id="clt2">
        
    </form>

<!-- formulaire empoyer -->



<!-- formulaire projet -->

    <form action="" class="form projet-form">
        <h3>projet form</h3>
        <input type="email" class="box" placeholder="entrer votre email">
        <input type="password" placeholder="entrer votre mot de passe" class="box">
        <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
            <a href="#">forgot password</a>
        </div>
        <input type="submit" class="btn" value="login now" id="clt3">
        
    </form>

<!-- formulaire projet -->



<!-- formulaire service -->

    <form action="" class="form service-form">
        <h3>Service form</h3>
        <input type="email" class="box" placeholder="entrer votre email">
        <input type="password" placeholder="entrer votre mot de passe" class="box">
        <div class="flex">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me"> remember me</label>
            <a href="#">forgot password</a>
        </div>
        <input type="submit" class="btn" value="login now" id="clt4">
        
    </form>

<!-- formulaire service -->




<!-- formulaire temoignage -->

    <form action="" class="form temoignage-form" method="POST">
        <h3>ajouter un temoignage</h3>
        
        <input type="tex" class="box" name="title" placeholder="entrer votre nom & post-nom">
        
        <textarea cols="10" rows="5" name="description" placeholder="entrer votre temoignage" class="box"></textarea>
        
        <input type="submit" class="btn" value="temoigner" id="clt5" name="submit_temoi">
        
    </form>

    <?php

        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "compact_tech";

        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_temoi'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
         

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO temoignage (title, description) VALUES (?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("ss", $title, $description);

                    // Exécution de la requête
                    if ($stmt->execute()) {
                        echo '<p style="color: green;">Élément ajouté avec succès!</p>';
                    } else {
                        echo '<p style="color: red;">Erreur lors de l\'ajout de l\'élément. Veuillez réessayer.</p>';
                    }

                    // Fermer la déclaration
                    $stmt->close();
                } else {
                    echo '<p style="color: red;">Erreur lors de la préparation de la requête. Veuillez réessayer.</p>';
                }
            

            // Fermer la connexion à la base de données
            $conn->close();
        }
        
    ?>


<!-- formulaire temoignage -->



    <div class="contact-info">

        <div id="close-contact-info" class="fas fa-times"></div>

        <div class="info">
            <i class="fas fa-phone"></i>
            <h3>numero de telephone</h3>
            <p>+243-97-5613-56</p>
            <p>+243-84-761-56</p>
        </div>

        <div class="info">
            <i class="fas fa-envellope"></i>
            <h3>adresse mail</h3>
            <p>compactech@gmail.com</p>
        </div>

        <div class="info">
            <i class="fas fa-map-marker-alt"></i>
            <h3>adresse physique</h3>
            <p>nord-kivu, goma, av: n°:</p>
        </div>

        <div class="share">
            <a href="#" class="fas fa-facebook-f"></a>
            <a href="#" class="fas fa-twitter"></a>
            <a href="#" class="fas fa-instagram"></a>
            <a href="#" class="fas fa-linkedin"></a>
        </div>
    </div>

    <section class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper w">
                <section class="swiper-slide slide" style="background: url('photos/IMG_20231018_204817_749.jpg') no-repeat;">
                    <div class="content">
                        <h3>Compact-Tech</h3>
                        <p>Bienvenue sur notre site de travaux de construction, Venez decouvrir 
                            notre expertise et nos services pour en savoir plus</p>
                         <a href="#about" class="btn">get started</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url(photos/IMG_20231018_204817_749.jpg) no-repeat;">
                    <div class="content">
                        <h3>Construction des structures</h3>
                        <p>Nous realisons vos projets de construction (Villas et appartements), dès la conception
                             à la livraison,Nous vous apportons notre expertise etnotre savoir-faire en vous accompagnant
                              sur l'enssemble des étapes de la réalisation de vos travaux</p>
                         <a href="#about" class="btn">get started</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url('photos/IMG_20231018_204818_161.jpg') no-repeat;">
                    <div class="content">
                        <h3>Collaborations</h3>
                        <p>Nous travaillons avec des architectes et les designers pour realiser des projets
                             uniques et personnalisés pour nos clients.</p>
                         <a href="#about" class="btn">get started</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url('photos/IMG_20231018_204818_161.jpg') no-repeat;">
                    <div class="content">
                        <h3>Construction ecologique</h3>
                        <p>Nous sommes engages dans la construction ecologique et 
                            nous utilisons des materiaux et des pratiques durables pour reduire l'impact environmental.</p>
                         <a href="#about" class="btn">get started</a>
                    </div>
                </section>

                <section class="swiper-slide slide" style="background: url('photos/IMG_20231018_204818_161.jpg') no-repeat;">
                    <div class="content">
                        <h3>Notre equipe</h3>
                        <p>Nous avons une equipe de professionnels experimentés et qualifiés
                             pour assurer la reussite de vos projets de construction</p>
                         <a href="#about" class="btn">get started</a>
                    </div>
                </section>

                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- about section -->
    <section class="about" id="about">
        <h1 class="heading">about us</h1>

        <div class="row">
            <div class="video">
                <video src="photos/Vid 20231022 021104 30.Mp4.mkv" loop muted autoplay></video>
            </div>
            <div class="content">
                <h3>Le saviez-vous ?</h3>
                <p>Nous sommes une entreprise dediée à offrir des solutions innovantes pour repondre 
                    aux besoins de nos clients, Nous sommes passionés par notre travail et nous sommes fier de fournir
                     des produits et services de haute qualite, Notre equipe est composee de professionnels
                     talentieux et experimentés qui travaillent ensemble pour offrir des solutions personnalisées à nos clients.
                </p>
                <a href="#services" class="btn">read more</a>
            
            </div>
        </div>

        <div class="box-container">
            <div class="box">
                <h3>2+</h3>
                <p>Ans d'experience</p>
            </div>

            <div class="box">
                <h3>50+</h3>
                <p>Project terminer</p>
            </div>

            <div class="box">
                <h3>20+</h3>
                <p>Client satisfait</p>
            </div>

            <!-- <div class="box">
                <h3>450+</h3>
                <p>active workers</p>
            </div> -->
        </div>

    </section>
    <!-- about section -->

    <!-- services section starts -->

    <section class="services" id="services">
        <h1 class="heading">our service</h1>

        <div class="box-container">
            <div class="box">
                <img src="photos/architecture-architectural-designer-architectural-drawing-drafter-construction-planning-0261a7e550be104ff0e082401d62229d.png" alt="">
                <h3>Conception et planification</h3>
                <p>Nous offrons des services de conception et de planification pour aider nos clients
                     a elaborer des plans detailles pour leur projet de construction, 
                    en prenant en compte les aspects techniques, budgetaires et esthetiques</p>
            </div>

            <div class="box">
                <img src="photos/carriage-house-custom-homes-interiors-building-architectural-engineering-building-2ef02d17a206210758d815f7d84418a3.png" alt="">
                <h3>Construction diverse de génie civil</h3>
                <p>Nous construisons des ponts, des routes ainsi que des batiments residentiels,
                     commerciaux ou industriels, en utilisant les dernieres techniques et technologies
                      de construction pour assurer le confort architecturale, la durabilite structurale et la securite 
                    des usagers.Compact-tech pour des travaux compacts!</p>
            </div>

            <div class="box">
                <img src="photos/architecture-royalty-free-euclidean-vector-creative-city-building-perspective-lines-a6cc269b156a8e4a50e04ba4f64ac43a.png" alt="">
                <h3>Réhabilitation et rénovation</h3>
                <p>Nous offrons des services de rehabilitation et de rénovation pour une mise à jour et la restaurauration de batiments anciens, en modernisant les installations pour repondre aux normes à jour tout en le confrontant aux desirs de nos clients.</p>
            </div>

            <div class="box">
                <img src="photos/architectural-engineering-civil-engineering-general-contractor-construction-management-construction-7af0df71926a86da3995f1d071736adb.png" alt="">
                <h3>Travaux de terrassement</h3>
                <p>Nous offrons des services en travaux de Cantonnage, de nivellement des terrains, de dressage des systemes de drainage pour garantir la solidite et la stabilite des batiments</p>
            </div>

            <div class="box">
                <img src="photos/building-stock-photography-royalty-free-clip-art-safe-construction-villain-77c6570b21e3487140c2d2b06b92d9b1.png" alt="">
                <h3>Travaux de maconnerie</h3>
                <p>Nous offrons des services de maconnerie des murs de soutènement, de tout type de fondation des batiments, en utilisant des materiaux de qualite superieure et en respectant les normes de construction en vigueur se basant aux exigences du terrain après des études approfondies.</p>
            </div>

            <!-- <div class="box">
                <img src="photos/architectural-engineering-building-construction-worker-silhouette-fig-creative-work-of-the-human-brain-02603baa9943d04feab127043236826e.png" alt="">
                <h3>interior design</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur, iusto!</p>
            </div> -->

            <div class="box">
                <img src="file:///C:/Users/user/Downloads/R%20(1).jpg" alt="file:///C:/Users/user/Downloads/R%20(1).jpg">
                <h3>Electricite et plomberie</h3>
                <p>Nous offrons des services d'installation electrique et de plomberie pour garantir aux ouvrages leurs equipements de systemes electriques et de plomberie surs, fiables et efficaces.</p>
            </div>

            <!-- <div class="box">
                <img src="photos/architectural-engineering-civil-engineering-general-contractor-construction-management-construction-7af0df71926a86da3995f1d071736adb.png" alt="">
                <h3>building renovation</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur, iusto!</p>
            </div> -->
        </div>

    </section>

    <!-- services section end -->

    <!-- proget section start -->



        
    
    <section id="slider" class="pt-5">

        <nav class="nav">
          
            <p id="cons">construcion</p>
            <p id="elec">plomberie</p>
            <p id="plomb">électricité</p>
            <p id="reab">terrassement</p>
            <p id="amenag">amenagement</p>
        
        </nav>

        <div class="container">
            <h1 class="heading">our progect</h1>
            <h1 class="text-center"><b></h1>
            <div class="slider ar1">
                <div class="owl-carousel">
                    <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description, image_path FROM construction";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="slider-card">';
                                echo '<div class="d-flex justify-content-center align-items-center mb-4">';
                                echo '<img src="' . $row['image_path'] . '" alt="material" loading="lazy" class="w-100">';
                                echo '</div>';
                                echo '<h5 class="mb-0 text-center"> <b>' . $row['title'] . '</b></h5>';
                                echo '<p class="text-center p-4">' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>
                </div>
            </div>


            <div class="slider ar2">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description, image_path FROM electricite";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="slider-card">';
                                echo '<div class="d-flex justify-content-center align-items-center mb-4">';
                                echo '<img src="' . $row['image_path'] . '" alt="material" loading="lazy" class="w-100">';
                                echo '</div>';
                                echo '<h5 class="mb-0 text-center"> <b>' . $row['title'] . '</b></h5>';
                                echo '<p class="text-center p-4">' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>
                </div>
            </div>

            <div class="slider ar3">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description, image_path FROM plomberie";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="slider-card">';
                                echo '<div class="d-flex justify-content-center align-items-center mb-4">';
                                echo '<img src="' . $row['image_path'] . '" alt="material" loading="lazy" class="w-100">';
                                echo '</div>';
                                echo '<h5 class="mb-0 text-center"> <b>' . $row['title'] . '</b></h5>';
                                echo '<p class="text-center p-4">' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>

                </div>
            </div>

            <div class="slider ar4">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description, image_path FROM terassement";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="slider-card">';
                                echo '<div class="d-flex justify-content-center align-items-center mb-4">';
                                echo '<img src="' . $row['image_path'] . '" alt="material" loading="lazy" class="w-100">';
                                echo '</div>';
                                echo '<h5 class="mb-0 text-center"> <b>' . $row['title'] . '</b></h5>';
                                echo '<p class="text-center p-4">' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>
                    
                </div>
            </div>

            <div class="slider ar5">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description, image_path FROM amenagement";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="slider-card">';
                                echo '<div class="d-flex justify-content-center align-items-center mb-4">';
                                echo '<img src="' . $row['image_path'] . '" alt="material" loading="lazy" class="w-100">';
                                echo '</div>';
                                echo '<h5 class="mb-0 text-center"> <b>' . $row['title'] . '</b></h5>';
                                echo '<p class="text-center p-4">' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>


    <section class="section blog" id="blog">
        <div class="container">

          <h2 class="h2 section-title"></h2>
          <h1 class="heading">location materiel</h1>

          <ul class="blog-list has-scrollbar">

                <?php
                    // Logique pour afficher les éléments depuis la base de données
                    $servername = "localhost";
                    $db_username = "root";
                    $db_password = "";
                    $db_name = "compact_tech";

                    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("La connexion à la base de données a échoué : " . $conn->connect_error);
                    } // Inclure le fichier de configuration pour la connexion à la base de données

                    // Récupérer les éléments depuis la base de données
                    $sql = "SELECT title_m, price, image_path_m FROM material";
                    $result = $conn->query($sql);

                    // Afficher les éléments
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li>';
                            echo '<div class="blog-card">';
                            echo '<figure class="card-banner">';
                            echo '<a href="index3.html">';
                            echo '<img src="' . $row['image_path_m'] . '" alt="material" loading="lazy" class="w-100">';
                            echo '</a>';
                            echo '<a href="#" class="btn">plus</a>';
                            echo '</figure>';
                            echo '<div class="card-content">';
                            echo '<h3 class="h3 card-title">' . $row['title_m'] . '</h3>';
                            echo '<a href="#" class="btn">' . $row['price'] .'<span>$</span></a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</li>';
                        }
                    } else {
                        echo '<p>Aucun élément trouvé dans la base de données.</p>';
                    }

                    // Fermer la connexion à la base de données
                    $conn->close();
                ?>


            
            

          </ul>

        </div>
    </section>




    <!-- <section class="projects" id="projects">
        <h1 class="heading"> our projects</h1>

        <div class="box-container">

            <a href="photos/IMG_20231018_204817_749.jpg" class="box">
                <div class="image">
                    <img src="photos/IMG_20231018_204817_749.jpg" alt="">
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Nos oeuvres en cours de construction</h3>
                        <p>construiction d'un batiment </p>
                    </div>
                    <i class="fas fa-plus"></i>
                </div>
                <div class="info">
                    <p>Nous realisons la renovation d'un batiment à 3 niveaux à Goma Q. Carmel,résidense privée du couple de Mr. HABIMANA JONAS(Directeur BIFERD)</p>
                </div>
            </a>

            <a href="photos/IMG_20231018_204817_749.jpg" class="box">
                <div class="image">
                    <img src="photos/IMG_20231018_204817_749.jpg" alt="">
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Renovation d'un batiments</h3>
                        <p>construction, design</p>
                    </div>
                    <i class="fas fa-plus"></i>
                </div>
                <div class="info">
                    <p>Nous installons un systeme de drainage pour un client a Goma, 4 appartements et 2 bureaux au rez-de-chaussee</p>
                </div>
            </a>

            <a href="photos/IMG_20231018_204817_749.jpg" class="box">
                <div class="image">
                    <img src="photos/IMG_20231018_204817_749.jpg" alt="">
                </div>
                
                <div class="content">
                    <div class="info">
                        <h3>Installation de systeme de drainage</h3>
                        <p>construction, design</p>
                    </div>
                    <i class="fas fa-plus"></i>
                </div>

                <div class="info">
                    <p>Actuellement en cours, nous construisons un batiment de 2 niveaux pour un client à Goma au Q.Katoyi résidense privée de Mme BALOLE NDOOLE Grace, une villa 3 niveaux à Goma au Q. Birere résidense privée du couple NOVA(Actuel Directeur CNPR/NK), villa 2 niveaux à Goma Q.CCLK résidense privée KAVONO Samuel</p>
                </div>
            </a>

           
        </div>

    </section> -->

    <!-- proget section end -->


<!--  review section start -->

    <section class="reviews">
        <h1 class="heading">clients reviews</h1>
        <div class="swiper reviews-slider">
            <div class="swiper-wrapper">


            <?php
                        // Logique pour afficher les éléments depuis la base de données
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "compact_tech";

                        $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion à la base de données a échoué : " . $conn->connect_error);
                        } // Inclure le fichier de configuration pour la connexion à la base de données

                        // Récupérer les éléments depuis la base de données
                        $sql = "SELECT title, description FROM temoignage";
                        $result = $conn->query($sql);

                        // Afficher les éléments
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                                echo '<div class="swiper-slide slide">';
                                
                                echo '<p>' . $row['description'] . '</p>';
                                echo '</div>';
                            
                            }
                        } else {
                            echo '<p class="text-center p-4">Aucun élément trouvé dans la base de données.</p>';
                        }

                        // Fermer la connexion à la base de données
                        $conn->close();
                    ?>

                


            </div>
        </div>
    </section>

<!--  review section end -->

<!-- precing sections starts -->

    <section class="pricing" id="pricing">

        <h1 class="heading"> our pricing </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-home"></i>
                <h3>basic plan</h3>
                <div class="price"><span>$</span>450 <span>/mo</span></div>
                <div class="list">
                    <p>interior disign</p>
                    <p>architecture</p>
                    <p>material supply</p>
                    <p>maintenance</p>
                    <p>24h/7 support</p>
                </div>
                <a href="#" class="btn">chosse plan</a>
            </div>

            <div class="box">
                <i class="fas fa-building"></i>
                <h3>premium plan</h3>
                <div class="price"><span>$</span>750 <span>/mo</span></div>
                <div class="list">
                    <p>interior disign</p>
                    <p>architecture</p>
                    <p>material supply</p>
                    <p>maintenance</p>
                    <p>24h/7 support</p>
                </div>
                <a href="#" class="btn">chosse plan</a>
            </div>

            <div class="box">
                <i class="fas fa-city"></i>
                <h3>ultimate plan</h3>
                <div class="price"><span>$</span>1250 <span>/mo</span></div>
                <div class="list">
                    <p>interior disign</p>
                    <p>architecture</p>
                    <p>material supply</p>
                    <p>maintenance</p>
                    <p>24h/7 support</p>
                </div>
                <a href="#" class="btn">chosse plan</a>
            </div>
        </div>
    </section>

<!-- precing sections end -->


<!-- contact section starts -->

    <section class="contact" id="contact">
        <h1 class="heading"> contact us </h1>

        <div class="row">


            <form action="">
                <h3>get in touch</h3>

                <input type="text" placeholder="name" class="box">
                <input type="email" placeholder="email" class="box">
                <input type="number" placeholder="phone" class="box">
                <textarea name="" placeholder="message" class="box" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">
            </form>

        </div>

    </section>

<!-- contact section ends -->



<!-- blog section starts -->

    <section class="blogs" id="blogs">
        <h1 class="heading"> our blogs </h1>

        <div class="swiper blogs-slider">
            <div class="swiper-wrapper">

            <?php
                    // Logique pour afficher les éléments depuis la base de données
                    $servername = "localhost";
                    $db_username = "root";
                    $db_password = "";
                    $db_name = "compact_tech";

                    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("La connexion à la base de données a échoué : " . $conn->connect_error);
                    } // Inclure le fichier de configuration pour la connexion à la base de données

                    // Récupérer les éléments depuis la base de données
                    $sql = "SELECT title, description, image_path FROM elements";
                    $result = $conn->query($sql);

                    // Afficher les éléments
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="swiper-slide slide">';
                            echo '<div class="image">';
                            echo '<img src="' . $row['image_path'] . '" alt="" class="element-image">';
                            echo '</div>';
                            echo '<div class="content">';
                            echo '<h3>' . $row['title'] . '</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<a href="#" class="btn">read more</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Aucun élément trouvé dans la base de données.</p>';
                    }

                    // Fermer la connexion à la base de données
                    $conn->close();
                ?>

                
            </div>
        </div>
    </section>

<!-- blog section starts -->


<!-- flotter section starts -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>compagy</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Les id national</h4>
                    <ul>
                        <li><a href="#">Dénomination sociale: COMPACT-TECH</a></li>
                        <li><a href="#">Numéro Impot: A2210766C</a></li>
                        <li><a href="#">Numéro RCCM: CD/GOM/RCCM/22-B-00029</a></li>
                    </ul>
                </div>


                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">orders status</a></li>
                        <li><a href="#">payments options</a></li>
                    </ul>
                </div>
                <div class="footer-col">

                <!-- <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div> -->

                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><li class="fas fa-facebook-f"></li></a>
                        <a href="#"><li class="fas fa-twitter"></li></a>
                        <a href="#"><li class="fas fa-instagram"></li></a>
                        <a href="#"><li class="fas fa-linkedin-in"></li></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="credit">copyright by <span>compactTech</span></div>
    </footer>

<!-- flotter section ends -->

<!-- flotter2 section starts -->

    <!-- <section class="flooter2">
        <div class="links">
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
            <a href="#" class="btn">home</a>
        </div>

        <div class="credit">copyright by <span>compactTech</span></div>

    </section> -->

<!-- flotter2 section ends -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
	<script src="owl.carousel.min.js"></script>
	<script src="script.js"></script>

    <script>

        //lightGallery(document.querySelector('.projects .box-container'));

    </script>
</body>
</html>