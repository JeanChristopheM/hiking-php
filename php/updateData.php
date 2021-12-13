<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit;
}
    if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['hours']) && isset($_POST['elevation']) && isset($_POST['distance'])) {
        
        
        $ID = $_POST['ID'];
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $elevation = $_POST['elevation'];
        $distance = $_POST['distance'];
        $hours = intval(ltrim(strval($_POST['hours']), "0"));
        $minutes = intval(ltrim(strval($_POST['minutes']), "0"));
        $updatedAt = date('U');

        $errors = [];
        $error = false;

        $data = [
            "ints" => [
                "difficulty" => $difficulty, 
                "elevation" => $elevation,
                "hours" => $hours,
                "minutes" => $minutes,
            ],
            "floats" => [
                "distance" => $distance,
            ],
            "strings" => [
                "name" => $name,
            ]
        ];

        // SANITIZATION FUNCTIONS

        require_once($_SERVER['DOCUMENT_ROOT'].'/php/includes/functions.php');

        // VALIDATION
        foreach($data as $key => $val) {
            switch($key) {
                case 'ints':
                    foreach($val as $value) {
                        if(!sanitizeInt($value) && sanitizeInt($value) !== 0) {
                            $errors['ints'] = true;
                        }
                    };
                    break;
                case 'floats':
                    foreach($val as $value) {
                        if(!sanitizeFloat($value)) {
                            $errors['floats'] = true;
                        }
                    };
                    break;
                case 'strings':
                    foreach($val as $value) {
                        if(!sanitizeString($value)) {
                            $errors['strings'] = true;
                        }
                    };
                    break;
                default:
                    echo 'Error';
            };
        };
        
        // CHECKING IF NO ERRORS

        foreach($errors as $key => $value) {
            if ($value) {
                $error = true;
            }
        }

        // IF NO ERROR, DB INJECT
        if (!$error) {
            require_once('./connexion.php');
            $name = sanitizeString($name);
            $difficulty = sanitizeInt($difficulty);
            $elevation = sanitizeInt($elevation);
            $distance = sanitizeFloat($distance);
            $hours = sanitizeInt($hours);
            $minutes = sanitizeInt($minutes);
            
            $hours = $hours < 10 ? sprintf("%02d", $hours) : $hours;
            $minutes = $minutes < 10 ? sprintf("%02d", $minutes) : $minutes;
            $duration = $hours."H".$minutes;

            $query =
            'UPDATE hikes
            SET name = :name,
            difficulty = :difficulty,
            distance = :distance,
            duration = :duration,
            elevation = :elevation,
            updatedAt = :updatedAt
            WHERE ID = :ID';
            try {
                $q = $db -> prepare($query);
                $q->bindParam(':name', $name, PDO::PARAM_STR, 50);
                $q->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
                $q->bindParam(':distance', $distance, PDO::PARAM_STR, 50);
                $q->bindParam(':duration', $duration, PDO::PARAM_STR, 50);
                $q->bindParam(':elevation', $elevation, PDO::PARAM_INT);
                $q->bindParam(':updatedAt', $updatedAt, PDO::PARAM_INT);
                $q->bindParam(':ID', $ID, PDO::PARAM_INT);
                
                $q->execute();
            } catch(Exception $e) {
                echo $e->getMessage();
                exit;
            }
            header("Location: ../index.php?message=updateSuccess");
            exit;
        } else {
            header("Location: ../index.php?message=updateFailed");
            exit;
        }
    }
?>