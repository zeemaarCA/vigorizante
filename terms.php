<?php
session_start();
include 'functions.php';
include 'header.php';

?>
<body>

  <header>
    <!-- <div class="back-logo">
    <h1>Vigorizante</h1>
  </div> -->
  <div class="header-section">
    <div class="row">
      <div class="col-lg-3 pr-0 wow animated slideInLeft"  data-wow-delay="0.8s">
        <div class="header-left">
          <div class="scroll wow animated fadeIn" data-wow-delay="3.5s"></div>
          <div class="menu-bar inner">
            <span class="bars"></span>
          </div>
          <div class="logo">
            <h1>Vigorizante</h1>
          </div>
          <div class="header-text">
            <h1>Terms and <br>Conditions</h1>
            <!-- <div class="header-btn">
            <button onclick="targrtLink()">view</button>
          </div> -->
        </div>
        <div class="menu-side-overlay">
          <div class="close-menu-icon">
            <i class="far fa-times-circle"></i>
            <div class="menu-bar-wrapper">
              <div class="menu-links inner">
                <?php
                include 'menu.php';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 pl-0">
      <div class="header-right wow animated slideInRight"  data-wow-delay="0.8s">
        <div class="login-link">
          <a href="javascript:void(0)" class="login-btn">Login /</a><a href="javascript:void(0)" class="signup-btn"> Signup</a>
        </div>
        <div class="login-register-wrapper login-target">
          <div class="close-login-icon">
            <i class="far fa-times-circle"></i>
          </div>
          <div class="login-form">
            <div class="form-title">
              <h1>login</h1>
            </div>
            <?php include 'login_include.php'; ?>
          </div>
        </div>
        <div class="login-register-wrapper signup-target">
          <div class="close-login-icon">
            <i class="far fa-times-circle"></i>
          </div>
          <div class="login-form">
            <div class="form-title">
              <h1>Signup</h1>
            </div>
            <?php include 'signup_include.php'; ?>
          </div>
        </div>
        <section class="container privacy-terms-section" id="targrtLink">
          <!-- <div class="privacy-terms-title">
          <h1>Terms & Conditions</h1>
        </div> -->


        <div class="container">
          <div class="terms-privacy">
            <ul class="row">
              <div class="col-6">
                <li>All services and interactions with Vigorizante are governed by these terms and conditions.</li>
                <li>Usage of the website is implicit agreement to the terms and conditions, and privacy policy.</li>
                <li>If you do not agree with any of the terms and conditions, please terminate usage of the site.</li>
                <li>We reserve the right to update or change the terms of conditions at any time. Please check the terms and conditions page regularly for updates.</li>
                <li>Use of the website after any changes constitutes acceptance.</li>
                <li>You will not use our product for any illegal, harmful or dangerous purposes.</li>
                <li>We reserve the right to refuse services to anyone for any reason. We will make a reasonable attempt to contact you, in case of cancellation or restriction.</li>
                <li>We may use cookies to collect NPII from you, if you disable cookies the website may not work properly.</li>
                <li>All content on the website is subject to copyright laws.</li>
                <li>All information found on this sight is for the purpose of reference. Use of any materials or information found on this site is at your own risk and we will not be held liable.</li>
              </div>
              <div class="col-6">
                <li>It is your responsibility to consult more complete and timely sources of information.</li>
                <li>Services are subject to price change or discontinuation without notice.</li>
                <li>You agree to provide current accurate and complete information when prompted. And update information to keep it up to date.</li>
                <li>We reserve the right to use any ideas submitted voluntarily, no matter the medium. We are under no obligation to maintain confidence, to pay compensation or respond in anyway.</li>
                <li>We reserve the right to remove anything from our website as we see fit.</li>
                <li>In case of a website error (ie typo) we reserve the right to fix and reverse anything that may have been derived.</li>
                <li>Do not use our website for any unlawful or harmful acts.</li>
                <li>We cannot guarantee the use of our service will be error-free or timely, but we will do our best to meet the standards we present.</li>
                <li>If we do not enact any or every part of these terms of service , it shall not indicate waiver of it.</li>
              </div>
            </ul>
          </div>
        </div>
      </section>

    </div>

    <?php include 'footer.php'; ?>
  </div>
</div>
</div>
</header>







<?php include 'scripts.php'; ?>
</body>
</html>
