<div class="col-sm-12 col-md-12 col-lg-3">
  <div class="flex-shrink-0 p-3 sidebar" > 
      <a href="<?= ROOT_URL ?>admin/index.php" class="link-dark rounded text-decoration-none"><h3 class="">Dashboard</h3></a>      
      <p class="">Welcome <span class="badge rounded-pill text-bg-dark"><?= $user['firstname']?></span></p>
      <hr style="color: ;">
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
            Articles/ FAQs
          </button>
          <div class="collapse" id="home-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li>
                  <a href="<?= ROOT_URL ?>admin/add-post.php" class="link-dark rounded">
                    <div class="d-flex">
                      <i class="uil uil-pen mx-3"></i>
                      <p>Add New</p>
                    </div> 
                  </a>
              </li>                
              <li>
                <a href="<?= ROOT_URL ?>admin/manage-posts.php" class="link-dark rounded">
                  <div class="d-flex">
                    <i class="uil uil-postcard mx-3"></i>
                    <p>Management</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <?php  if(isset($_SESSION['user_is_admin'])) : ?>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              Categories
            </button>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                  <a href="<?= ROOT_URL ?>admin/add-category.php" class="link-dark rounded">
                    <div class="d-flex">
                      <i class="uil uil-edit mx-3"></i>
                      <p>Add Category</p>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="<?= ROOT_URL ?>admin/manage-categories.php" class="link-dark rounded">
                    <div class="d-flex">
                      <i class="uil uil-list-ul mx-3"></i>
                      <p>Manage Categories</p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              Queries
            </button>
            <div class="collapse" id="orders-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                  <a href="<?= ROOT_URL ?>admin/manage-queries.php" class="link-dark rounded">
                    <div class="d-flex">  
                      <i class="uil uil-list-ul mx-3"></i>
                      <p>Manage Queries</p>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          
          <li class="border-top my-3"></li>
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
              Account
            </button>
            <div class="collapse" id="account-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li>
                  <a href="<?= ROOT_URL ?>admin/add-user.php" class="link-dark rounded">
                    <div class="d-flex">
                      <i class="uil uil-user-plus mx-3"></i> 
                      <p>Add User</p>
                    </div>
                  </a>
                </li>  
                <li>
                  <a href="<?= ROOT_URL ?>admin/manage-users.php"class="link-dark rounded">
                  <div class="d-flex">
                    <i class="uil uil-users-alt mx-3"></i>
                    <p>Manage Users</p>
                  </div>             
                  </a>
                </li>   
              </ul>
            </div>
          </li>
        <?php endif ?>
      </ul>
    </div>
</div>