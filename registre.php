<form action="" method="POST">
    <label for="firstName">Prénom:</label>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Nom:</label>
    <input type="text" id="lastName" name="lastName" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="accessLevel">Niveau d'accès:</label>
    <input type="text" id="accessLevel" name="accessLevel" required><br>

    <button type="submit">S'inscrire</button>
</form>

<?php

$firstName = $_POST['firstName'];   
$lastName = $_POST['lastName'];     
$email = $_POST['email'];           
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
$accessLevel = $_POST['accessLevel']; 
$resetCode = '';                    

try {
    
    $pdo = new PDO("mysql:host=localhost;dbname=tp", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "INSERT INTO users (UserFirstName, UserLastName, UserEmail, UserPwd, UserAccessLevel, UserPwdResetCode) 
            VALUES (:firstName, :lastName, :email, :password, :accessLevel, :resetCode)";
    $stmt = $pdo->prepare($sql);

    
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':accessLevel', $accessLevel);
    $stmt->bindParam(':resetCode', $resetCode);

    
    $stmt->execute();

    echo "Utilisateur enregistré avec succès.";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
