<?php
// $servername = "localhost";
// $db_username = "root";
// $db_password = "";
// $db_name = "compact_tech";

// $conn = new mysqli($servername, $db_username, $db_password, $db_name);

// // Vérifier la connexion
// if ($conn->connect_error) {
//     die("La connexion à la base de données a échoué : " . $conn->connect_error);
// }
// // Vérifier si l'utilisateur est connecté
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     // Redirection vers la page de connexion si non connecté
//     header("Location: connexion.html");
//     exit();
// }

// // Logique de déconnexion
// if (isset($_POST['logout'])) {
//     // Déconnexion de l'utilisateur
//     session_destroy();
//     header("Location: connexion.html");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php
    // Afficher le nom de l'utilisateur connecté
    // echo '<h2>Bienvenue, ' . $_SESSION['user_id'] . '!</h2>';
    ?>

    <!-- Bouton de déconnexion -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="logout" value="Se déconnecter">
    </form>
</body>
</html>
