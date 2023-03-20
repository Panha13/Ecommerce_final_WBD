<nav class="d-flex justify-content-between align-items-center">
    <ul>
        <li><a href="index.php?p=home">Home</a></li>
        <li><a href="index.php?p=shop">Shop</a></li>
        <li><a href="index.php?p=about-us">About Us</a></li>
        <li><a href="index.php?p=contact-us">Contact</a></li>
    </ul>
    <ul>
        <?php
        if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
        ?>
            <li><a href="index.php?p=logout" onclick="change()"><span id="text">Logout</span> <i class="fa fa-sign-out"></i></a></li>
        <?php } else { ?>
            <li><a href="index.php?p=login-register">Login <i class="fa fa-sign-in"></i></a></li>
        <?php } ?>
    </ul>
</nav>
<script>
    function change() {
        document.getElementById('text').textContent = "Login";
    }
</script>