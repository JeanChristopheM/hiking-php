<?php 
session_start(); 

?>
<?php
    require_once('./php/connexion.php');
    try {
        $q = $db -> prepare("SELECT * FROM hikes");
        $q->execute();
        $hikes = $q->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        echo $e->getMessage();
        exit;
    }
?>

<?php include './php/includes/doctype.php'; ?>
<body>
    <?php include './php/includes/nav.php'; ?>
    <header class="header">
        
        <h1 class="mainTitle">Hike-App 🥾</h1>
    </header>
    
        <?php
            if(!isset($_SESSION['user'])) {
                include './php/includes/loginForm.php';
            } else {
                echo '<main class="app">';
                foreach ($hikes as $hike) {
                    $message='';
                    if($hike['createdAt'] === $hike['updatedAt']) {
                        $message = 'Created the '.$formatDate($hike['createdAt']).'';
                    } else {
                        $message = 'Updated the '.$formatDate($hike['updatedAt']).'';
                    }
                    echo '
                    <div class="card">
                        <p class="name" style="font-weight:bold;">'.$hike['name'].'</p>
                        <div class="difficulty">
                            <p class="card__label">Difficulty</p>
                            <p class="card__data">'.$difficulties[$hike['difficulty']].'</p>
                        </div>
                        <div class="distance">
                            <p class="card__label">Distance</p>
                            <p class="card__data">'.$hike['distance'].'km</p>
                        </div>
                        <div class="duration">
                            <p class="card__label">Duration</p>
                            <p class="card__data">'.$hike['duration'].'</p>
                        </div>
                        <div class="elevation">
                            <p class="card__label">Elevation +</p>
                            <p class="card__data">'.$hike['elevation'].'m</p>
                        </div>
                        <div class="created">
                            <p>'.$message.'</p>
                        </div>
                        <p class="delete"><a class="abutton delete" id='.$hike['ID'].'>DELETE</a></p>
                        <p class="modify"><a class="abutton" href=php/update.php?ID='.$hike['ID'].' id='.$hike['ID'].'>MODIFY</a></p>
                    </div>
                    ';
                }
                echo '</main>';
            };
        
        
        ?>
    
    <?php 
        if(isset($_GET['message']) && !empty($_GET['message'])) {
            include './php/includes/message.php';
        }
    ?>
    <?php include './php/includes/modal.php'; ?>
    <script>
        window.addEventListener('click', (e) => {
            const modal = document.querySelector('.modal');
            if(e.target.classList.contains('delete') && e.target.classList.contains('abutton')) {
                modal.classList.remove('hidden');
                const yes = document.querySelector('#modalYes');
                yes.href = `php/delete.php?ID=${e.target.id}`;
            }
            if(e.target.id == "modalNo") {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
