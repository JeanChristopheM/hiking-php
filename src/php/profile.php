<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hike-App</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
    <?php include './includes/nav.php'; ?>
    <header class="header">
        <h1 class="title">Hello <?= $_SESSION['user']["name"] ?></h1>
    </header>
    <main class="info">
        <h2>Your profile</h2>
        <?php if(!isset($_POST['edit'])): ?>
            <ul>
                <li>
                    <h3>Username : </h3>
                    <p><?=$_SESSION['user']["name"]?></p>
                </li>
                <li>
                    <h3>Password : </h3>
                    <p>**********</p>
                </li>
                <li>
                    <h3>Mail : </h3>
                    <p><?= $_SESSION['user']["email"] ?></p>
                </li>
                <li class="form_controls">
                    <form method="post">
                        <input type="hidden" name="edit" value="true" />
                        <button class="abutton">Edit</button>
                    </form>
                    <form action="/php/deleteUser.php" method="post">
                        <input type="hidden" name="delete" value="true" />
                        <button class="abutton">Delete</button>
                    </form>
                </li>
            </ul>
        <?php else: ?>
            <form method="post" action="/php/modifyUser.php">
                <ul>
                    <li>
                        <h3>Username : </h3>
                        <p><input type="text" placeholder="<?=$_SESSION['user']["name"];?>"></p>
                    </li>
                    <li>
                        <h3>Password : </h3>
                        <p><input type="text" placeholder="********" /></p>
                    </li>
                    <li>
                        <h3>Mail : </h3>
                        <p><?= $_SESSION['user']["email"] ?></p>
                    </li>
                    <li class="form_controls">
                        <button class="abutton">Submit</button>
                    </li>
                </ul>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>