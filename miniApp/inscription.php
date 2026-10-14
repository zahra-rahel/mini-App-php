<?php
require_once 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$msg = "";

if (isset($_POST['enregistrer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_n = $_POST['date_n'];
    $adresse = $_POST['adresse'];
    $filiere = $_POST['filiere'];
    $groupe = $_POST['groupe'];
    $cin = $_POST['cin'];
    $cne = $_POST['cne'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Stagiare (cin, cne, nom, prenam, date_naissance, adresse, email, filiere, groupe) 
            VALUES ('$cin', '$cne', '$nom', '$prenom', '$date_n', '$adresse', '$email', '$filiere', '$groupe')";

    // Note: Column name in SQL table is prenom
    $sql = "INSERT INTO Stagiare (cin, cne, nom, prenom, date_naissance, adresse, email, filiere, groupe) 
            VALUES ('$cin', '$cne', '$nom', '$prenom', '$date_n', '$adresse', '$email', '$filiere', '$groupe')";

    if (mysqli_query($conn, $sql)) {
        $msg = "Stagiaire ajouté avec succès !";
    } else {
        $msg = "Erreur : " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Inscription du stagiaire</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 25px; max-width: 500px; margin: 0 auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; }
        .row { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .field { width: 48%; }
        label { font-weight: bold; font-size: 14px; display: block; margin-top: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 15px; }
        .back-btn { background-color: #6c757d; text-decoration: none; display: inline-block; text-align: center; }
        .success { color: green; text-align: center; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Inscription du stagiaire</h2>
    <?php if ($msg != "") echo "<p class='success'>$msg</p>"; ?>

    <form method="POST">
        <div class="row">
            <div class="field">
                <label>Nom :</label>
                <input type="text" name="nom" required>
            </div>
            <div class="field">
                <label>CIN :</label>
                <input type="text" name="cin" required>
            </div>
        </div>

        <div class="row">
            <div class="field">
                <label>Prénom :</label>
                <input type="text" name="prenom" required>
            </div>
            <div class="field">
                <label>CNE :</label>
                <input type="text" name="cne">
            </div>
        </div>

        <div class="row">
            <div class="field">
                <label>Date Naissance :</label>
                <input type="date" name="date_n">
            </div>
            <div class="field">
                <label>Email :</label>
                <input type="email" name="email">
            </div>
        </div>

        <label>Adresse :</label>
        <input type="text" name="adresse">

        <div class="row">
            <div class="field">
                <label>Filière :</label>
                <input type="text" name="filiere">
            </div>
            <div class="field">
                <label>Groupe :</label>
                <input type="text" name="groupe">
            </div>
        </div>

        <button type="submit" name="enregistrer">Enregistrer</button>
        <a href="menu.php" class="button back-btn" style="padding: 10px 15px; color: white; border-radius: 4px;">Retour</a>
    </form>
</div>

</body>
</html>