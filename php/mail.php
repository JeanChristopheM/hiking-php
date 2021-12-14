<?php
     $to      = 'francisfrancois9189@gmail.com';
     $subject = 'TEST';
     $message = 'Bonjour !';
     $headers = 'From: webmaster@example.com';
     
     mail($to, $subject, $message, $headers);
     echo "L'email a été envoyé.";

 ?>