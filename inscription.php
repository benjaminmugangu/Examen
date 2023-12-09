<?php
// Inclure le fichier de configuration pour la connexion à la base de données
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "compact_tech";

    $conn = new mysqli($servername, $db_username, $db_password, $db_name);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

// Initialiser les variables
$newUsername = $newPassword = '';
$error_message = '';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    header("Location: index.php");
                    exit();
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
</head>
<body>
    <h2>Inscription</h2>

    <?php
    // Afficher les messages d'erreur s'il y en a
    if (!empty($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="new_username">Nouveau Nom d'utilisateur:</label>
        <input type="text" id="new_username" name="new_username" required><br>
        <label for="new_name">entrre votre nom</label>
        <input type="text" id="new_name" name="new_name" required><br>

        <label for="new_password">Nouveau Mot de passe:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
