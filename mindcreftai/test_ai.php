<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire PHP</title>
</head>
<body>

<h2>Formulaire simple</h2>

<?php
if (isset($_POST["nom"])) {
    // Sécurisation de la donnée
    $nom = htmlspecialchars($_POST["nom"]);
    echo "<p>Bonjour <strong>$nom</strong></p>";
}
?>

<form method="POST" action="">
    <label>Nom :</label><br>
    <input type="text" name="nom" required>
    <br><br>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>
