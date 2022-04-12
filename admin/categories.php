<?php include "includes/admin_header.php"; ?>

<!-- Navigation -->
<?php include "includes/admin_nav.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">
                    Admin Dashboard
                    <small>Author</small>
                </h1>

                <div class="col-xs-6">

                    <?php insertCategories(); ?>

                    <form action="" method="post">

                        <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input id="cat-title" type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>

                    </form>

                    <?php
                    if (isset($_GET['update'])) {
                        $cat_id = $_GET['update'];

                        include "includes/update_categories.php";
                    }?>

                </div>

                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //Get Categories Query
                            getCategoriesQuery();
                            //Delete Categories Query
                            deleteCategories();
                            ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>