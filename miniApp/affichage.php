<?php
require_once 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}

$search_cin = "";
$sql = "SELECT * FROM Stagiare";

if (isset($_POST['afficher_btn']) && !empty($_POST['cin_search'])) {
    $search_cin = $_POST['cin_search'];
    $sql = "SELECT * FROM Stagiare WHERE cin = '$search_cin'";
}

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>L'affichage des stagiaires</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        .search-box { margin-bottom: 15px; }
        input[type="text"] { padding: 7px; width: 200px; }
        button { padding: 7px 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-back { background-color: #6c757d; color: white; text-decoration: none; padding: 8px 12px; border-radius: 4px; display: inline-block; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <a href="menu.php" class="btn-back">Retour au Menu</a>
    <h2>L'affichage des stagiaires</h2>

    <form method="POST" class="search-box">
        <label>CIN : </label>
        <input type="text" name="cin_search" value="<?php echo $search_cin; ?>">
        <button type="submit" name="afficher_btn">Afficher</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Date Naissance</th>
                <th>Filière</th>
                <th>Groupe</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>".$row['cin']."</td>
                        <td>".$row['nom']."</td>
                        <td>".$row['prenom']."</td>
                        <td>".$row['adresse']."</td>
                        <td>".$row['date_naissance']."</td>
                        <td>".$row['filiere']."</td>
                        <td>".$row['groupe']."</td>
                        <td>".$row['email']."</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center;'>Aucun stagiaire trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>