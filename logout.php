<?php
session_start();
session_destroy(); // Alle Session-Daten löschen
header('Location: login.php'); // Zurück zur Login-Seite
exit;
?>
