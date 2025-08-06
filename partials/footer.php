<!-- Footer Section -->
    <footer class="custom-footer">
        <div class="footer-top">
            <div class="footer-info-block">
    <div class="footer-icon-circle">
        <i class="fas fa-clock"></i>
    </div>
    <div>
        <div class="footer-info-title">Contact Us</div>
        <div>24/7 Emergency Call &amp; Email Support</div>
    </div>
</div>

            <div class="footer-info-block">
    <div class="footer-icon-circle">
        <i class="fas fa-envelope"></i>
    </div>
    <div>
        <div class="footer-info-title2">24 Hours Emergency</div>
        <div>
            <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                <a href="mailto:ms@pcmhfreetown.com" class="footer-email-link">ms@odchfreetown.com</a>
            <?php else : ?>
                <a href="mailto:ms@pcmhfreetown.com" class="footer-email-link">ms@pcmhfreetown.com</a>
            <?php endif ?>
        </div>
    </div>
</div>

            <div class="footer-info-block">
    <div class="footer-icon-circle">
        <i class="fas fa-phone-alt"></i>
    </div>
    <div>
        <div class="footer-info-title">Contact Us Free</div>
        <div>
            <a href="tel:+23276980000" class="footer-phone-link">+232 76980000</a>
        </div>
    </div>
</div>

    <div class="footer-info-block">
        <div class="footer-info-block">
            <div class="footer-icon-circle">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
                <div class="footer-info-title">Map and Directions</div>
                <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                    <a class="footer-direction-btn" href="https://www.google.com/maps?q=Ola+During+Children's+Hospital+Freetown+Sierra+Leone" target="_blank" rel="noopener noreferrer">
                        <i class="fas fa-location-arrow" style="margin-right: 5px;"></i> Get Direction
                    </a>
                <?php else : ?>
                    <a
                        class="footer-direction-btn"
                        href="https://www.google.com/maps?q=Princess+Christian+Maternity+Hospital+Freetown+Sierra+Leone"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fas fa-location-arrow" style="margin-right: 5px;"></i> Get Direction
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div> 

</div>
        </div>
        <hr class="footer-divider">
        <div class="footer-main">
            <div class="footer-col">
                <div class="footer-col-title">Useful links</div>
                <ul>
                    <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false  || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                        <li><a href="<?= ROOT_URL ?>child.php">ODCH</a></li>
                        <li><a href="<?= ROOT_URL ?>photos-odch.php">Photos</a></li>
                    <?php else : ?>
                        <li><a href="<?= ROOT_URL ?>index.php">PCMH</a></li>
                        <li><a href="<?= ROOT_URL ?>photos_pcmh.php">Photos</a></li>
                    <?php endif ?>

                    <li><a href="<?= ROOT_URL ?>#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Departments</div>
                <ul>
                    <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                        <li><a href="admindpt-odch.php">Administration Department</a></li>
                        <li><a href="pharmacydpt-odch.php">Pharmacy Department</a></li>
                        <li><a href="laboratorydpt-odch.php">Laboratory Department</a></li>
                        <li><a href="hivdpt-odch.php">HIV Department</a></li>
                    <?php else : ?>
                        <li><a href="obst_gyno.php">Obstetrics and Gynecology Department</a></li>
                        <li><a href="surgical.php">Surgical Department</a></li>
                        <li><a href="outpatient.php">Outpatient Department (OPD)</a></li>
                        <li><a href="administration.php">Administrative Department</a></li>
                    <?php endif ?>
                    
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">About us</div>
                <ul>
                    <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false  || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
                        <li><a href="<?= ROOT_URL ?>about-odch.php">About the Hospital</a></li>
                        <li><a href="<?= ROOT_URL ?>history&hreritage-odch.php">History & Heritage</a></li>
                        <li><a href="mission&vision-odch.php">Mission and Vision</a></li>
                    <?php else : ?>
                        <li><a href="<?= ROOT_URL ?>about-pcmh.php">About the Hospital</a></li>
                        <li><a href="<?= ROOT_URL ?>history&hreritage-pcmh.php">History & Heritage</a></li>
                        <li><a href="<?= ROOT_URL ?>mission&vision-pcmh.php">Mission and Vision</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <div class="footer-bottom-bar">
            <?php if (strpos($_SERVER['REQUEST_URI'], "child") !== false  || strpos($_SERVER['REQUEST_URI'], "odch") !== false) : ?>
               Copyright @ 2025 odchfreetown.com All Rights Reserved
            <?php else : ?>
                Copyright @ 2025 pcmhfreetown.com All Rights Reserved
            <?php endif ?>
        </div>
    </footer>

    <!-- Footer Section closes-->