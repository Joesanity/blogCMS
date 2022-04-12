<form action="" method="post">

    <div class="form-group">
        <label for="cat-update">Update Category</label>
        <?php

        if (isset($_GET['update'])) {
            $cat_id_update = $_GET['update'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id_update ";
            $select_categories_update = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_update)) {
                $cat_id_update = $row['cat_id'];
                $cat_title = $row['cat_title'];
            } ?>
            <input value="<?php if (isset($cat_title)) {
                                echo $cat_title;
                            } ?>" id="cat-update" type="text" class="form-control" name="cat_title">
        <?php } ?>

        
        
        <?php

        if (isset($_POST['updateCategory'])) {


            $cat_update_id = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$cat_update_id}' WHERE cat_id = {$cat_id} ";

            $update = mysqli_query($connection, $query);

            if (!$update) {
                die("No data to delete!" . mysqli_error($connection));
            }

            header("Location: categories.php");
            exit;
        } ?>


    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updateCategory" value="Update Category">
    </div>

</form>