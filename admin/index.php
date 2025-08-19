<?php
include "partials/header.php";

// fetch curretn user-id from session
$current_user_id=$_SESSION['user-id'];
$query="SELECT id,title,category_id FROM posts WHERE author_id='$current_user_id' ORDER BY id DESC";
$user_specific_posts = mysqli_query($connection,$query);

//fetch all posts except faqs for admin
$all_posts_query = "SELECT posts.*
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE NOT categories.title = 'faq' ORDER BY id DESC";
$all_posts = mysqli_query($connection,$all_posts_query);

//fetch all categories for admin
$all_categories_query="SELECT * FROM categories ORDER BY id DESC";
$all_categories = mysqli_query($connection,$all_categories_query);

//fetch all queries for admin
$all_queries_query="SELECT * FROM queries ORDER BY id DESC";
$all_queries = mysqli_query($connection,$all_queries_query);


//fetch all users for admin
$all_users_query="SELECT * FROM users ORDER BY id DESC";
$all_users = mysqli_query($connection,$all_users_query);


// fetch user from user session id
$user_id = $_SESSION['user-id'];
$user_query="SELECT * FROM users WHERE id='$user_id'";
$user_result=mysqli_query($connection, $user_query);
$user=mysqli_fetch_assoc($user_result);
?>

    <?php if(isset($_SESSION['signin-success'])): ?>
        
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['signin-success'];
                unset($_SESSION['signin-success']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif(isset($_SESSION['add-post'])): ?>
        
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['add-post'];
                unset($_SESSION['add-post']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php elseif(isset($_SESSION['add-post-success'])): ?>
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['add-post-success'];
                unset($_SESSION['add-post-success']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php elseif(isset($_SESSION['edit-post'])): ?>
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['edit-post'];
                unset($_SESSION['edit-post']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php elseif(isset($_SESSION['edit-post-success'])): ?>
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif(isset($_SESSION['edit-post-success'])): ?>
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
            
<div class="container">
    <div class="row my-5">
        <?php include "./partials/sidebar.php"; ?>
        <div class="col-lg-8">
            <main class="my-3">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card py-1 text-bg-primary">
                            <div class="card-body d-flex">
                                <?php  if(isset($_SESSION['user_is_admin'])) : ?>
                                    <h5 class="card-text text-white mx-2"><?= mysqli_num_rows($all_posts) ?></h5>
                                <?php else : ?>
                                    <h5 class="card-text text-white mx-2"><?= mysqli_num_rows($user_specific_posts) ?></h5>
                                <?php endif ?>
                                <h5 class="fa fa-commenting text-white">&nbsp;</h5> 
                                <h5 class="card-title text-center text-white mx-3">Articles</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card py-1 text-bg-warning">
                            <div class="card-body d-flex">
                                <h5 class="card-text text-black mx-2"><?= mysqli_num_rows($all_categories) ?></h5>
                                <h5 class="fa fa-list-ul text-black">&nbsp;</h5>
                                <h5 class="card-title text-center text-black mx-3">Categories</h5>
                            </div>
                        </div>
                    </div>
                    <?php  if(isset($_SESSION['user_is_admin'])) : ?>
                        <div class="col">
                            <div class="card py-1 text-bg-success">
                                <div class="card-body d-flex">
                                    <h5 class="card-text text-white mx-2"><?= mysqli_num_rows($all_queries) ?></h5>
                                    <h5 class="fa fa-envelope text-white">&nbsp;</h5> 
                                    <h5 class="card-title text-center text-white mx-3">Queries</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card py-1 text-bg-info">
                            <div class="card-body d-flex">
                                <h5 class="card-text text-black mx-2"><?= mysqli_num_rows($all_users) ?></h5>
                                <h5 class="fa fa-users text-black">&nbsp;</h5> 
                                <h5 class="card-title text-center text-black mx-3">Users</h5>
                            </div>
                        </div>
                    <?php endif ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>