<?php
    if(!isset($_ENV['HOST']) || !isset($_ENV['USR']) || !isset($_ENV['PASS'])) {
        include 'env.php';
    }
    try {
        $db = new PDO('mysql:host='.$_ENV['HOST'].';dbname='.$_ENV['USR'].';port=3306', $_ENV['USR'], $_ENV['PASS']);
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