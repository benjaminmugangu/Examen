<?php
    // connection base de donner
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "compact_tech";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        session_start();
        if (!isset($_SESSION['user_id'])) {
            // Redirection vers la page de connexion si non connecté
            header("Location: index.php");
            exit();
        }

        // Logique de déconnexion
        if (isset($_POST['logout'])) {
            // Déconnexion de l'utilisateur
            session_destroy();
            header("Location: index.php");
            exit();
        }
    
?>


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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        
        <a href="#" class="logo">Compact<span>Tech</span></a>
        <nav class="navbar">
            <a href="#Home">Home</a>
            <a href="#About">about</a>
            <a href="#Services">services</a>
            <a href="#Project">project</a>
            <a href="#pricing">pricing</a>
            <a href="#contact">contact</a>
            <a href="#blog">blogs</a>

           
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="submit" name="logout" value="Se déconnecter">
            </form>
            
        </nav>
        <div class="icons">
            <div id="info-btn" class="fas fa-info-circle"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <div id="login-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="side-btn" class="fas fa-bars"></div>
        </div>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="" class="login-form">
            <h3>login form</h3>
            <input type="email" class="box" placeholder="entrer votre email">
            <input type="password" placeholder="entrer votre mot de passe" class="box">
            <div class="flex">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
                <a href="#">forgot password</a>
            </div>
            <input type="submit" class="btn" value="login now">
            <p>vous n'avez pas encore de conte <a href="#">Create a compte</a></p>
        </form>

    </header>


    
<!-- bar de navigation gauche -->

        <!-- css -->

        <style>
        /* Style CSS optionnel pour améliorer l'apparence */
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            margin-right: 10px;
        }

        ul ul {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        li:hover > ul {
            display: block;
        }
    </style>

        <!-- css end -->


    <div class="side-info">

        <div id="close-side-info" class="fas fa-times"></div>
        <div class="profile">
            <?php
                // Afficher le nom de l'utilisateur connecté
                echo '<h2>Bienvenue, ' . $_SESSION['user_id'] . '!</h2>';
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                <input type="submit" name="logout" value="Se déconnecter" style=" color: blue;">
            </form>
        </div>
        <ul class="menu">
        

            <p id="serv">ajouter un service</p>
            <p id="clie">Ajouter un materiel</p>
            <p id="entr">Ajouter une entreprise</p>
            <p id="empl">Ajouter un employer</p>
            <p id="proj">Inscription Employer</p>
            <li id="produits-link">
                <p>Project</p>
                <ul >
                    <li ><p id="construction">construction</p></li>
                    <li ><p id="plomberie">plomberie</p></li>
                    <li ><p id="electricite">electricité</p></li>
                    <li ><p id="terassement">terassement</p></li>
                    <li ><p id="amenagement">amenagement</p></li>
                </ul>
            </li>
            <p id="temo">Ajouter un blog</p>
            
        </ul>
       
    </div>

<!-- bar de navigation gauche -->


<!-- formulaire material -->

    <form action="" class="form client-form" method="post"  enctype="multipart/form-data">
        <h3>Ajouter un materiel</h3>
        <input type="text" id="title" name="title"placeholder="nom du materiel" class="box" required>

        <input type="number" name="description" id="description" class="box" placeholder="prix">

        
        <input type="file" id="image" name="image" accept="image/*" class="box" required>
        
        <input type="submit" class="btn" value="submit" id="clt" name="submit_material">
        
    </form>


    <?php
    // Logique pour ajouter les éléments à la base de données
    if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_material'])) {
   // Inclure le fichier de configuration pour la connexion à la base de données

        // Récupérer les données du formulaire
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);

        // Vérifier si un fichier a été téléchargé
        if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $image_data = file_get_contents($_FILES['image']['tmp_name']);

            // Définir le chemin où l'image sera enregistrée
            $image_path = 'images/' . $_FILES['image']['name'];

            // Déplacer l'image vers le dossier "images"
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

            // Préparer la requête SQL pour l'insertion avec image
            $sql = "INSERT INTO material (title_m, price, image_path_m) VALUES (?, ?, ?)";

            // Utiliser une requête préparée pour éviter les injections SQL
            if ($stmt = $conn->prepare($sql)) {
                // Liaison des paramètres
                $stmt->bind_param("sss", $title, $description, $image_path);

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
        } else {
            echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
        }

        // Fermer la connexion à la base de données
    }
    ?>


   

