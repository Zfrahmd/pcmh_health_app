<?php 
include 'partials/header.php';

// get back form data if form was invalid
$name= $_SESSION['add-query-data']['name'] ?? null;
$email= $_SESSION['add-query-data']['email'] ?? null;
$message= $_SESSION['add-query-data']['message'] ?? null;
unset($_SESSION['add-query-data']);


$maternal_query = "SELECT posts.*
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE categories.title = 'maternal' LIMIT 8";
$maternal_posts=mysqli_query($connection,$maternal_query);

$health_tips_query = "SELECT posts.*
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE categories.title = 'health' LIMIT 8";
$health_tips_posts=mysqli_query($connection,$health_tips_query);


$faqs_query = "SELECT posts.*
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE categories.title = 'faq' LIMIT 8";
$faqs=mysqli_query($connection,$faqs_query);



?>

<div class="banner">Welcome to the Maternal & Child Health Portal for Sierra Leone!</div>
<div class="slider">
  <div class="slide active">
    <img src="<?= ROOT_URL ?>/img/1.png" class="d-block w-100" alt="...">
  </div>
  <div class="slide">
    <img src="<?= ROOT_URL ?>/img/22.jpg" class="d-block w-100" alt="...">
  </div>
  <div class="slide">
    <img src="<?= ROOT_URL ?>/img/23.jpg" class="d-block w-100" alt="...">
  </div>
  <div class="slide">
    <img src="<?= ROOT_URL ?>/img/25.jpg" class="d-block w-100" alt="...">
  </div>

  <div style="text-align:center; margin-bottom:2rem;">
        
    </div>
  <div class="slider-text">
    <h1 style=""><strong>Empowering Mothers and Children for a Healthier Sierra Leone</strong></h1>
    <p style="">Access trusted information, resources, and support for every stage of motherhood and childhood.</p>
    <div class="quick-links">
        <a class="quick-link" href="#maternal">Maternal Health</a>
        <a class="quick-link" href="child.php">Child Health</a>
        <a class="quick-link" href="#articles">Health Tips</a>
        <a class="quick-link" href="#contact">Contact Us</a>
    </div>
  </div>
</div>
<div class="banner" style="background:#00bcd4;">
    <marquee>
        💡 <b>Health Tip:</b> Wash your hands regularly to prevent infections!
        Drink clean water and eat balanced meals with fruits, vegetables, and local foods to keep mother and child healthy!
    </marquee>
</div>


<?php  if(isset($_SESSION['add-query-success'])) : ?>
    <div class="alert alert-success alert-dismissible fade show alert-settings" role="alert">
        <p>
            <?=$_SESSION['add-query-success'];
            unset($_SESSION['add-query-success']); 
            ?>
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php elseif(isset($_SESSION['add-query'])): ?>
        <div class="alert alert-danger alert-dismissible fade show alert-settings" role="alert">
            <p>
                <?=$_SESSION['add-query'];
                unset($_SESSION['add-query']); 
                ?>
            </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php endif ?>

<!-- Maternal Health -->
<section class="section" id="maternal">
    <div class="section-title">Maternal Health</div>
        <div class="cards">
            <?php while ($post = mysqli_fetch_assoc($maternal_posts)) : ?>
                <div class="card">
                    <h5 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                    <?= substr($post['body'], 0, 250) ?>...
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>


<!-- Health Tips & Articles -->
<section class="section" id="articles"> 
    <div class="section-title">Health Tips & Articles</div>
    <div style="text-align:center; margin-bottom:3.5rem;">
        <input type="text" id="article-search" placeholder="Search articles by keyword or category...">
    </div>
    <div class="articles-bg-wrapper" style="position:relative;">
        <img src="<?= ROOT_URL ?>/img/4.jpg" alt="Health Tips Background">
        <div class="cards" id="article-list">
          <?php while ($post = mysqli_fetch_assoc($health_tips_posts)) : ?>
            <div class="card" data-category="health-tips">
              <h5 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
              <?= substr($post['body'], 0, 250) ?>...
            </div>
          <?php endwhile; ?>  
        </div>
    </div>
</section>

<section class="section my-5" id="about">
    <!-- Our Team Section -->
    <div class="section-title" style="font-size:1.3rem; margin-top:4.5rem;">Our Team</div>
    <div class="team">
        <div class="team-member">
            <img src="<?= ROOT_URL ?>/img/12.jpg" alt="Dr. John Doe">
            <h4>Dr. John Doe</h4>
            <span>Obstetrician</span>
        </div>
        <div class="team-member">
            <img src="<?= ROOT_URL ?>/img/14.jpg" alt="Dr. James Smith">
            <h4>Dr. James Smith</h4>
            <span>Lab Technician</span>
        </div>
        <div class="team-member">
            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Dr. Alex Brown">
            <h4>Dr. Alex Brown</h4>
            <span>Nutritionist</span>
        </div>
        <div class="team-member">
            <img src="<?= ROOT_URL ?>/img/13.jpeg" alt="Nurse Lisa May">
            <h4>Nurse Lisa May</h4>
            <span>Community Health Nurse</span>
        </div>
    </div>
</section>

<!-- FAQs -->
<section class="section my-5" id="faqs">
    <div class="section-title">Frequently Asked Questions</div>
    <div class="card" data-category="faqs">
        <?php while ($faq = mysqli_fetch_assoc($faqs)) : ?>
            <div class="faq">
                <div class="faq-question"><?= $faq['title'] ?></div>
                <div class="faq-answer"><?= substr($faq['body'], 0, 150) ?></div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Contact Us -->
<section class="section" id="contact">
    <div class="section-title">Contact Us</div>
    <form class="contact-form" action="<?= ROOT_URL ?>add-query-logic.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="name" value ="<?= $name ?>" placeholder="Your Name">
        <input type="email" name ="email" value ="<?= $email ?>"  placeholder="Your Email">
        <textarea  rows="8" name="message"  placeholder="Describe your issue here"><?=$message?></textarea>
        <button type="submit" name="submit" class="btn">Send Message</button>
    </form>
</section>


<?php
include './partials/gmaps.php';
?>



<?php
include './partials/footer.php';
?>


<script>
    // Smooth scrolling for navigation links
    document.querySelectorAll('nav .jump-links').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const section = document.querySelector(this.getAttribute('href'));
            if(section) section.scrollIntoView({ behavior: 'smooth' });
        });
    });
    // FAQ toggle
    document.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', function() {
            const parent = this.parentElement;
            parent.classList.toggle('open');
        });
    });
    // Article search/filter
    document.getElementById('article-search').addEventListener('input', function() {
        const val = this.value.toLowerCase();
        document.querySelectorAll('#article-list .card').forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(val) ? '' : 'none';
        });
    });

  // Slider banner code
  const slides = document.querySelectorAll('.slide');
  let current = 0;

  function showNextSlide() {
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
  }

  setInterval(showNextSlide, 2500); // change slide every 2.5 seconds

</script>