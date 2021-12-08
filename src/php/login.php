<?php

// open the $_SESSION
session_start();

if(!empty($_POST)) {
    // 1. Check all the inputs exist
    // 2. We check also if the $_POST are not empty because we load the page, the form is empty
    if(isset($_POST["login"],$_POST["pass"])
        && !empty($_POST["login"]) && !empty($_POST["pass"])) {

        $login = strip_tags($_POST["login"]);

        //SQL part
        require_once "connexion.php";
        $q = $db->prepare("SELECT * FROM user WHERE name=:login");

        // bindParam() accepte uniquement une variable qui est interprétée au moment de l'execute()
        $q->bindParam(":login", $login, PDO::PARAM_STR);

        // exexute return a boolean
        if(!$q->execute()) {
            die("form not sent to the db");
        }

        $user = $q->fetch(PDO::FETCH_ASSOC);

        if(!$user) {
            die("user doesn't exist &/or password incorrect");
        }

        // check the password input with the password in db
        if(!password_verify($_POST["pass"], $user["pwd"])){
            die("user doesn't exist &/or password incorrect");
        }


        // store data of user in $_SESSION
        $_SESSION["user"] = [
            "ID" => $user["ID"],
            "name" => $user["name"],
            "email" => $user["email"]
        ];

        header("location: ../index.php");

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
    <title>User Login</title>
</head>
<body>
<nav class ="topnav">
                <li><a href="../index.php">Home</a></li>
                <?php if(!isset($_SESSION["user"])): ?>
                <li><a href="#">Login</a></li>
                <li><a href="../php/subscription.php">Subscription</a></li>
                <?php else: ?>
                <li><a href="./php/logout.php">Logout</a></li>
                <?php endif; ?>
    </nav>
    <div class="user">
        <header class="user__header">
            
            <h1 class="user__title">🥾 User Login 🥾</h1>
        </header>
        
        <form class="form" method="post" action="">
            <div class="form__group">
                <input type="text" placeholder="Username" class="form__input" name="login" />
            </div>
            
            <div class="form__group">
                <input type="password" placeholder="Password" class="form__input" autocomplete="off" name="pass" />
            </div>
            
            <button class="btn" type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>