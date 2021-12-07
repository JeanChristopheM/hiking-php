<?php
    require_once('./php/connexion.php');
    try {
        $q = $db -> prepare("SELECT * FROM hikes");
        $q->execute();
        $hikes = $q->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hike-app</title>
    <link rel="stylesheet" href="/style/main.css">
</head>
<body>
    <header class="header">
        <h1>Hike-App</h1>
        <a href="./php/create.php" class="add">add new hike</a>
    </header>
    <main class="app">
        <?php
            foreach ($hikes as $hike) {
                echo '
                <div class="card">
                    <p class="name" style="font-weight:bold;">'.$hike['name'].'</p>
                    <div class="difficulty">
                        <p class="card__label">Difficulty</p>
                        <p class="card__data">'.$difficulties[$hike['difficulty']].'</p>
                    </div>
                    <div class="distance">
                        <p class="card__label">Distance</p>
                        <p class="card__data">'.$hike['distance'].'km</p>
                    </div>
                    <div class="duration">
                        <p class="card__label">Duration</p>
                        <p class="card__data">'.$hike['duration'].'</p>
                    </div>
                    <div class="elevation">
                        <p class="card__label">Elevation +</p>
                        <p class="card__data">'.$hike['elevation'].'m</p>
                    </div>
                    <p class="delete"><a href=php/delete.php?ID='.$hike['ID'].'>DELETE</a></p>
                    <p class="modify"><a href=php/update.php?ID='.$hike['ID'].'>MODIFY</a></p>
                </div>
                ';
            }
        ?>
    </main>

</body>
</html>
