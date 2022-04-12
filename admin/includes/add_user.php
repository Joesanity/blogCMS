<?php
if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
    $query .= "VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','temp value','{$user_role}') ";

    $querySend = mysqli_query($connection, $query);

    queryCheck($querySend);

    echo "User Created: " . "<a href='users.php'>View Users</a>";
}
?>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="post_status">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for=''>Role</label>
        <select class="form-control" name="user_role" id="">

            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>

        </select>
    </div>

    <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" name="user_password" id="" class="form-control"></input>
    </div>

    <div class="form-group">

        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">

    </div>



</form>