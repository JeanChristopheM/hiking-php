<?php
session_start();
if(!isset($_POST['name']) || empty($_POST['name']) || 
!isset($_POST['pwd']) || empty($_POST['pwd']) || !isset($_SESSION['user'])) {
    header("Location: /index.php?message=errorModify");
    exit;
} else {
    if(filter_var(strip_tags($_POST['name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK) == false) {
        header("Location: /index.php?message=errorModify");
        exit;
    }
    $name = filter_var(strip_tags($_POST['name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_BACKTICK);
    // hash the password
    $pwd = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
    require_once('../php/connexion.php');
    try {
        $q = $db -> prepare("UPDATE user SET name = :name, pwd = :pwd WHERE ID = :ID");
        $q->bindParam(':name', $name, PDO::PARAM_STR, 50);
        $q->bindParam(':pwd', $pwd, PDO::PARAM_STR, 50);
        $q->bindParam(':ID', $_SESSION['user']['ID'], PDO::PARAM_INT);
        $q->execute();
        $hikes = $q->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["user"]["name"] = $name;
        header("Location: /index.php?message=modifySuccess");
        exit;
    } catch(Exception $e) {
        header("Location: /index.php?message=errorModify");
        exit;
    }
}
?>