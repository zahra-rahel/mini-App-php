<?php
require_once 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; padding-top: 50px; }
        .container { background: white; padding: 30px; display: inline-block; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .btn { display: inline-block; padding: 12px 20px; margin: 10px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; }
        .btn-blue { background-color: #007bff; }
        .btn-red { background-color: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <h1>Espace Admin</h1>
    <p>Bienvenue, <b><?php echo $_SESSION['admin']; ?></b></p>
    <hr><br>

    <a href="inscription.php" class="btn">Ajouter Stagiaire</a>
    <a href="affichage.php" class="btn btn-blue">Afficher Stagiaires</a>
    <br><br>
    <a href="logout.php" class="btn btn-red">Déconnexion</a>
</div>

</body>
</html>