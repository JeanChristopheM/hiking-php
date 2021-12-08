<?php
    require_once('./connexion.php');
    if(isset($_GET['ID']) && !empty($_GET['ID'])) {
        $ID = $_GET['ID'];
        try {
            $q = $db -> prepare("DELETE FROM hikes WHERE ID = $ID");
            $q->execute();
            $count = $q->rowCount();
            if ($count > 0) {
                header("Location: ../index.php?message=deleteSuccess");
            } else {
                header("Location: ../index.php?message=deleteFailed");
            }
        } catch(Exception $e) {
            header("Location: ../index.php?message=deleteFailed");
        }
    }
?>