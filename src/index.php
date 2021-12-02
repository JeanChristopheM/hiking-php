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
                    <p class="distance">'.$hike['distance'].'</p>
                    <p class="duration">'.$hike['duration'].'</p>
                    <p class="elevation">'.$hike['elevation'].'</p>
                    <p class="delete"><button>DEL</button></p>
                    <p class="modify"><a href=php/update.php?ID='.$hike['ID'].'>MOD</a></p>
                </div>
                ';
            }
        ?>
    </div>
</body>
</html>