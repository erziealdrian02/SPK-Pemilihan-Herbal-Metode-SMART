<nav class="navTop row">
    <div class="menuIcon fl"><span class="fa fa-bars"></span></div>
    <div class="account fr">
        <div class="name has-submenu">
            <?php echo $_SESSION['nama']; ?><span class="fa fa-angle-down"></span>
        </div>
        <ul class="accountLinks submenu">
            <li><a href="./proses/proses_logout.php">Log out<span class="fa fa-sign-out fr"></span></a></li>
        </ul>
    </div>
</nav>