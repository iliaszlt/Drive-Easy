

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $pdo = new PDO("mysql:host=localhost;dbname=driveeasy;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}


$nom        = trim($_POST['nom']);
$prenom     = trim($_POST['prenom']);
$email      = trim($_POST['email']);
$date_naissance =trim($_POST['date_naissance']);
$tel        = trim($_POST['tel']);
$id_voiture = (int) $_POST['id_voiture'];
$date_debut = $_POST['date_debut'];
$date_fin   = $_POST['date_fin'];


if ($date_fin < $date_debut) {
    echo "La date de fin doit être après la date de début.";
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM client WHERE email = ?");
$stmt->execute([$email]);
$client = $stmt->fetch();

if ($client) {
    $id_client = $client['id'];
} else {
    $stmt = $pdo->prepare("INSERT INTO client (email, nom, prenom, tel, date_naissance) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$email, $nom, $prenom, $tel, $date_naissance]);
    $id_client = $pdo->lastInsertId();
}


$stmt = $pdo->prepare("SELECT prix_jour FROM voiture WHERE id = ?");
$stmt->execute([$id_voiture]);
$voiture = $stmt->fetch();

$nbJours    = (new DateTime($date_debut))->diff(new DateTime($date_fin))->days;
$prix_total = $nbJours * $voiture['prix_jour'];


$stmt = $pdo->prepare("INSERT INTO reservation (id_client, id_voiture, date_debut, date_fin, prix_total, statut) VALUES (?, ?, ?, ?, ?, 'en_attente')");
$stmt->execute([$id_client, $id_voiture, $date_debut, $date_fin, $prix_total]);





$stmt = $pdo->prepare("UPDATE voiture SET disponibilite = 0 WHERE id = ?");
$stmt->execute([$id_voiture]);




$pdo->query("
    UPDATE voiture SET disponibilite = 1 
    WHERE id IN (
        SELECT id_voiture FROM reservation 
        WHERE statut = 'en_attente' 
        AND date_fin < CURDATE()
    )
");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="css/style.css">
</head>
    <header>
        <div class="logo"> Drive-easy </div>
        
    </header>

<body class="res_display">
    <h2 class="res_confirme">Réservation confirmée !</h2>
    <p>Merci <strong><?= htmlspecialchars($prenom) ?> <?= htmlspecialchars($nom) ?></strong></p>
    <p>Du <strong><?= $date_debut ?></strong> au <strong><?= $date_fin ?></strong></p>
    <p>Prix total : <strong><?= $prix_total ?> €</strong></p>
    <button class="btn_res"><a class="lien_res" href="index.php">Retour à l'accueil</a></button>
</body>
</html>
