<?php
session_start();
include 'header.php';
include 'functions.php';
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
            <h1>Contact us</h1>
            <!-- <div class="header-btn">
            <button onclick="targrtLink()">Send Message</button>
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
        <section class="cart-section h-100" id="targrtLink">
          <div class="contact-wrapper">
            <div class="row">
              <div class="col-lg-7 contact-form">
                <div id="mail-status"></div>
                <div class="signup-sec">
                  <div class="row">
                    <div class="form-field col-6">
                      <input type="text" name="name" value="" id="userName" placeholder="Your Name...">
                      <span id="userName-info" class="info"></span>
                    </div>
                    <div class="form-field col-6">
                      <input type="email" name="email" value="" id="userEmail" placeholder="Your Email">
                      <span id="userEmail-info" class="info"></span>
                    </div>
                    <div class="form-field col-12">
                      <input type="text" name="subject" value="" id="content" placeholder="Subject">
                      <span id="content-info" class="info"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-field col-12">
                      <textarea name="msg" rows="6" cols="80" placeholder="Your Message" id="email_msg"></textarea>
                      <span id="msg-info" class="info"></span>
                    </div>
                  </div>
                  <button onClick="sendContact();">Send</button>
                  <span id="content-info" class="info"></span>
                </div>
              </div>
              <div class="col-lg-5">
                <div id="map"></div>
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
