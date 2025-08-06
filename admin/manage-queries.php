<?php
include "partials/header.php";


$current_admin_id = $_SESSION['user-id'];
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
$query="SELECT id,name,email,message FROM queries";
$queries = mysqli_query($connection,$query);
?>


    <?php
        if(isset($_SESSION['add-category-success'])): 
        ?> 
            <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['add-category-success'];
                    unset($_SESSION['add-category-success']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            elseif(isset($_SESSION['delete-query'])): 
        ?> 
            <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['delete-query'];
                    unset($_SESSION['delete-query']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            elseif(isset($_SESSION['delete-query-success'])): 
        ?> 
            <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['delete-query-success'];
                    unset($_SESSION['delete-query-success']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
            <?php if(isset($_SESSION['delete-query-success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
                    <p>
                        <?=$_SESSION['delete-query-success'];
                        unset($_SESSION['delete-query-success']); 
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
                <h2>Manage Queries</h2>
                <?php if(mysqli_num_rows($queries)>0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message Body</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($query=mysqli_fetch_assoc($queries)): ?>
                        <tr>
                            <td><?= $query["name"] ?></td>
                            <td><?= $query["email"]  ?> </td>
                            <td><?= $query["message"]  ?> </td>
                            <td class="text-center"><a href="<?= ROOT_URL ?>admin/delete-query.php?id=<?= $query['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                        </tr>
                        <?php endwhile ?>
    
                    </tbody>
                </table>
                <?php else : ?>
                    <div class="alert__message error">No queries were found</div>
                    <?php endif?>
            </main>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>
    