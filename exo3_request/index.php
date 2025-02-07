<?php
  declare(strict_types=1);
  require "db.php";

  $email = "example@exo3.email";
  $password = "Ex@mple123";
  $errors = [];

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Email nom valid.";
    }

    $password = $_POST['password'];
    $pattern = "/^(?=.*\d)(?=.*[\W_]).{8,}$/";
    if (!preg_match($pattern, $password)) {
      $errors['password'] = "Mot de passe invalide. Il doit contenir au moins 8 caractères, un chiffre et un caractère spécial.";
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match($pattern, $password)) {
      if (isset($_POST['submit'])) {
        userLogin($conn, $email, $password);
      }
      if (isset($_POST['register'])) {
        userRegister($conn, $email, $password);
      }
    }
  }

  function userRegister(PDO $conn, string $email, string $password) {
    $sql = "INSERT INTO users (email, password, created_at) VALUES (:email, :password, :created_at)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
      ':email' => $email,
      ':password' => password_hash($password, PASSWORD_DEFAULT),
      ':created_at' => date('Y-m-d H:i:s')
    ]);
  }

  function userLogin(PDO $conn, string $email, string $password) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      echo "vous etest connecté";
      exit();
    } else {
      echo "Email ou mot de passe incorrect !";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exo3_request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="main container">
    <h1><u>exo3</u>: Formulaire</h1>
    <ul>
      <li>validation email (utilisateur, domaine, extension)</li>
      <li>password: caractères >= 8, caractères spéciaux >= 1, nombre >=1</li>
      <li>persistence</li>
      <ul>
        <li>connection à la bd (avec PDO)</li>
        <li>insértion d'enregistrement</li>
        <li>verification(selection) email et connection(verification mot de passe)</li>
      </ul>
    </ul>

    <form action="" method="post" id="form" class="row g-3">
      <div class="col-12">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Votre adresse email" value="<?= $email; ?>" require>
        <span style="color:red;"><?= $errors['email'] ?? ''; ?></span>
      </div>
      <div class="col-12">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" value="<?= $password; ?>" required>
        <span style="color:red;"><?= $errors['password'] ?? ''; ?></span>
      </div>
      <span style="color:red;"><?= $errors['login'] ?? ''; ?></span>
      
      <div class="col-12 d-flex justify-content-around">
        <button class="btn btn-primary" type="submit" name="register">S'inscrire</button>
        <button class="btn btn-primary" type="submit" name="submit">Se connecter</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>