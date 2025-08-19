<?php 
include 'partials/header.php';

$odch_child_query = "SELECT posts.*
FROM posts
JOIN categories ON posts.category_id = categories.id
WHERE categories.title = 'Child'";
$odch_child_posts=mysqli_query($connection,$odch_child_query);

?>


<section class="hero-section">
    <h1>Child Health</h1>
</section>


<!-- Child Health Section -->
<section class="section" id="child" style="position:relative;">
    <div class="child-bg-wrapper" style="position:relative; min-height:400px;">
        <div style="position:relative; z-index:1;">
            <!-- Pediatric Services and High Quality Care Boxes Start -->
            <div style="display:flex;flex-wrap:wrap;gap:2rem;justify-content:center;margin-bottom:2.5rem;">
                <div style="flex:1 1 320px;max-width:600px;min-width:260px;padding:2rem 1.5rem;background:rgba(255,255,255,0.93);border-radius:14px;box-shadow:0 2px 12px rgba(0,0,0,0.07);text-align:center;position:relative;z-index:2;">
                    <img src="<?= ROOT_URL ?>/img/19.png" alt="Pediatric Services" style="width:80px;height:80px;object-fit:contain;margin-bottom:1rem;">
                    <h2 style="color:var(--primary);font-size:1.5rem;margin:0 0 1rem 0;font-weight:700;">Paediatric Services</h2>
                    <div style="font-size:1.08rem;color:#26382c;line-height:1.6;">
                        The hospital provides comprehensive pediatric services for both inpatient and outpatient care, ensuring the health and well-being of children from infancy through adolescence.
                    </div>
                </div>

                <div style="flex:1 1 320px;max-width:600px;min-width:260px;padding:2rem 1.5rem;background:rgba(255,255,255,0.93);border-radius:14px;box-shadow:0 2px 12px rgba(0,0,0,0.07);text-align:center;position:relative;z-index:2;">
                    <img src="<?= ROOT_URL ?>/img/17.png" alt="High Quality Care" style="width:80px;height:80px;object-fit:contain;margin-bottom:1rem;">
                    <h2 style="color:var(--primary);font-size:1.5rem;margin:0 0 1rem 0;font-weight:700;">High Quality Care</h2>
                    <div style="font-size:1.08rem;color:#26382c;line-height:1.6;">
                        Our hospital is committed to delivering high-quality care through skilled professionals, advanced medical technology, and patient-centered services that prioritize safety, compassion, and excellence.
                    </div>

                </div>
                <div style="flex:1 1 320px;max-width:600px;min-width:260px;padding:2rem 1.5rem;background:rgba(255,255,255,0.93);border-radius:14px;box-shadow:0 2px 12px rgba(0,0,0,0.07);text-align:center;position:relative;z-index:2;">
                    <img src="<?= ROOT_URL ?>/img/21.png" alt="Years of Experience" style="width:80px;height:80px;object-fit:contain;margin-bottom:1rem;">
                    <h2 style="color:var(--primary);font-size:1.5rem;margin:0 0 1rem 0;font-weight:700;">Years of Experience</h2>
                    <div style="font-size:1.08rem;color:#26382c;line-height:1.6;">
                        Serving the community since 1961, our hospital has a proud legacy of trusted, compassionate, and continuous healthcare excellence.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Child Health Articles -->
<section class="section" id="maternal">
    <div class="section-title">CHILD ODCH ARTICLES</div>
        <div class="cards">
            <?php while ($odpost = mysqli_fetch_assoc($odch_child_posts)) : ?>
                <div class="card">
                    <h4 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $odpost['id'] ?>?type=child"><?= $odpost['title'] ?></a></h3>
                    <?= htmlspecialchars_decode(stripslashes(substr(($odpost['body']),0, 250))) ?>...                
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Location Section -->
<?php
include './partials/odch_gmaps.php';
?>

<?php
include './partials/footer.php';
?>