<?php

// open the $_SESSION
session_start();

// Check if $_POST is not empty
if(!empty($_POST)) {
    // 1. Check all the inputs exist
    // 2. Check also if the $_POST are not empty because we load the page, the form is empty
    if(isset($_POST["login"], $_POST["email"], $_POST["pass"]) &&
        !empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ) {

        // strip_tags for the login
        $login = strip_tags($_POST["login"]);

        // check valid email
        if(!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            die("email invalid");
        }

        // hash the password
        $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);

        //SQL part
        require_once "connexion.php";

        $q = $db->prepare('SELECT name FROM user WHERE name = :name');
        $q->execute(array(':name'=>($_POST["login"])));
        $dataLogin = $q->fetch();
            if ($dataLogin) // Si une valeur est retournée c'est qu'un utilisateur possède déjà l'Username.
            {
                header("location: ../index.php?message=userNameUsed");
            }


        $q = $db->prepare('SELECT email FROM user WHERE email = :email');
        $q->execute(array(':email'=>($_POST["email"])));
        $donnees = $q->fetch();
            if ($donnees) // Si une valeur est retournée c'est qu'un utilisateur possède déjà l'email.
            {
                header("location: ../index.php?message=emailUsed");
            }

        $q = $db->prepare("INSERT INTO user(name, email, pwd) VALUES (:login, :email, :password)");

        // bindParam() accepte uniquement une variable qui est interprétée au moment de l'execute()
        $q->bindParam(":login", $login, PDO::PARAM_STR);
        $q->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $q->bindParam(":password", $pass, PDO::PARAM_STR);

        // check the execute() -> return a boolean
        if (!$q->execute()) {
            die("form not sent to the db");
        }

        // retreive the last ID
        $id = $db->lastInsertId();

        // store data of user in $_SESSION
        $_SESSION["user"] = [
                "id"=> $id,
                "login" => $login,
                "email" => $_POST["email"]
        ];

        // redirect to index when done
        header("location: ../index.php");
    } else {
      die("form incomplete");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/main.css">
    <title>User Subscripiton</title>
</head>
<body>
<div class="user">
    <header class="user__header">
        
        <h1 class="user__title">🥾 User Subscripiton 🥾</h1>
    </header>
    
    <form class="form" method="post" action="">
        <div class="form__group">
            <input type="text" placeholder="Username" class="form__input" name="login" />
        </div>
        
        <div class="form__group">
            <input type="email" placeholder="Email" class="form__input" name="email" />
        </div>
        
        <div class="form__group">
            <input type="password" placeholder="Password" class="form__input" autocomplete="off" name="pass" />
        </div>
        <button class="btn" type="submit">Register</button>
    </form>
</div>
</body>
</html>