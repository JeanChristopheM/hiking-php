<?php
     $to      = 'francisfrancois9189@gmail.com';
     $subject = 'le sujet';
     $message = 'Bonjour !';
     $headers = 'From: webmaster@example.com';
     
     mail($to, $subject, $message, $headers);
 ?>