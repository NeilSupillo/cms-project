<?php
include("templates/header.php");
?>
<div class="post-list mt-5">
    <div class="container">

        <h2><?php echo $post["title"]; ?></h2>
        <p><?php echo $post["content"]; ?></p>
        <p><small><?php echo $post["date"]; ?></small></p>
    </div>

</div>
</div>
<div class="footer bg-dark p-4 mt-4">
    <a href="../admin/index.php" class="text-light">Admin Panel</a>
</div>
<?php
include("templates/footer.php");
?>