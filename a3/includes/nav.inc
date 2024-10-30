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
        
        <?php if (isset($_SESSION['username'])): ?>
            <!-- Show 'Add More' link and 'Logout' when user is logged in -->
            <a class="nav-link" href="add.php">Add More</a>
            <a class="nav-link" href="logout.php">Logout</a>
        <?php else: ?>
            <!-- Show 'Register' and 'Login' when user is not logged in -->
            <a class="nav-link" href="register.php">Register</a>
            <a class="nav-link" href="login.php">Login</a>
        <?php endif; ?>
    </div>
</nav>
