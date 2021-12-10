<nav class ="topnav" id="topnav">
    <?php if(!isset($_SESSION["user"])): ?>
        <div>
        <a href="/index.php">Home</a>
        <a href="/php/login.php">Login</a>
        <a href="/php/subscription.php">Subscription</a>
        </div>
        <button class="icon" onclick="toggle()"><i class="fa fa-bars"></i></button>
        <script>
        function toggle() {
        const nav = document.getElementById("topnav");
        nav.className === "topnav" ? nav.className += " responsive" : nav.className = "topnav";
        }
        </script>
    <?php else: ?>
        <div>
        <a href="/index.php">Home</a>
        <a href="/php/profile.php">Profile</a>
        <a href="/php/logout.php">Logout</a>
        <a href="/php/create.php" class="add buttonhikes" id="newhikebutton">Add New Hike</a>
        </div>
        <button class="icon" onclick="toggle()"><i class="fa fa-bars"></i></button>

        <script>
        function toggle() {
        const nav = document.getElementById("topnav");
        nav.className === "topnav" ? nav.className += " responsive" : nav.className = "topnav";
        }
        </script>
        
    <?php endif; ?>

</nav>