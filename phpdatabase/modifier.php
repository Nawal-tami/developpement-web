<?php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "Nawal987"; // Remplacez par votre mot de passe MySQL
$database = "form";

try {
    // Création de la connexion avec PDO
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si l'ID de l'utilisateur est passé dans l'URL
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Récupération des informations de l'utilisateur à modifier
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die("Utilisateur non trouvé.");
        }
    }

    // Traitement du formulaire de modification
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

        // Mise à jour des informations de l'utilisateur
        $updateQuery = "UPDATE users SET name = :name, email = :email";
        if ($hashedPassword) {
            $updateQuery .= ", password = :password";
        }
        $updateQuery .= " WHERE id = :id";

        $stmt = $pdo->prepare($updateQuery);
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':id' => $userId
        ];

        if ($hashedPassword) {
            $params[':password'] = $hashedPassword;
        }

        $stmt->execute($params);
        echo "Utilisateur modifié avec succès !";
        header("Location: cible.php");
        exit;
    }
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!-- Formulaire de modification -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
</head>
<body>

<h1>Modifier l'utilisateur</h1>

<form method="POST" action="">
    <label for="name">Nom :</label><br>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>

    <label for="email">Email :</label><br>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

    <label for="password">Mot de passe :</label><br>
    <input type="password" name="password" id="password"><br><br>

    <input type="hidden" name="edit_id" value="<?php echo $user['id']; ?>">

    <input type="submit" value="Modifier l'utilisateur">
</form>

</body>
</html>
