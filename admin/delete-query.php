<?php
require 'config/database.php';
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],  FILTER_SANITIZE_NUMBER_INT);

    // fetch post fom database
    $query="SELECT * FROM queries WHERE id='$id'";
    $result =mysqli_query($connection,$query);

    //make sure 1 record was fetched from database
    if(mysqli_num_rows($result)==1){
        $post=mysqli_fetch_assoc($result);

        // delete query from  database
        $delete_query_query="DELETE from queries WHERE id='$id' LIMIT 1";
        $delete_query_result=mysqli_query($connection, $delete_query_query);

        if(!mysqli_errno($connection)){
            $_SESSION['delete-query-success']="Query deleted successfully";
        }   
    }

}else{
    header('location: ' . ROOT_URL . 'admin/');
    die();
}


header('location: ' . ROOT_URL . 'admin/');
die();