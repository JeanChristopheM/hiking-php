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
    <div class="app">
        <?php
            foreach ($hikes as $hike) {
                echo '
                <div class="card">
                    <p class="name">'.$hike['name'].'</p>
                    <p class="difficulty">'.$difficulties[$hike['difficulty']].'</p>
                    <p class="distance">'.$hike['distance'].'km</p>
                    <p class="duration">'.$hike['duration'].'</p>
                    <p class="elevation">'.$hike['elevation'].'m</p>
                    <p class="delete"><a href=php/delete.php?ID='.$hike['ID'].'>DEL</a></p>
                    <p class="modify"><a href=php/update.php?ID='.$hike['ID'].'>MOD</a></p>
                </div>
                ';
            }
        ?>
    </div>
    <div class="create">
        <?php
        echo '
        <div>
        <p class="add"><a href="./php/create.php">ADD</a></p>
        </div>
        ';
        ?>
    </div>
    
    


</body>
</html>
