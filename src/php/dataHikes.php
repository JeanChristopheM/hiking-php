<?php
echo ($_POST["name"]);
echo ($_POST["difficulty"]);
echo ($_POST["distance"]);
echo ($_POST["duration"]);
echo ($_POST["elevation"]);

$name = $_POST["name"];
filter_var($name, FILTER_SANITIZE_STRING);
var_dump($name);


$difficulty = $_POST["difficulty"];
$min = 0;
$max = 2;

if (filter_var($difficulty, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Number value is not within the legal range");
} else {
    echo("Number value is within the legal range");
}


$distance = $_POST["distance"];
floatval(filter_var($distance, FILTER_SANITIZE_NUMBER_FLOAT,
FILTER_FLAG_ALLOW_FRACTION));



?>

