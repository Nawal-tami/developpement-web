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

    // Ajout ou modification d'un utilisateur si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $editId = $_POST['edit_id'] ?? null;

        // Hachage du mot de passe pour la sécurité
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

        if ($editId) {
            // Mise à jour
            $updateQuery = "UPDATE users SET name = :name, email = :email";
            if ($hashedPassword) {
                $updateQuery .= ", password = :password";
            }
            $updateQuery .= " WHERE id = :id";

            $stmt = $pdo->prepare($updateQuery);

            $params = [
                ':name' => $name,
                ':email' => $email,
                ':id' => $editId
            ];

            if ($hashedPassword) {
                $params[':password'] = $hashedPassword;
            }

            $stmt->execute($params);

            echo "Utilisateur modifié avec succès !";
            header("Location: cible.php");
            exit;
        } else {
            // Ajout : vérifier d'abord si email existe
            $checkQuery = "SELECT * FROM users WHERE email = :email";
            $stmt = $pdo->prepare($checkQuery);
            $stmt->execute([':email' => $email]);
            $existingUser = $stmt->fetch();

            if ($existingUser) {
                echo "Erreur : Cet email est déjà utilisé.";
            } else {
                $insertQuery = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
                $stmt = $pdo->prepare($insertQuery);
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $hashedPassword
                ]);
                echo "Utilisateur ajouté avec succès !";
                header("Location: cible.php");
                exit;
            }
        }
    }

    // Suppression d'un utilisateur si l'ID est fourni
    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];
        $deleteQuery = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->execute([':id' => $deleteId]);
        echo "Utilisateur supprimé avec succès !";
        header("Location: cible.php");
        exit;
    }

    // Récupération de tous les utilisateurs
    $query = "SELECT * FROM users";
    $stmt = $pdo->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!-- Affichage des utilisateurs -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <style>
        /* Style de base */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }
        th, td {
            padding: 8px;
        }
        .btn {
            background-color: #ff6b6b;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #ff5252;
        }
    </style>
</head>
<body>

    <h1>Liste des utilisateurs</h1>
    <a href="index.php" class="btn">Ajouter un utilisateur</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <!-- Bouton pour modifier l'utilisateur -->
                        <a href="modifier.php?id=<?php echo $user['id']; ?>" class="btn">Modifier</a>
                        <!-- Bouton pour supprimer l'utilisateur -->
                        <a href="cible.php?delete_id=<?php echo $user['id']; ?>" class="btn">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
