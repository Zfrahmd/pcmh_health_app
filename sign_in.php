<?php 

?>

<?php 

include './partials/header.php';
// include 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);

?>

<section class="section" id="admin">
    <div class="section-title">User Login</div>
    <?php
        if(isset($_SESSION['signup-success'])): 
        ?> 
            <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif(isset($_SESSION['signin'])): ?>
            <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
                <p>
                    <?=$_SESSION['signin'];
                    unset($_SESSION['signin']); 
                    ?>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" class="centered_form" method="POST">
            <h3>Login</h3>
            <input class="form-control" type="text" name="username_email" value='<?= $username_email ?>' placeholder="Username" required>
            <input class="form-control" type="password" name="password" value='<?= $password ?>' placeholder=" Password" required>
            <button class="btn btn-primary" name="submit" type="submit">Sign in</button>
        </form>
</section>

<?php
include './partials/footer.php';
?>