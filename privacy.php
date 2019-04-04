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
          <div class="menu-bar">
            <span class="bars"></span>
          </div>
          <div class="logo">
            <h1>Vigorizante</h1>
          </div>
          <div class="header-text">
            <h1>Privacy &amp; <br> Policy</h1>
            <!-- <div class="header-btn">
            <button onclick="targrtLink()">View</button>
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
          <?php if (!isset($_SESSION['customer_name'])) {
            echo "<a href='javascript:void(0)' class='login-btn'>Login /</a><a href='javascript:void(0)' class='signup-btn'> Signup</a>";
          } else {
            echo "<a href='profile.php' class='login-btn-idle'>".$_SESSION['customer_name']." /</a><a href='logout.php' class='signup-btn-idle'> Logout</a>";
          }
          ?>
        </div>
        <div class="cart-icon-link">

          <?php if (!isset($_SESSION['customer_name'])) {
            echo "";
          }
            else {
              ?>
              <a href="cart.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-cart"> <?php echo total_cart_quantity(); ?></span></a>
              <?php
            }
             ?>

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
          <h1>Privacy Policy</h1>
        </div> -->


        <div class="container">
          <div class="terms-privacy row">
            <div class="col-6">
              <p>All services and interactions with Vigorization are governed by this policy.</p>
              <p>Personal identification information (PPI) may be collected, when interacting with the site, this includes but is not limited to; name, email address, mailing address, phone number and credit card information. An example of this would be through placing an order.</p>
              <p>Users may visit our site anonymously.</p>
              <p>We only collect PPI if voluntarily submitted. Users are always able to not supply PPI.</p>
              <p>We may collect non-personal identification information (NPPI), through interactions with our site. This may include, but is not limited to; browser name, type of computer, incoming links (how you navigated to the site), operating system and other similar information.</p>
              <p>Our site may use cookies, to provide an enhanced user experience. Users can refuse cookies, although this may affect site function.</p>
              <h5>WHY DO WE COLLECT DATA</h5>
              <p>To complete a transaction, to render services ordered, we use the necessary information.</p>
              <p>To improve overall customer experience, our analysist analyze the data, to provide you with the best products, and ensure customer satisfaction</p>
            </div>
            <div class="col-6">

              <p>To improve our site, compatibility issues with certain mobile or pc formats, browsers, screen resolutions.</p>
              <p>To promote our products, to gauge interest certain products, how to market them and offer promotional offers to interested users.</p>
              <h5>SECURITY</h5>
              <p>All data is stored in a secure encrypted format, and is not shared with any other parties, except to the extent necessary to provide the services. (Mailing address to shipping company)</p>
              <p>All data-exchanges between Vigorization and Users are over SSL-secured connections.</p>
              <h5>ADDITIONAL</h5>
              <p>We reserve the right to update the privacy policy at any time. (To stay compliant and up-to-date with new legislation and regulations.)</p>
              <p>By using this site, you are agreeing to the privacy policy and the site’s terms and conditions.</p>
              <p>If you have any questions regarding our privacy policy, please get in touch via our contact page. </p>
            </div>
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
