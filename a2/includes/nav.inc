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
                    <option value="pets.php">Discover Pets</option>
                    <option value="add.php">Add a Pet</option>
                    <option value="gallery.php">Gallery</option>
                </select>
            </form>
        </div>
    </nav>