<?php
include "partials/header.php";

// fetch categories from database
$query = "SELECT * FROM categories";
$categories=mysqli_query($connection,$query);

// get back form data if form was invalid

$title= $_SESSION['add-post-data']['title'] ?? null;
$body= $_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
?>



<section class="form__section">
    <div class="container form__section-container">
        <h2 class="text-center mt-5">Add New Article / FAQs</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=
                $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" class="centered_form" enctype="multipart/form-data" method="POST">
            <input class="form-control" type="text" name="title" value ="<?= $title ?>" placeholder="Title">
            <select class="form-select form-select-sm" name="category_id">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile?>
            </select>
            <?php if(isset($_SESSION["user_is_admin"])) : ?>
                <div class="form-check my-4">
                    <input class="form-check-input" name="is_featured" value='1' type="checkbox" value="" id="checkDefault">
                    <label class="form-check-label mx-2 my-1" for="checkDefault">
                        Featured
                    </label>
                </div>
            <?php endif ?>
            <textarea  rows="8" name="body"  placeholder="Body"><?=$body?></textarea>

            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button class="btn btn-primary" name="submit" type="submit">Add Post</button>
        </form>
    </div>
</section>



<?php
include '../partials/footer.php';
?>
