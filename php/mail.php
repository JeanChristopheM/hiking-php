<?php
ini_set( 'display_errors', 1);
error_reporting( E_ALL );
$from = "francisfrancois9189@gmail.com";
$to ="francis_francois@hotmail.com";
$subject = "Vérification PHP Mail";
$message = "PHP mail marche";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);
echo "L'email a été envoyé.";
?>