<!-- formulaire client -->


<!-- formulaire entreprise -->
    <form action="" class="form entreprise-form" method="POST">

        <h3>Ajouter une entreprise</h3>

        <input type="text" name="nom_entreprise" placeholder="entrer votre nom" class="box">
        <input type="email" name="email_entreprise" class="box" placeholder="entrer votre email">
        <textarea name="description_entreprise" id="" cols="30" rows="10" class="box" placeholder="description"></textarea>
        <input type="submit" class="btn" value="submit" id="clt1" name="submit_entreprise">

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_entreprise'])) {
            // Récupérer les données du formulaire
            $nom_entreprise = $_POST['nom_entreprise'];
            $email_entreprise = $_POST['email_entreprise'];
            $description_entreprise = $_POST['description_entreprise'];

            // Supposons que la connexion à la base de données est déjà établie ($conn)

            // Préparer la requête SQL pour insérer les données
            $sql = "INSERT INTO donnees_entreprises (nom, email, description) VALUES ('$nom_entreprise', '$email_entreprise', '$description_entreprise')";
            if ($conn->query($sql) === TRUE) {
                echo "Les données ont été ajoutées avec succès à la base de données.";
            } else {
                echo "Erreur : " . $sql . "<br>" . $conn->error;
            }
        }
    ?>
<!-- formulaire entreprise -->


<!-- formulaire employer -->
    <form action="" method="post" class="form employer-form">

        <h3>Ajouter un(e) nouveaux(lle) employé(e)</h3>
        
        <input type="text" name="nom_employer" class="box" placeholder="nom & post nom de l'employé">
        <input type="text" name="poste" placeholder="poste" class="box">
        <input type="email" name="email_employer" class="box" placeholder="email">
        <input type="number" name="contact_employer" class="box" placeholder="contact">
        <input type="submit" class="btn" value="submit" id="clt2" name="submit_employer">

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_employer'])) {
            // Récupérer les données du formulaire
            $nom_employer = $_POST['nom_employer'];
            $poste = $_POST['poste'];
            $email_employer = $_POST['email_employer'];
            $contact_employer = $_POST['contact_employer'];

            

            // Préparer la requête SQL pour insérer les données
            $sql = "INSERT INTO donnees_employers (nom_postnom, poste, email, contact) VALUES ('$nom_employer', '$poste', '$email_employer', '$contact_employer')";

           
        }
    ?>
<!-- formulaire employer -->



