<?php
    if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['duration']) && isset($_POST['elevation']) && isset($_POST['distance'])) {
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $duration = $_POST['duration'];
        $elevation = $_POST['elevation'];
        $distance = $_POST['distance'];
        
        
        $ints=[$difficulty,$elevation, 'yo'];
        $floats=[$distance];
        $strings=[$name,$duration];

        $error = false;

        foreach($ints as $int) {
            if(!filter_var($int, FILTER_VALIDATE_INT)) {
                echo $error;
                $error = true;
                echo 'error';
            }
            echo 'normal : '.filter_var($int, FILTER_VALIDATE_INT);
            echo '<br />';
            echo 'anormal : '.!filter_var($int, FILTER_VALIDATE_INT);
        }
    }
?>