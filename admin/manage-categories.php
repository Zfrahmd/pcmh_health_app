<?php
include "partials/header.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
//fetch categories from database
$query = "SELECT * FROM categories ORDER BY title";
$categories=mysqli_query($connection,$query)

?>


    <?php if(isset($_SESSION['add-category-success'])) : ?>  
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?= $_SESSION['add-category-success'];
                unset($_SESSION['add-category-success']);
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        elseif(isset($_SESSION['add-category'])): ?> 
            <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif?>
    <?php if(isset($_SESSION['edit-category-success'])) : ?>  
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?= $_SESSION['edit-category-success'];
                unset($_SESSION['edit-category-success']);
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
    <?php
        elseif(isset($_SESSION['edit-category'])): ?> 
            <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php endif?>
    <?php if(isset($_SESSION['delete-category-success'])) : ?>  
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?= $_SESSION['delete-category-success'];
                unset($_SESSION['delete-category-success']);
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif?> 

<div class="container">
<div class="row my-5">
    <?php include "./partials/sidebar.php"; ?>
    <div class="col-sm-12 col-md-12 col-lg-9">
            <main class="my-3">
                <h2>Manage Categories</h2>
                <?php if(mysqli_num_rows($categories)>0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th colspan='2' class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($category=mysqli_fetch_assoc($categories)) : ?>
                        <tr>
                            <td><?=$category['title']?></td>
                            <td class="text-center"><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?=$category['id']?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Edit</a></td>
                            <td class="text-center"><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?=$category['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                <?php else : ?>
                    <div class="alert__message error">
                            No categories found
                    </div>
                <?php endif?>
                </table>
            </main>
        </div>
    </div>
</div>


<?php
include "../partials/footer.php";
?>