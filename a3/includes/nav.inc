<nav>
        <a href="index.php" target="_blank">
            <img src="images/logo.png" alt="logo" class="logo">
        </a>

        <img src="images/search.png" alt="search" class="search">

        <div class="navSearch">
            <input type="text" placeholder="Search">
        </div> 

        <div class="navMenu">
            <form>
                <select id="navMenu" onchange=doMenu();>
                    <option value="">Select an Option...</option>
                    <option value="index.php">Home</option>
                    <option value="pets.php">Pets</option>
                    <option value="gallery.php">Gallery</option>
                    <option value="register.php">Register</option>
                    <option value="login.php">Login</option>
                    <option value="add.php">Add</option>
                </select>
            </form>
        </div>
    </nav>