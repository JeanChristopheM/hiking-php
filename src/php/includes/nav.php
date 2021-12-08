<nav class ="topnav">
    <?php if(!isset($_SESSION["user"])): ?>
        <div>
            <li><a href="/index.php">Home</a></li>
            <li><a href="/php/login.php">Login</a></li>
            <li><a href="/php/subscription.php">Subscription</a></li>
        </div>
    <?php else: ?>
        <div>
            <li><a href="/index.php">Home</a></li>
            <li><a href="/php/profile.php">Profile</a></li>
            <li><a href="/php/logout.php">Logout</a></li>
        </div>
        <li><a href="/php/create.php" class="buttonhikes">Add New Hike</a></li>
    <?php endif; ?>
</nav>