<!-- formulaire projet -->
    <!-- Inscription employer start -->
        
        

        <form action="" class="form projet-form" method="post">
            <h3>Ajouter un nouveaux projet</h3>
            
            <input type="text" id="new_name" name="new_name" class="box" placeholder="nom et postnom de l'employer" required>
            <input type="text" id="new_username" name="new_username" class="box" placeholder="l'email de l'emploxer" required>
            <input type="password" id="new_password" name="new_password" class="box" placeholder="Entrer le mot de passe" required>
            <input type="submit" class="btn" value="submit" id="clt3" name="submit_inscription">
            
        </form>
       

        <?php
            // Inclure le fichier de configuration pour la connexion à la base de données
            

            // Initialiser les variables
            $newUsername = $newPassword = '';
            $error_message = '';

            // Vérifier si le formulaire est soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_inscription'])) {
                // Récupérer les données du formulaire
                $newUsername = htmlspecialchars($_POST['new_username']);
                $newPassword = htmlspecialchars($_POST['new_password']);
                $newName = htmlspecialchars($_POST['new_name']);

                // Vérifier si le nom d'utilisateur existe déjà
                $check_query = "SELECT id FROM utilisateurs WHERE username = ?";
                if ($check_stmt = $conn->prepare($check_query)) {
                    $check_stmt->bind_param("s", $newUsername);
                    $check_stmt->execute();
                    $check_stmt->store_result();

                    if ($check_stmt->num_rows > 0) {
                        // Nom d'utilisateur déjà utilisé, afficher un message d'erreur
                        $error_message = "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
                    } else {
                        // Le nom d'utilisateur est disponible, procéder à l'inscription
                        // Hasher le mot de passe
                        $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

                        // Préparer la requête SQL pour l'insertion
                        $insert_query = "INSERT INTO utilisateurs (username, password, nom) VALUES (?, ?, ?)";

                        // Utiliser une requête préparée pour éviter les injections SQL
                        if ($insert_stmt = $conn->prepare($insert_query)) {
                            // Liaison des paramètres
                            $insert_stmt->bind_param("sss", $newUsername, $hashed_password, $newName);

                            // Exécution de la requête
                            if ($insert_stmt->execute()) {
                                // Redirection ou autre action après l'inscription réussie
                                    // header("Location: index2.php");
                                    // exit();
                                    echo('inscription reussi');
                            } else {
                                // Gérer les erreurs d'insertion
                                $error_message = "Erreur d'inscription. Veuillez réessayer.";
                            }

                            // Fermer la déclaration
                            $insert_stmt->close();
                        } else {
                            // Gérer les erreurs de préparation de la requête
                            $error_message = "Erreur d'inscription. Veuillez réessayer.";
                        }
                    }

                    // Fermer la déclaration de vérification
                    $check_stmt->close();
                } else {
                    // Gérer les erreurs de préparation de la requête de vérification
                    $error_message = "Erreur d'inscription. Veuillez réessayer.";
                }
            }
        ?>

        <?php
            // Afficher les messages d'erreur s'il y en a
            if (!empty($error_message)) {
                echo '<p style="color: red;">' . $error_message . '</p>';
            }
        ?>
        

    <!-- Inscription employer end -->


    <!-- formulaire project construction start -->

    <form action="" class="form construction-form" method="post"  enctype="multipart/form-data">
        <h3>Project construction</h3>
        <input type="text" id="title" name="title" class="box" placeholder="nom du projet" required>
        <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
        <input type="file" id="image" name="image" class="box" accept="image/*" required>
        <input type="submit" class="btn" value="submit" id="" name="submit_construction">


        <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_construction'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO construction (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
        }
    ?>


        
    </form>

    <!-- formulaire project construction end -->


    <!-- formulaire project plomberie start -->

        <form action="" class="form plomberie-form" method="post"  enctype="multipart/form-data">
            <h3>Project plomberie</h3>
            <input type="text" id="title" name="title" class="box" placeholder="nom du projet" required>
            <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
            <input type="file" id="image" name="image" class="box" accept="image/*" required>
            <input type="submit" class="btn" value="submit" id="" name="submit_plomberie">
            
        </form>


        <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_plomberie'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO plomberie (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
        }
    ?>

    <!-- formulaire project plomberie end -->


    <!-- formulaire project electricité start -->

        <form action="" class="form electricite-form" method="post"  enctype="multipart/form-data">
            <h3>Project électriciter</h3>
            <input type="text" id="title" name="title" class="box" placeholder="nom du projet" required>
            <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
            <input type="file" id="image" name="image" class="box" accept="image/*" required>
            <input type="submit" class="btn" value="submit" id="" name="submit_electricite">
            
        </form>


        <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_electricite'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO electricite (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
        }
    ?>


    <!-- formulaire project electricité end -->


    <!-- formulaire project terassement start -->

        <form action="" class="form terassement-form" method="post"  enctype="multipart/form-data">
            <h3>Project terassement</h3>
            <input type="text" id="title" name="title" class="box" placeholder="nom du projet" required>
            <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
            <input type="file" id="image" name="image" class="box" accept="image/*" required>
            <input type="submit" class="btn" value="submit" id="" name="submit_terassement">
            
        </form>


        <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_terassement'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO terassement (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
        }
    ?>


    <!-- formulaire project terassement end -->


    <!-- formulaire project amenagement start -->

        <form action="" class="form amenagement-form" method="post"  enctype="multipart/form-data">
            <h3>Project amenagement</h3>
            <input type="text" id="title" name="title" class="box" placeholder="nom du projet" required>
            <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
            <input type="file" id="image" name="image" class="box" accept="image/*" required>
            <input type="submit" class="btn" value="submit" id="clt5" name="submit_amenagement">
            
        </form>

        <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_amenagement'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO amenagement (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
        }
    ?>

    <!-- formulaire project amenagement end -->


