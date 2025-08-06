<?php
    if(isset($_SESSION['user-id'])){
        $user_id = $_SESSION['user-id'];
        $user_query="SELECT * FROM users WHERE id='$user_id'";
        $user_result=mysqli_query($connection, $user_query);
        $user=mysqli_fetch_assoc($user_result);
    } 
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <div class="logo mx-5 d-flex justify-content-center">
                <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                    <a href="<?= ROOT_URL ?>child.php">ODCH</a>
                <?php else : ?>
                    <a href="<?= ROOT_URL ?>index.php">PCMH</a>
                <?php endif ?>
            </div>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About ODCH
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>about-odch.php">About Us</a></li>
                            <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>photos-odch.php">Photos</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>about-pcmh.php">About the Hospital</a></li>
                            <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>history&hreritage-pcmh.php">History and Heritage</a></li>
                            <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>mission&vision-pcmh.php">Mission and Vision</a></li>
                        </ul>
                    </li>
                <?php endif ?>
                <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>#maternal">Maternal Health</a></li>
                <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                    <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>index.php">PCMH</a></li>
                <?php else : ?>
                    <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>child.php">Child Health</a></li>
                <?php endif ?>
                <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>index.php#articles">Health Tips & Articles</a></li>
                <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>index.php#faqs">FAQs</a></li>
                <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>index.php#contact">Contact Us</a></li>
                <?php if(isset($user)) : ?>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $user['firstname'] ?> 
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a class="dropdown-item custom-links" href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                      </ul>
                  </li>
                <?php else : ?>
                      <li class="nav-item custom-links"><a class="nav-link" href="<?= ROOT_URL ?>sign_in.php">Login</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
  <!-- ======================== END OF NAV ======================== -->