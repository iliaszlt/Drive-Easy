<?php
$pdo = new PDO("mysql:host=localhost;dbname=driveeasy;charset=utf8", "root", "");

$sql = "SELECT * FROM voiture WHERE disponibilite = 1";
$stmt = $pdo->query($sql);
$voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>












<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Easy</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Drive-easy — Réservation de voiture</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
    <link rel="stylesheet" href="css/style.css">
    <h1  class="bvn">Bienvenue sur Drive Easy</h1>
    <p  class="bvn">Votre solution de réservation de voiture en ligne.</p>
    
   
    
    
  
  <header>
    <div class="logo"> Drive-easy </div>
    <nav>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="vehicules.php">Nos voitures</a></li>
        <li><a href="reservation.php">Réserver</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  
 <section id="voitures">
    <h2 class="titre-section">Nos véhicules disponibles</h2>
    <p class="sous-titre-section">Choisissez parmi notre sélection</p>

    <div class="grille-voitures">

      <!-- Carte 1 -->
      <div class="grille-voitures">

  <?php foreach ($voitures as $voiture): ?>

  <div class="carte-voiture">       
   
      <img src="<?= $voiture['image'] ?>" alt="<?= $voiture['libelle'] ?>">
    
    <div class="carte-contenu">
      <h3><?= $voiture['libelle'] ?></h3>
      <div class="carte-pied">
        <span class="prix"><?= $voiture['prix_jour'] ?> €<small>/jour</small></span>
        <a href="reservation.php" class="btn btn-principal">Réserver</a>
      </div>
    </div>
  </div>

  <?php endforeach; ?>

</div>
</section>
<div class="carte-contact" id="contact">
  <h3>Nous contacter</h3>
  <p> 01 23 45 67 89</p>
  <p> contact@drive-easy.fr</p>
  <p> 24 rue de Verdun, Paris</p>
</div>

  
  <footer>
    <p>© 2025 Drive-easy par votre meilleur duo : ilias et Wail — <a href="#">Mentions légales</a> — <a href="#">Contact</a></p>
  </footer>
  



</body>
</html>
