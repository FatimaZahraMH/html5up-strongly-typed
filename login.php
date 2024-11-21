<?php
// Vérifier si une session est déjà active avant d'appeler session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Afficher les messages de session
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['err'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['err'] . '</div>';
    unset($_SESSION['err']);
}
?>

<form method="POST" action="">
    <div>
        Adresse e-mail
        <input id="login-email" name="login_email" required type="email" />
    </div>
    <div>
        <div>
            Mot de passe
            <a href="reset_password.php">Mot de passe oublié?</a>
        </div>
        <input id="login-password" required name="login_password" type="password" />
    </div>
    <div>
        <input type="checkbox" id="login-checkbox" checked="checked" />
        Se souvenir de moi
    </div>
    <div>
        <input type="submit" name="Login" value="Se connecter">
    </div>
</form>

<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_email'], $_POST['login_password'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Préparer la requête pour éviter l'injection SQL
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE UserEmail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Vérifier le mot de passe
    if ($user && password_verify($password, $user['UserPwd'])) {
        $_SESSION['success'] = "Connexion réussie, bienvenue " . $user['UserFirstName'] . "!";
        setcookie("user_name", $user['UserFirstName'], time() + 3600, "/");
        header("Location: login.php");
        exit;
    } else {
        $_SESSION['err'] = "Email ou mot de passe incorrect";
        header("Location: login.php");
        exit;
    }
}
?>
