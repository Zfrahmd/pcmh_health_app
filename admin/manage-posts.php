<?php
include "partials/header.php";

// fetch curretn user-id from session
$current_user_id=$_SESSION['user-id'];


// fetch user-specific posts
$user_specific_query="SELECT id,title,category_id FROM posts WHERE author_id='$current_user_id' ORDER BY id DESC";
$user_specific_posts = mysqli_query($connection,$user_specific_query);


//fetch all posts for admin
$all_posts_query="SELECT id,title,category_id FROM posts ORDER BY id DESC";
$all_posts = mysqli_query($connection,$all_posts_query);

// fetch user from user session id
$user_id = $_SESSION['user-id'];
$user_query="SELECT * FROM users WHERE id='$user_id'";
$user_result=mysqli_query($connection, $user_query);
$user=mysqli_fetch_assoc($user_result);

$articles = null;

 if (isset($_SESSION['user_is_admin'])) {
    $articles = $all_posts;
 } else {
    $articles = $user_specific_posts;
 }


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
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['edit-post'];
                unset($_SESSION['edit-post']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php elseif(isset($_SESSION['edit-post-success'])): ?>
        <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['edit-post-success'];
                unset($_SESSION['edit-post-success']); 
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
                <h2>Manage Articles/ FAQs</h2>
                <div class="fixed-head-table">
                    <table>
                    <?php if (((mysqli_num_rows($articles)) > 0 && isset($_SESSION['user_is_admin'])) || (mysqli_num_rows($articles) > 0 && !isset($_SESSION['user_is_admin']))): ?>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th colspan='2' class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($post = mysqli_fetch_assoc($articles)) : ?>
                                <!-- get  category title of each post  from category table -->
                                <?php
                                    $category_id=$post['category_id'];
                                    $category_query="SELECT title FROM categories WHERE id='$category_id'";
                                    $category_result=mysqli_query($connection,$category_query);
                                    $category=mysqli_fetch_assoc($category_result);
                                ?>
                            <tr>
                                <td><?= substr($post['title'], 0, 50) ?>...</td>
                                <?php  if(isset($category['title'])) : ?>
                                    <td><?=$category['title']?></td>
                                <?php else: ?>
                                    <td>Unassigned</td>
                                <?php endif ?>
                                <td class="text-center"><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Edit</a></td>
                                <td class="text-center"><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>&nbsp;Delete</a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    <?php else :?>
                        <div class="alert alert__message error"><?= "No posts found" ?></div>
                    <?php endif?>
                    </table>
                </div>
            </main>
        </div>
  </div>
</div>
    


<?php
include "../partials/footer.php";
?>