<?php
include("templates/header.php");
?>
<style>

</style>

<div class="posts-list w-100 p-5">
    <?php
    if (isset($_SESSION["create"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
        </div>
    <?php
        unset($_SESSION["create"]);
    }
    ?>
    <?php
    if (isset($_SESSION["update"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["update"];
            ?>
        </div>
    <?php
        unset($_SESSION["update"]);
    }
    ?>
    <?php
    if (isset($_SESSION["delete"])) {
    ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
        </div>
    <?php
        unset($_SESSION["delete"]);
    }
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Publication Date</th>
                <th style="width:15%;">Title</th>
                <th style="width:45%;">Article</th>
                <th style="width:25%;">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($posts as $data) : ?>
                <tr>
                    <td><?php echo $data["date"] ?></td>
                    <td><?php echo $data["title"] ?></td>
                    <td><?php echo $data["summary"] ?></td>
                    <td>
                        <a class="btn btn-info" href="view.php?id=<?php echo $data["id"] ?>">View</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"] ?>">Edit</a>
                        <a class="btn btn-danger" href="#" onclick="showPopup(<?php echo $data["id"] ?>)">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<div id="overlay" class="overlay"></div>

<!-- Pop-up -->
<div id="popup" class="popup">
    <p>Are you sure you want to delete this item?</p>
    <button onclick="confirmDelete()" id="confirmDeleteButton">Yes</button>
    <button onclick="hidePopup()">No</button>
</div>
<?php
include("templates/footer.php");
?>