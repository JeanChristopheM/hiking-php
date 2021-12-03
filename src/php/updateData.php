<?php
    if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['duration']) && isset($_POST['elevation']) && isset($_POST['distance'])) {
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $duration = $_POST['duration'];
        $elevation = $_POST['elevation'];
        $distance = $_POST['distance'];
        
        
        $ints=[$difficulty,$elevation];
        $floats=[$distance];
        $strings=[$name,$duration];

        $error = false;

        foreach($ints as $int) {
            if(!filter_var($int, FILTER_VALIDATE_INT) === false || filter_var($int, FILTER_VALIDATE_INT) === 0) {
                $int = filter_var($int, FILTER_VALIDATE_INT);
            } else {
                $error = true;
            }
        }
        foreach($floats as $float) {
            if(!filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) === false || filter_var($float, FILTER_VALIDATE_INT) === 0) {
                $float = floatval(filter_var($float, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
            } else {
                $error = true;
            }
        }
        foreach($strings as $string) {
            if(!filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK) === false) {
                $float = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
            } else {
                $error = true;
            }
        }
        print_r($ints);
        echo '<br>';
        print_r($floats);
        echo '<br>';
        print_r($strings);
        if($error) {
            echo 'there has been an issue with some data';
        }
    }
?>