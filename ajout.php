<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout</title>
</head>
<body>
    <?php
    // Logique pour ajouter les éléments à la base de données
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "compact_tech";

    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    } // Inclure le fichier de configuration pour la connexion à la base de données

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
        $conn->close();
    }
    ?>

    <!-- Formulaire d'ajout -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Description:</label>
        <input type="number" name="description" id="description">

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
