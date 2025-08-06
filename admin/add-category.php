<?php
include "partials/header.php";
if(!isset($_SESSION['user_is_admin'])){
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
}
$title = $_SESSION["add-category-data"]['title'] ?? null;
$description = $_SESSION["add-category-data"]['description'] ?? null;

unset($_SESSION['add-category-data'])
?>

<section class="form__section">

    <div class="container form__section-container">
        <h2 class="text-center mt-5">Add Category</h2>
        <?php if(isset($_SESSION['add-category'])): ?>
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['add-category'];
                unset($_SESSION['add-category']);
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" class="centered_form" enctype="multipart/form-data" method="POST">
            <input class="form-control" type="text" name="title" value ="<?= $title ?>" placeholder="Title">
            <textarea  rows="4" name="description" value = "<?=$description?>"placeholder="Description"></textarea>

            <button class="btn btn-primary" name="submit" type="submit">Add Category</button>
        </form>
    </div>


    

</section>

<?php
include "../partials/footer.php";
?>
