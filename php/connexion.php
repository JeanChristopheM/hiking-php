<?php
    define('HOST', '188.166.24.55');
    define('USR', 'jepsen5-billygoat');
    define('PWD', '$PMGgeWFMo#lW0>r;Rg?');
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.USR.';port=3306', USR, PWD);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
    
    $difficulties = ['easy', 'moderate', 'hard'];
    $timeArray = function($duration) {
        return explode('H',$duration);
    };
    
    $currentTime = date('U');
    $formatDate = function($timestamp) {
        return date('d-m-Y \a\t H:i:s', $timestamp);
    };
?>