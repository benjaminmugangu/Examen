<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Éléments</title>
    <style>
        .swiper-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            margin: 10px;
        }

        .element-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
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
            echo '<p>' . $row['description'] . '</p>';
            echo '</div>';
          
        }
    } else {
        echo '<p>Aucun élément trouvé dans la base de données.</p>';
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>


</body>
</html>

                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="photos/construction/20171025-161056-1024x768.jpg" alt="" >
                        </div>
                        <h5 class="mb-0 text-center"><b>HTML CSS3 Tutorials</b></h5>
                        <p class="text-center p-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam temporibus quidem magni qui doloribus quasi natus inventore nisi velit minima.</p>
                    </div>