<!-- formulaire projet -->



<!-- formulaire service -->

    <form action="" class="form service-form">
        <h3>Ajouter un nauveaux service</h3>
        <input type="text" class="box" placeholder="nom">
        <input type="text" class="box" placeholder="service">
        <input type="submit" class="btn" value="login now" id="clt4">
        
    </form>

<!-- formulaire service -->




<!-- formulaire blog -->

    <form action="" class="form temoignage-form" method="post"  enctype="multipart/form-data">
        <h3>Ecrire un blog</h3>
        <input type="text" id="title" name="title" class="box" placeholder="titre du blog" required>
        <textarea id="description" name="description" class="box" placeholder="description" required></textarea>
        <input type="file" id="image" name="image" class="box" accept="image/*" required>
        <input type="submit" class="btn" value="submit" id="clt5" name="submit_blog">
        
    </form>


    <?php
        // Logique pour ajouter les éléments à la base de données
        if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit_blog'])) {
        // Inclure le fichier de configuration pour la connexion à la base de données

            // Récupérer les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);

            // Vérifier si un fichier a été téléchargé
            if ($_FILES['image']['error'] == 0 && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $image_data = file_get_contents($_FILES['image']['tmp_name']);

                // Définir le chemin où l'image sera enregistrée
                $image_path = 'images/' . $_FILES['image']['name'];

                // Déplacer l'image vers le dossier "images"
                move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

                // Préparer la requête SQL pour l'insertion avec image
                $sql = "INSERT INTO elements (title, description, image_path) VALUES (?, ?, ?)";

                // Utiliser une requête préparée pour éviter les injections SQL
                if ($stmt = $conn->prepare($sql)) {
                    // Liaison des paramètres
                    $stmt->bind_param("sss", $title, $description, $image_path);

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
            } else {
                echo '<p style="color: red;">Veuillez sélectionner une image.</p>';
            }

            // Fermer la connexion à la base de données
        
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

    <!-- deconnection base de donner -->

        
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
                        // Inclure le fichier de configuration pour la connexion à la base de données

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
                        
                    ?>
                </div>
            </div>


            <div class="slider ar2">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        // Inclure le fichier de configuration pour la connexion à la base de données

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
                        
                    ?>
                </div>
            </div>

            <div class="slider ar3">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        // Inclure le fichier de configuration pour la connexion à la base de données

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
                       
                    ?>

                </div>
            </div>

            <div class="slider ar4">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                       // Inclure le fichier de configuration pour la connexion à la base de données

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
                    
                    ?>
                    
                </div>
            </div>

            <div class="slider ar5">
                <div class="owl-carousel">
                <?php
                        // Logique pour afficher les éléments depuis la base de données
                        // Inclure le fichier de configuration pour la connexion à la base de données

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
                    // Inclure le fichier de configuration pour la connexion à la base de données

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
                    // Inclure le fichier de configuration pour la connexion à la base de données

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
                    <h4>compagny</h4>
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





    <?php

            $conn->close();
        //}
    
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
	<script src="owl.carousel.min.js"></script>
    <script src="script2.js"></script>
</body>
</html>