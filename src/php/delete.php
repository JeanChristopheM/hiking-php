<?php
    require_once('./connexion.php');
    if(isset($_GET['ID']) && !empty($_GET['ID'])) {
        $ID = $_GET['ID'];
        try {
            $q = $db -> prepare("DELETE FROM hikes WHERE ID = $ID");
            $q->execute();
            $hike = $q->fetch(PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    header("Location: ../index.php");
?>