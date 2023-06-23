<?php
require_once "Database/BD.php";

// Connexion à la base de données
$bd = new BD();
$pdo = $bd->getConnection();

// Récupérer les opérations enregistrées
$query = "SELECT * FROM Operations";
$stmt = $pdo->query($query);
$operations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Traitement de la suppression d'une opération
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer l'opération correspondante dans la base de données
    $deleteQuery = "DELETE FROM Operations WHERE ID = :id";
    $deleteStmt = $pdo->prepare($deleteQuery);
    $deleteStmt->bindParam(':id', $id);
    $deleteStmt->execute();

    // Rediriger vers la page historique.php pour afficher les opérations mises à jour
    header("Location: historique.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="stylees.css">
    
</head>
<style>
    <style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #f5f5f5;
    }

    .delete-button {
        display: inline-block;
        padding: 8px 16px;
        border: none;
        background-color: #e74c3c;
        color: #ffffff;
        text-decoration: none;
        text-align: center;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-button:hover {
        background-color: #c0392b;
    }

</style>

</style>
<body>

    <section class="tete">
        <header>
            <h2>Historique</h2>
        </header>
        <nav>
            <ul style ="">
                <li><a href="index.php?page=Accueil">Accueil</a></li>
                <li><a href="Main.php?page=Calculer">Calculer </a></li>
                <li><a href="historique.php?page=Historique">Historique</a></li>
            </ul>
        </nav>
    </section>

    <table class="table">

    <thead>
        <tr>
        <th scope="col">IDENTIFIANTS DES OPERATIONS</th>
        <th scope="col">EXPRESSIONS MATHEMATIQUES</th>
        <th scope="col">RESULTAT </th>
        <th scope="col">DATE ET HEURE DE L'OPERATION</th>
        <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
        
    <?php foreach ($operations as $operation): ?>
            <tr>
                <td><?php echo $operation['ID']; ?></td>
                <td><?php echo $operation['Expression']; ?></td>
                <td><?php echo $operation['Resultat']; ?></td>
                <td><?php echo $operation['Date_operation']; ?></td>
                <td><a href="historique.php?id=<?php echo $operation['ID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette opération ?')" class ="delete-button">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        
        
    </tbody>

    </table>
    
</body>
</html>