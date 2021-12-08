<nav class ="topnav">
            <li><a href="/index.php">Home</a></li>
            <?php if(!isset($_SESSION["user"])): ?>
                <li><a href="/php/login.php">Login</a></li>
                <li><a href="/php/subscription.php">Subscription</a></li>
            <?php else: ?>
                <li><a href="/php/profile.php">Profile</a></li>
                <li><a href="/php/logout.php">Logout</a></li>
            <?php endif; ?>
</nav>