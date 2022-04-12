<?php

function insertCategories()
{

    global $connection;
    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {

            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            $create_cat = mysqli_query($connection, $query);

            if (!$create_cat) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function getCategoriesQuery()
{

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
        echo "</tr>";
    }
}

function deleteCategories()
{

    //Query To Delete A Category
    global $connection;
    if (isset($_GET['delete'])) {

        $cat_delete_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$cat_delete_id}";

        $delete = mysqli_query($connection, $query);

        if (!$delete) {
            die("No data to delete!");
        }

        header("Location: categories.php");
        exit;
    }
}

function getPosts()
{
    global $connection;
    $query = "SELECT * FROM posts";
    $querySend = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($querySend)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_id = $row['post_id'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_update = mysqli_query($connection, $query);
    
        queryCheck($select_categories_update);
    
        while ($row = mysqli_fetch_assoc($select_categories_update)) {
            $cat_id_update = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td><img width='100' class='img-responsive' src='../images/{$post_image}' alt='No Image'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function queryCheck($querySend)
{

    global $connection;

    if (!$querySend) {
        die("Query Failed" . mysqli_error($connection));
    }
}

function deletePost()
{

    global $connection;

    if (isset($_GET['delete'])) {

        $delete_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: posts.php");
        exit;
    }
}

function deleteComment()
{

    global $connection;

    if (isset($_GET['delete'])) {

        $delete_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: comments.php");
        exit;
    }
}

function denyComment()
{

    global $connection;

    if (isset($_GET['unapprove'])) {

        $delete_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $delete_comment_id ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: comments.php");
        exit;
    }
}

function approveComment()
{

    global $connection;

    if (isset($_GET['approve'])) {

        $delete_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $delete_comment_id ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: comments.php");
        exit;
    }
}

function denyUser()
{

    global $connection;

    if (isset($_GET['change_to_sub'])) {

        $user_id = $_GET['change_to_sub'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: users.php");
        exit;
    }
}

function approveUser()
{

    global $connection;

    if (isset($_GET['change_to_admin'])) {

        $user_id = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: users.php");
        exit;
    }
}

function selectPostCategory()
{

    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    QueryCheck($select_categories);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id_update = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option id='select' value='{$cat_id_update}'>{$cat_title}</option>";
    }
}

function getEditPosts()
{

    global $post_id;
    global $post_title;
    global $post_author;
    global $post_category_id;
    global $post_date;
    global $post_image;
    global $post_tags;
    global $post_comment;
    global $post_status;
    global $post_content;
    global $connection;
    global $p_id;

    if (isset($_GET['p_id'])) {

        $p_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $p_id ";
    $querySend = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($querySend)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
    }

    if (isset($_POST['edit_post'])) {

        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['select_categories'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_content = mysqli_real_escape_string($connection, $post_content);

        move_uploaded_file($post_image_temp, "../images/$post_image");

        if (empty($post_image)) {

            $query = "SELECT * FROM posts WHERE post_id = $p_id ";
            $select_image = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_image)) {

                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$p_id} ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        echo "Post Updated: " . "<a href='../posts.php'>See Posts</a>";
    }
}

function getComments()
{
    global $connection;
    $query = "SELECT * FROM comments";
    $querySend = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($querySend)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_author}</td>";

        // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        // $select_categories_update = mysqli_query($connection, $query);
    
        // queryCheck($select_categories_update);
    
        // while ($row = mysqli_fetch_assoc($select_categories_update)) {
        //     $cat_id_update = $row['cat_id'];
        //     $cat_title = $row['cat_title'];
        // }

        echo "<td>{$comment_email}</td>";

        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $sendCommentIdQuery = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($sendCommentIdQuery)){

            $post_id = $row['post_id'];
            $post_title = $row['post_title'];

            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";


        }     

        
        echo "<td>{$comment_status}</td>";
        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove=$comment_id'>Deny</a></td>";
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";
    }
}

function getUsers()
{
    global $connection;
    $query = "SELECT * FROM users";
    $querySend = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($querySend)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Set Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Set Sub</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";



    }   
}

function deleteUser()
{

    global $connection;

    if (isset($_GET['delete'])) {

        $delete_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";

        $querySend = mysqli_query($connection, $query);

        queryCheck($querySend);

        header("Location: users.php");
        exit;
    }
}