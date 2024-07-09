<?php
include("templates/header.php");
?>
<style>
    .popup {
        display: none;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid #888;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        z-index: 1000;
        background: white;
        padding: 20px;
        text-align: center;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .popup button {
        margin: 5px;
    }
</style>
<script>
    function showPopup(id) {
        document.getElementById('popup').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('confirmDeleteButton').setAttribute('data-id', id);
    }

    function hidePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }

    function confirmDelete() {
        const id = document.getElementById('confirmDeleteButton').getAttribute('data-id');
        console.log(id);
        window.location.href = "delete.php?id=" + id;

    }
</script>
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