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
        <section class="cart-section h-100" id="targrtLink">
          <div class="contact-wrapper">
            <div class="row">
              <div class="col-lg-7 contact-form">
                <form action="" class="signup-sec">
                  <div class="row">
                    <div class="form-field col-6">
                      <input type="text" name="name" value="" placeholder="Your Name...">
                    </div>
                    <div class="form-field col-6">
                      <input type="email" name="email" value="" placeholder="Your Email">
                    </div>
                    <div class="form-field col-12">
                      <input type="text" name="subject" value="" placeholder="Subject">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-field col-12">
                      <textarea name="msg" rows="6" cols="80" placeholder="Your Message"></textarea>
                    </div>
                  </div>
                  <button type="submit">Send</button>
                </form>
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
