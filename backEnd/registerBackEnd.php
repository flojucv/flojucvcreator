<?php 
    session_start();

    require_once "bd.php";

    // Récupération des données du formulaire d'inscription
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verif_password = $_POST['verif_password'];
    $username = $_POST['login'];

    // Vérification que les mots de passe correspondent
    if($password !== $verif_password){
        $_SESSION['error'] = "Les mots de passe ne correspondent pas.";
        header("Location: ../register.php");
        exit();
    }

    // Hashage du mot de passe avec Bcrypt
    $options = [
        'cost' => 12,
    ];
    $password = password_hash($password, PASSWORD_BCRYPT, $options);

    // Vérification de l'existence de l'email dans la base de données
    $sql = "SELECT email FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $_SESSION['error'] = "Un compte existe déjà avec cet email.";
        header("Location: ../register.php");
        exit();
    }

    // Insertion des données dans la base de données
    $sql = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $_SESSION['success'] = "Inscription réussie.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error'] = "Erreur lors de l'inscription.";
        header("Location: ../register.php");
        exit();
    }
?>