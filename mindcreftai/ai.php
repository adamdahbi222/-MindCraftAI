<?php
try {
  $pdo = new PDO(
    "mysql:host=127.0.0.1;port=8889;dbname=mindcraftai;charset=utf8",
    "root",
    "root" // sur MAMP
  );
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("error");
}

if (
  !isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['password'], $_POST['confirm_password'])
) {
  die("error");
}

if ($_POST['password'] !== $_POST['confirm_password']) {
  die("password_mismatch");
}

$nom = trim($_POST['nom']);
$prenom = trim($_POST['prenom']);
$email = trim($_POST['email']);
$tel = trim($_POST['tel']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

try {
  $stmt = $pdo->prepare(
    "INSERT INTO users (nom, prenom, email, tel, password)
     VALUES (?, ?, ?, ?, ?)"
  );

  if ($stmt->execute([$nom, $prenom, $email, $tel, $password])) {
    echo "success";
  } else {
    echo "error";
  }
} catch (PDOException $e) {
  echo "error";
}
