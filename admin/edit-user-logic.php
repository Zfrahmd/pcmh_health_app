<?php
require "config/database.php";

if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
if(isset($_POST['submit'])){
    //get updated form data
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = (filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $new_password = filter_var($_POST['newepassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $header_string = 'admin/edit-user.php?id=' . strval($id);

    //check for valid input, redirect back to edit-user on error
    if(!$firstname){
        $_SESSION['edit-user-data'] = 'Please enter your First Name';
    }elseif(!$lastname){
        $_SESSION['edit-user-data'] = 'Please enter your Last Name';
    }elseif(!$email){
        $_SESSION['edit-user-data'] = 'Please enter your Email';
    }elseif(!($is_admin == 1 || $is_admin == 0 )){
        $_SESSION['edit-user-data'] = 'Please select user role';
    }elseif(strlen($new_password)<8 || strlen($confirmpassword)<8){
        $_SESSION['edit-user-data'] = 'Password should be 8+ characters';
    }else{
        if($new_password !== $confirmpassword){
            $_SESSION['edit-user-data']="Passwords donot match";
        }
    }
    // redirect back to edit-user on error
    if(isset($_SESSION['edit-user-data'])){
        // pass data back to edit user page
        $_SESSION['edit-user-data'] = $_POST;
        header("location: " . ROOT_URL . $header_string);
        die();
    }else{
        $hashed_password = password_hash($new_password,PASSWORD_DEFAULT);

        //update user
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email',is_admin='$is_admin',password='$hashed_password' WHERE id= '$id' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-user-fail'] = 'Failed to update user';

        }else{
            $_SESSION['edit-user-success'] = "User $firstname $lastname updated successfully";

        }
    }

}
header("location: " . ROOT_URL . "admin/manage-users.php");
die();
?>