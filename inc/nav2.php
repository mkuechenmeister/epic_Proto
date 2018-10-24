<nav class="top">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="upload.php">Upload</a></li>
        <li><a href="gallery.php">Gallerie</a></li>
        <li>
            <form action="helper/logout.php" method="post">
            <button class="anchor" type="submit" name="submit">Logout</button></>
            </form>
        </li>
        <li class="right"><?=$_SESSION['firstName']." ".$_SESSION['lastName'];?></li>

    </ul>
</nav>