<?php

$name = $_POST["name"];
$dataName = filter_var($name, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_BACKTICK);


$difficulty = $_POST["difficulty"];
$min = 0;
$max = 2;

if (filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Number value is not within the legal range");
} else {
    $dataDifficulty = filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
}

$distance = $_POST["distance"];
$dataDistance = floatval(filter_var($distance, FILTER_SANITIZE_NUMBER_FLOAT,
FILTER_FLAG_ALLOW_FRACTION));

$duration = $_POST["duration"];
$dataDuration = filter_var($name, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_BACKTICK);

$elevation = $_POST["elevation"];
$min = 0;
$max = 2000;

if (filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Number value is not within the legal range");
} else {
    $dataElevation = filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max)));
}
?>

