<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO("mysql:host=localhost;dbname=driveeasy;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM voiture WHERE disponibilite = 1");
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

<form method="POST" class="form-reservation" action="confirmation.php">
  <h2>Réserver une voiture</h2>

  <label>Nom</label>
  <input type="text" name="nom" placeholder="Nom" required>

  <label>Prénom</label>
  <input type="text" name="prenom" placeholder="Prénom" required>

  <label>Email</label>
  <input type="email" name="email" placeholder="email@exemple.com" required>

  <label>Date de naissance</label>
  <input type="date" name="date_naissance" 
    required
    max="<?= date('Y-m-d', strtotime('-18 years')) ?>">

  <label>Téléphone</label>
  <input type="tel" name="tel" 
    placeholder="0607080910" 
    required
    maxlength="10" pattern="[0-9]{10}"
    oninput="this.value = this.value.replace(/[^0-9]/g, '')">

  <label>Véhicule</label>
  <select name="id_voiture" required>
    <option value="">Choisir un véhicule</option>
    <?php foreach ($voitures as $voiture): ?>
      <option value="<?= $voiture['id'] ?>">
        <?= htmlspecialchars($voiture['libelle']) ?> - <?= $voiture['prix_jour'] ?>€/jour
      </option>
    <?php endforeach; ?>
  </select>

  <label>Date de début</label>
  <input type="date" name="date_debut" 
  required
   min="<?= date('Y-m-d') ?>"
   
  >

  <label>Date de fin</label>
  <input type="date" name="date_fin" required
  min="<?= date('Y-m-d') ?>">

  <button type="submit">Réserver</button>
</form>
<div class="carte-contact" id="contact">
  <h3>Nous contacter</h3>
  <p> 01 23 45 67 89</p>
  <p> contact@drive-easy.fr</p>
  <p> 24 rue de Verdun, Paris</p>
</div>

  
  <footer>
    <p>© 2026 Drive-easy par votre meilleur duo : Ilias et Wail — <a href="#">Mentions légales</a> — <a href="#">Contact</a></p>
  </footer>
</body>
</html>
