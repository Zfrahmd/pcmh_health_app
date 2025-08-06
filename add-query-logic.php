<?php
require "config/database.php";

if(isset($_POST['submit'])){
    // $author_id=$_SESSION['user-id'];
    $name =filter_var($_POST['name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email =filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $message =filter_var($_POST['message'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //validate form data
    if(!$name){
        $_SESSION['add-query']="Enter Your Name";
    }elseif(!$email){
        $_SESSION['add-query']="Enter a Valid Email Address";
    }elseif(!$message){
        $_SESSION['add-query']="Describe your issue"; 
    }else{

        // redirect with form data
        if(isset($_SESSION['add-query'])){
            $_SESSION['add-query-data']=$_POST;
            header('location: ' . ROOT_URL . 'add-query.php');
            die();
        }else{
            //insert query into database
            $query="INSERT INTO queries (name, email, message) VALUES ('$name', '$email', '$message')";
            $result=mysqli_query($connection,$query);
            if(mysqli_errno($connection)){
                $_SESSION['add-query']="Failed to add Query";
                header("location: " . ROOT_URL . 'index.php');
                die();
            }else{
                $_SESSION['add-query-success']="Query has been submit successfully";
                header("location: " . ROOT_URL . 'index.php');
                die();

            }
        }
    }
}

header("location: " . ROOT_URL . 'index.php');
die();
?>