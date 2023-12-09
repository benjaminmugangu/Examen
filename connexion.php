<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

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
        header("Location: accueil.php");
        exit();
    }

    // Logique de connexion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('config.php');

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
                header("Location: accueil.php");
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
