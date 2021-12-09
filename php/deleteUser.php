<?php
session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: /index.php');
        exit;
    }
require_once('./connexion.php');
try {
    $q = $db -> prepare("DELETE FROM user WHERE ID = :ID");
    $q->bindParam(':ID', $_SESSION['user']['ID'], PDO::PARAM_INT);
    $q->execute();
    unset($_SESSION["user"]);
    header("Location: /index.php");
    exit;
} catch(Exception $e) {
    header("Location: /index.php?message=deleteUserFailed");
    exit;
}
?>