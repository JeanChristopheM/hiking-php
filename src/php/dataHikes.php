<?php
    
    function errorCheck($errors) {
        if(count($errors) > 0) {
            echo 'There are mistakes !';
            print_r($errors);
            exit;
        }
    };

    $name = $_POST["name"];
    $errors = array();
    $dataName = filter_var(strip_tags($name), FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_STRIP_BACKTICK);

    if (false === filter_var(strip_tags($name), FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_STRIP_BACKTICK)) {
        $errors['name'] = "This name is invalid.";
    }

    errorCheck($errors);

    $difficulty = $_POST["difficulty"];
    $min = 0;
    $max = 2;

    if (filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
        echo("Number value is not within the legal range");
        $errors['difficulty'] = "This difficulty is invalid.";
    } else {
        $dataDifficulty = filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
    }

    $distance = $_POST["distance"];
    $dataDistance = floatval(filter_var($distance, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    if (false === filter_var($distance)) {
        $errors['distance'] = "This distance is invalid.";
    }

    errorCheck($errors);

    $durationHours = $_POST["durationhours"];
    $dataDurationHours = filter_var($durationHours, FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_STRIP_BACKTICK);
    if (false === filter_var($durationHours)) {
        $errors['durationHours'] = "This duration is invalid.";
    }

    errorCheck($errors);

    $durationMinutes = $_POST["durationminutes"];
    $dataDurationMinutes = filter_var($durationMinutes, FILTER_SANITIZE_SPECIAL_CHARS,FILTER_FLAG_STRIP_BACKTICK);
    if (false === filter_var($durationMinutes)) {
        $errors['durationMinutes'] = "This duration is invalid.";
    }

    errorCheck($errors);

    if ($dataDurationHours !== false && $dataDurationMinutes !== false) {
        $dataDurationHours = $dataDurationHours < 10 ? sprintf("%02d", $dataDurationHours) : $dataDurationHours;
        $dataDurationMinutes = $dataDurationMinutes < 10 ? sprintf("%02d", $dataDurationMinutes) : $dataDurationMinutes;
        $dataDuration = $dataDurationHours.'H'.$dataDurationMinutes;

    };

    $elevation = $_POST["elevation"];
    $min = 0;
    $max = 2000;

    if (filter_var($elevation, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
        echo("Number value is not within the legal range");
        $errors['elevation'] = "This elevation is invalid.";
    } else {
        $dataElevation = filter_var($elevation, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
    }

    $createdAt = date('U');
    $updatedAt = date('U');

    require_once ("connexion.php");

    try {
        $q = $db -> prepare("INSERT INTO hikes (name, difficulty, distance, duration, elevation, createdAt, updatedAt) VALUES (:dataName, :dataDifficulty, :dataDistance, :dataDuration, :dataElevation, :createdAt, :updatedAt)");
        $q->bindParam(":dataName", $dataName, PDO::PARAM_STR, 40);
        $q->bindParam(":dataDifficulty", $dataDifficulty, PDO::PARAM_INT, 1);
        $q->bindParam(":dataDistance", $dataDistance, PDO::PARAM_STR, 6);
        $q->bindParam(":dataDuration", $dataDuration, PDO::PARAM_STR, 5);
        $q->bindParam(":dataElevation", $dataElevation, PDO::PARAM_INT, 5);
        $q->bindParam(":createdAt", $createdAt, PDO::PARAM_INT, 20);
        $q->bindParam(":updatedAt", $updatedAt, PDO::PARAM_INT, 20);
        $q->execute();
        $hike = $q->fetch(PDO::FETCH_ASSOC);
        header("location: ../index.php?message=createdSuccess");
        exit;
    } catch(Exception $e) {
        header("location: ../index.php?message=createdFailed");
        exit;

        
    }
?>

