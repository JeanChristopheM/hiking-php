<?php session_start(); ?>

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

<?php include '../php/includes/doctype.php'; ?>
    <title>
        <?php
            if ($ID) {
                echo 'Hike n° '.$ID;
            } else {
                echo '404';
            }
        ?>
    </title>
</head>
<body>
    <?php include './includes/nav.php'; ?>
    <header class="header">
        <h1 class="title">Update hike info</h1>
    </header>
    <form action="updateData.php" method="post" class="updateForm">
        <ul>
            <li>
                <label for='name' class="label">Name : <br/></label>
                <input type="text" name="name" id="name" value="<?php echo $hike['name']; ?>">
            </li>
            <li>
                <p class="label">Difficulty : </p>
                <div>
                    <input type="radio" name="difficulty" id="easy" value="0"
                    <?php if($hike['difficulty'] == 0) echo 'checked' ?>
                    >
                    <label for='easy' class="pointer">Easy</label>
                </div>
                <div>
                    <input type="radio" name="difficulty" id="moderate" value="1"
                    <?php if($hike['difficulty'] == 1) echo 'checked' ?>
                    >
                    <label for='moderate' class="pointer">Moderate</label>
                </div>
                <div>
                    <input type="radio" name="difficulty" id="hard" value="2"
                    <?php if($hike['difficulty'] == 2) echo 'checked' ?>
                    >
                    <label for='hard' class="pointer">Hard</label>
                </div>
            </li>
            <li>
                <label for='distance' class="label">Distance : <br/></label>
                <input type="text" name="distance" id="distance" value="<?php echo $hike['distance']; ?>"><span style="font-size:0.7em;">km</span>
            </li>
            <li>
                <label for="duration" class="label">Duration : <br/></label>
                <input type="number" name="hours" id="hours" value="<?php echo $timeArray($hike['duration'])[0] ?>" min="0" max="24" style="width: 3rem;">
                <span style="font-size:0.7em;">hours</span>
                <input type="number" name="minutes" id="minutes" value="<?php echo $timeArray($hike['duration'])[1] ?>" min="0" max="59" style="width: 3rem;">
                <span style="font-size:0.7em;">minutes</span>
            </li>
            <li>
                <label for="elevation" class="label">Elevation : <br/></label>
                <input type="number" name="elevation" id="elevation" value="<?php echo $hike['elevation']; ?>"><span style="font-size:0.7em;">m</span>
            </li>
        </ul>
        <input type="hidden" name="ID" value="<?= $ID ?>" />
        <button>Submit</button>
    </form>
</body>
</html>