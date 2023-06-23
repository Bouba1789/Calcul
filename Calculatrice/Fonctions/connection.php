<?php

    require "Database/BD.php";

    function saveOperation($expression, $result)
    {
        try {
            $bd = new BD();
            $pdo = $bd->getConnection();
            $date = date('Y-m-d H:i:s'); // Date et heure actuelles
    
            $stmt = $pdo->prepare("INSERT INTO operations (expression, resultat, date_operation) VALUES (:expression, :result, :date)");
            $stmt->bindParam(':expression', $expression);
            $stmt->bindParam(':result', $result);
            $stmt->bindParam(':date', $date);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement dans la base de données: " . $e->getMessage();
        }
    }