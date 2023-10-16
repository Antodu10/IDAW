<?php
// Rediriger vers une URL spécifique
$URL_cible = 'http://localhost/IDAW/TP4/exo4/users.php';
header($URL_cible);
exit; // Assure que le script se termine immédiatement après la redirection
?>

