<?php
include "partials/header.php";


$current_admin_id = $_SESSION['user-id'];
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
$query="SELECT id,firstname,lastname,email,is_admin FROM users WHERE NOT id='$current_admin_id'";
$users=mysqli_query($connection,$query);
?>

    <?php
        if(isset($_SESSION['add-user-success'])): 
        ?> 
            <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
            
            </div>
        <?php
            elseif(isset($_SESSION['delete-user'])): 
        ?> 
            <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>
            
            </div>
        <?php
            elseif(isset($_SESSION['delete-user-success'])): 
        ?> 
            <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
            
            </div>
        <?php endif ?>
    
        <?php if(isset($_SESSION['edit-user-success'])): ?>
            <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?=$_SESSION['edit-user-success'];
                    unset($_SESSION['edit-user-success']); 
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif(isset($_SESSION['edit-user-fail'])): ?>

            <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?=$_SESSION['edit-user-fail'];
                    unset($_SESSION['edit-user-fail']); 
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif ?>
<div class="container">
  <div class="row my-5">
        <?php include "./partials/sidebar.php"; ?>
        <div class="col-sm-12 col-md-12 col-lg-9">
            <main class="my-3">
                <h2>Manage Users</h2>
                <div class="fixed-head-table">
                    <?php if(mysqli_num_rows($users)>0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Is Admin?</th>
                                <th colspan='2' class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($user=mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td><?= $user["firstname"] . " " . $user['lastname'] ?></td>
                                <td><?= $user["email"]  ?> </td>
                                <td class="text-center"><?= $user["is_admin"] ? 'Yes' : 'No'  ?></td>
                                <td class="text-center"><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Edit</a></td>
                                <td class="text-center"><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                            </tr>
                            <?php endwhile ?>
        
                        </tbody>
                    </table>
                    <?php else : ?>
                        <div class="alert__message error">No users found</div>
                    <?php endif?>
                </div>
            </main>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>
    