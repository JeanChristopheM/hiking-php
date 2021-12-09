<?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location: /index.php');
        exit;
    }
?>

<?php include './php/includes/doctype.php'; ?>

<body>
    <?php include './includes/nav.php'; ?>
    <header class="header">
        <h1 class="title">Hello <?= $_SESSION['user']["name"] ?></h1>
    </header>
    <main class="info">
        <h2>Your profile</h2>
        <?php if(!isset($_POST['edit'])): ?>
            <ul>
                <li>
                    <h3>Username : </h3>
                    <p><?=$_SESSION['user']["name"]?></p>
                </li>
                <li>
                    <h3>Password : </h3>
                    <p>**********</p>
                </li>
                <li>
                    <h3>Mail : </h3>
                    <p><?= $_SESSION['user']["email"] ?></p>
                </li>
                <li class="form_controls">
                    <form method="post">
                        <input type="hidden" name="edit" value="true" />
                        <button class="abutton">Edit</button>
                    </form>
                    <button type="button" class="abutton delete">Delete</button>
                </li>
            </ul>
        <?php else: ?>
            <form method="post" action="/php/modifyUser.php">
                <ul>
                    <li>
                        <h3>Username : </h3>
                        <p><input type="text" placeholder="<?=$_SESSION['user']["name"];?>"></p>
                    </li>
                    <li>
                        <h3>Password : </h3>
                        <p><input type="text" placeholder="********" /></p>
                    </li>
                    <li>
                        <h3>Mail : </h3>
                        <p><?= $_SESSION['user']["email"] ?></p>
                    </li>
                    <li class="form_controls">
                        <button class="abutton">Submit</button>
                    </li>
                </ul>
            </form>
        <?php endif; ?>
    </main>
    <?php include './includes/modal.php'; ?>
    <script>
        window.addEventListener('click', (e) => {
            const modal = document.querySelector('.modal');
            if(e.target.classList.contains('delete') && e.target.classList.contains('abutton')) {
                modal.classList.remove('hidden');
                const yes = document.querySelector('#modalYes');
                yes.href = `./deleteUser.php`;
            }
            if(e.target.id == "modalNo") {
                modal.classList.add('hidden');
            }
        });
    </script>
</body>
</html>