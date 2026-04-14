<?php
$host = "localhost";
$dbname = "drive-easy";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    
    // Activer les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie !";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
