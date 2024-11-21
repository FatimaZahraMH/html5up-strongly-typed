
<?php
require_once('config.php'); // Charger la configuration

// Exécuter une requête pour vérifier les données
$staff_login_sql = "SELECT * FROM users";
$res = $mysqli->query($staff_login_sql);

if ($res && $res->num_rows > 0) {
    echo "oui";
} else {
    echo "non";
}

// Libérer le résultat (bonne pratique)
if ($res) {
    $res->free();
}
?>
