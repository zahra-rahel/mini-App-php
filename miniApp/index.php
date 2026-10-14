<?php
require_once 'config.php';

$error = "";

if (isset($_POST['login_btn'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $login;
        header("Location: menu.php");
        exit();
    } else {
        $error = "Login ou mot de passe incorrect !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Admin</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; text-align: left; }
        h2 { text-align: center; color: #333; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; font-size: 14px; text-align: center; }
    </style>
</head>
<body>

<div class="card">
    <h2>Welcome !</h2>
    <?php if ($error != "") echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <label>User name :</label>
        <input type="text" name="login" required>

        <label>Password :</label>
        <input type="password" name="password" required>

        <button type="submit" name="login_btn">Sign in</button>
    </form>
</div>

</body>
</html>