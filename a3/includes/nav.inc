<nav>
    <a href="index.php" target="_blank">
        <img src="images/logo.png" alt="logo" class="logo">
    </a>

    <img src="images/search.png" alt="search" class="search">

    <div class="navSearch">
        <input type="text" placeholder="Search">
    </div> 

    <div class="navMenu">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="pets.php">Pets</a>
        <a class="nav-link" href="gallery.php">Gallery</a>
        <a class="nav-link" href="register.php">Register</a>
        
        <?php if (isset($_SESSION['username'])): ?>
            <a class="nav-link" href="logout.php">Logout</a>
        <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
        <?php endif; ?>

        <a class="nav-link" href="add.php">Add</a>
    </div>
</nav>
