<?php
session_start();
require "Fonctions/fonction.php";
require "Fonctions/connection.php";
$btn = "";
$_SESSION['value'] = '';
$operation = ['+', '-', '*', '/', '*('];
$op = '';

if (isset($_POST['btn'])) {
    $btn = $_POST['expression'] . $_POST['btn'];
}

if (isset($_POST['egal'])) {
    $_SESSION['value'] = $_POST['expression'];

    // Vérifier si le calcul contient le pourcentage
    if (strpos($_SESSION['value'], '%') !== false) {
        $value = str_replace('%', '', $_SESSION['value']);
        $percentage = floatval($value);

        // Calculer le pourcentage du nombre
        $result = ($percentage / 100);
        $btn = $result;
    } else {
        $result = calculateExpression($_SESSION['value']);
        if ($result === false) {
            $btn = "Erreur de calcul";
        } else {
            $btn = $result;
            
        }
    }

    // Enregistrer l'expression et le résultat dans la base de données
    saveOperation($_SESSION['value'], $result);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylees.css">
    <title>Calculatrice</title>
</head>
<body>
    <section class="tete">
        <header>
            <h2>Calculer</h2>
        </header>
        <nav>
            <ul style ="">
                <li><a href="index.php?page=Accueil">Accueil</a></li>
                <li><a href="Main.php?page=Calculer">Calculer</a></li>
                <li><a href="historique.php?page=Historique">Historique</a></li>
            </ul>
        </nav>
    </section>
    <div class="container">
        <div class="calculator dark">
            <div class="theme-toggler active">
                <i class="toggler-icon"></i>
            </div>
            <form class="calculator-form" method="post" action="">
                <input type="text" name="expression" style ="color : black" id="display" class="display-screen" readonly value="<?=$btn?>">
                <div class="buttons">
                    <table>
                        <tr>
                            <td><button type="submit" class="btn-operator" name="effacer" value="C">C</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value="/">/</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value="*">*</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value="%">%</button></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn-number" name="btn" value="7">7</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="8">8</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="9">9</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value="-">-</button></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn-number" name="btn" value="4">4</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="5">5</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="6">6</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value="+">+</button></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn-number" name="btn" value="1">1</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="2">2</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="3">3</button></td>
                            <td><button type="submit" class="btn-equal" name="btn" value=".">.</button></td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="btn-operator" name="btn" value="(">(</button></td>
                            <td><button type="submit" class="btn-number" name="btn" value="0">0</button></td>
                            <td><button type="submit" class="btn-operator" name="btn" value=")">)</button></td>
                            <td><button type="submit" class="btn-equal" name="egal" value="=">=</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
