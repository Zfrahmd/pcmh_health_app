<?php
include "partials/header.php";

if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT id,firstname,lastname,email,is_admin FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}else{
    header('location: ' . ROOT_URL . 'admin/manage-users.php');
}
?>
<?php if(isset($_SESSION['edit-user-data'])): ?>
    <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
        <p>
            <?=$_SESSION['edit-user-data'];
            unset($_SESSION['edit-user-data']); 
            ?>
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<section class="form__section">
    <div class="container form__section-container">
        <h2 class="text-center mt-5">Edit User</h2>

        <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" class="centered_form" enctype="multipart/form-data" method="POST">
            <input class="form-control" type="hidden" name ="id" value="<?= $user['id'] ?>">
            <input class="form-control" type="text" name ="firstname" value="<?= $user['firstname'] ?>" placeholder="First Name">
            <input class="form-control" type="text" name ="lastname"  value="<?= $user['lastname'] ?>" placeholder="Last Name">
            <input class="form-control" type="email"    name ="email" value ="<?= $user['email']?>" placeholder="email">
            <input class="form-control" type="password" name ="newepassword"  value =""  placeholder="New Password">
            <input class="form-control" type="password" name ="confirmpassword" value =""  placeholder="New Password Confirm">

            <select name="userrole">
				<option value="0">Author</option>
				<option <?= $user['is_admin'] ? 'selected' : '' ?> value="1">Admin</option>
			</select>

            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name ='avatar' id="avatar">
            </div>
            <button class="btn btn-primary" name="submit" type="submit">Update User</button>
        </form>
    </div>
</section>



<?php
include "../partials/footer.php";
?>