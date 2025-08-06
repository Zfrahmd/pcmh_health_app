<?php 
include 'partials/header.php';

//fetch 9post


if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query="SELECT * FROM posts WHERE id='$id'";
    $result=mysqli_query($connection,$query);
    $post=mysqli_fetch_assoc($result);
    $author_id=$post['author_id'];
    $author_query="SELECT * FROM users WHERE id=$author_id";
    $author_result=mysqli_query($connection,$author_query);
    $author=mysqli_fetch_assoc($author_result);
        
    $category_id = $post['category_id'];
    $categorical_posts_query = "SELECT posts.*
    FROM posts
    JOIN categories ON posts.category_id = categories.id
    WHERE categories.id = '$category_id' LIMIT 8";
    $categorical_posts=mysqli_query($connection,$categorical_posts_query);

}else{
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}



?>
<section class="main-content mt-5">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="post post-single">
                    <div class="post-header">
                        <h1 class="title mt-0 mb-3"><?=$post['title']?></h1>
                        <ul class="meta list-inline mb-4">
                            <li class="list-inline-item"><img class="post-author-img" src="./images/<?= $author['avatar'] ?>" class="author" alt="author"/><?= "{$author['firstname']} {$author['lastname']}" ?></li>
                            <li class="list-inline-item"><?=date("M d, Y -H:i" , strtotime($post['date_time']))?></li>
                        </ul>
                    </div>
                    <div class="featured-image">
                        <?php  if(!empty($post['thumbnail'])) : ?>
                            <img src="./images/<?=$post['thumbnail']?>">
                        <?php endif ?>
                    </div>
                    <div class="post-content clearfix mb-5">
                        <p><?=$post['body']?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget rounded">
                        <div class="widget-header text-center mt-2">
                            <h3 class="widget-title">More Articles</h3>
                        </div>
                        <div class="widget-content mb-5">
                            <?php while ($post = mysqli_fetch_assoc($categorical_posts)) : ?>
                                <div class="post post-list-sm circle mt-4">
                                    <div class="thumb circle">
                                        <a href='<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>'>
                                            <div class="inner">
                                                <img src="./images/<?= $author['avatar'] ?>" alt="<?= $post['title'] ?>" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href='<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>'><?= $post['title'] ?></a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item"><?=date("M d, Y -H:i" , strtotime($post['date_time']))?></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>		
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>








    <?php
include './partials/footer.php';
?>