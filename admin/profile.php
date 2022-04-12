<?php include "includes/admin_header.php"; ?>


<?php
if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $querySend = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($querySend)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

    }

}
?>

<?php

if (isset($_POST['edit_usersend'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // $query = "UPDATE users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
    // $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','temp value','{$user_role}') ";

    // $querySend = mysqli_query($connection, $query);

    // queryCheck($querySend);

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}' ";

    $querySend = mysqli_query($connection, $query);

    queryCheck($querySend);

    header('Location: profile.php');
}

?>

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


                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Firstname</label>
                        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                    </div>

                    <div class="form-group">
                        <label for="title">Lastname</label>
                        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                    </div>

                    <div class="form-group">
                        <label for="post_status">Username</label>
                        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                    </div>

                    <div class="form-group">
                        <label for=''>Role</label>
                        <select class="form-control" name="user_role" id="">

                            <option value="<?php echo "$user_role"; ?>"><?php echo "$user_role"; ?></option>
                            <option value="subscriber">Subscriber</option>
                            <option value="admin">Admin</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="post_tags">Email</label>
                        <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="user_email">
                    </div>

                    <div class="form-group">
                        <label for="post_content">Password</label>
                        <input value="<?php echo $user_password; ?>" type="password" name="user_password" id="" class="form-control"></input>
                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-primary" name="edit_usersend" value="Update Profile">

                    </div>



                </form>

            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>