<footer>
    &copy; Copyright s3969368. All Rights Reserved | Designed for Pets Victoria
    <br>
    <?php if (isset($_SESSION['username'])): ?>
        Welcome, <a href="user.php"><?= htmlspecialchars($_SESSION['username']) ?></a>
    <?php else: ?>
        Welcome, guest!
    <?php endif; ?>
</footer>
</body>
</html>