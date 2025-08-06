<?php
include "config/database.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    // First update all posts that reference this category
    $update_posts_query = "UPDATE posts SET category_id = NULL WHERE category_id = $id";
    if (!mysqli_query($connection, $update_posts_query)) {
        die("Error updating posts: " . mysqli_error($connection));
    }

    // Then delete the category
    $delete_category_query = "DELETE FROM categories WHERE id = $id";
    if (mysqli_query($connection, $delete_category_query)) {
        header("location: " . ROOT_URL . "admin/manage-categories.php");
        $_SESSION['delete-category-success']="Category was deleted successfuly";
    } else {
        die("Error deleting category: " . mysqli_error($connection));
    }

}else{
    header("location: " . ROOT_URL . "admin/manage-categories.php");
    die();
}
?>
