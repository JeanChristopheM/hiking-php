<?php
    require_once('./connexion.php');
    if(isset($_GET['ID']) && !empty($_GET['ID'])) {
        $ID = $_GET['ID'];
        try {
            $q = $db -> prepare("SELECT * FROM hikes WHERE ID = $ID");
            $q->execute();
            $hike = $q->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if ($ID) {
                echo 'Hike n° '.$ID;
            } else {
                echo '404';
            }
        ?>
    </title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <form action="updateData.php" method="post">
        <ul>
            <li>
                <label for='name'>Title : <br/></label>
                <input type="text" name="name" id="name" value="<?php echo $hike['name']; ?>">
            </li>
            <li>
                Difficulty : <br/>
                <label for='easy'>Easy</label>
                <input type="radio" name="difficulty" id="easy" value="0"
                <?php if($hike['difficulty'] == 0) echo 'checked' ?>
                >
                <label for='moderate'>Moderate</label>
                <input type="radio" name="difficulty" id="moderate" value="1"
                <?php if($hike['difficulty'] == 1) echo 'checked' ?>
                >
                <label for='hard'>Hard</label>
                <input type="radio" name="difficulty" id="hard" value="2"
                <?php if($hike['difficulty'] == 2) echo 'checked' ?>
                >
            </li>
            <li>
                <label for='distance'>Distance : <br/></label>
                <input type="text" name="distance" id="distance" value="<?php echo $hike['distance']; ?>"><span>km</span>
            </li>
            <li>
                <label for="duration">Duration : <br/></label>
                <input type="number" name="hours" id="hours" value="<?php echo $timeArray($hike['duration'])[0] ?>" min="0" max="24" style="width: 3rem;">
                <span>H</span>
                <input type="number" name="minutes" id="minutes" value="<?php echo $timeArray($hike['duration'])[1] ?>" min="0" max="59" style="width: 3rem;">
            </li>
            <li>
                <label for="elevation">Elevation : <br/></label>
                <input type="number" name="elevation" id="elevation" value="<?php echo $hike['elevation']; ?>"><span>m</span>
            </li>
        </ul>
        <input type="hidden" name="ID" value="<?= $ID ?>" />
        <button>Submit</button>
    </form>
</body>
</html>