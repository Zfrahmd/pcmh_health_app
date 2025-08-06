<?php 
include 'partials/header.php';

?>

<!-- Hero Section -->
<div class="hero-section">
    <h1>About Princess Christian Maternity Hospital</h1>
    <p>A leading healthcare institution dedicated to providing exceptional maternal and child healthcare services in Sierra Leone since 1925.</p>
</div>

<!-- Hospital Image Section -->
<div class="hospital-image-container">
    <img src="<?= ROOT_URL ?>/img/2.PNG" alt="Princess Christian Maternity Hospital Building" class="hospital-image">
</div>

<!-- Feature Grid Section -->
<div class="section">
    <div class="feature-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-hospital-alt"></i>
            </div>
            <h3>State of Art Facilities</h3>
            <p>Our hospital is equipped with cutting-edge medical technology and modern infrastructure. We feature advanced labor and delivery rooms, state-of-the-art operating theaters, well-equipped NICUs, and modern diagnostic facilities. Our facilities are designed to provide the highest standard of care while ensuring patient comfort and safety.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Why Choose Our Hospital</h3>
            <p>With over 95 years of experience in maternal healthcare, we offer unparalleled expertise in obstetrics and gynecology. Our team of highly qualified healthcare professionals, commitment to patient-centered care, and proven track record of successful deliveries make us the preferred choice for maternal healthcare in Sierra Leone. We maintain international standards of hygiene and patient care protocols.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-microscope"></i>
            </div>
            <h3>Services for High-End Diagnostics</h3>
            <p>Our comprehensive diagnostic center offers a wide range of advanced testing services including 4D ultrasound, advanced laboratory testing, genetic screening, and specialized maternal-fetal medicine services. We utilize the latest diagnostic tools and technologies to ensure accurate and timely diagnosis for optimal patient care.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-ambulance"></i>
            </div>
            <h3>24x7 Emergency Services</h3>
            <p>Our round-the-clock emergency department is always ready to handle any maternal or pediatric emergency. With dedicated emergency response teams, fully equipped ambulances, and rapid response protocols, we ensure immediate medical attention when you need it most. Our emergency services are supported by experienced staff and modern life-support equipment.</p>
        </div>
    </div>
</div>

<?php
    include './partials/footer.php';
?>