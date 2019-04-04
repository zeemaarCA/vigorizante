<?php
session_start();
include 'header.php';
include 'functions.php';

?>
<body>

  <header class="heightvh">
    <div class="back-logo">
      <h1><a href="index.html"></a>Vigorizante</h1>
    </div>
    <div class="header-section">
      <div class="row">
        <div class="col-lg-6 pr-0 wow animated slideInLeft"  data-wow-delay="0.8s">
          <div class="header-left not-fixed">
            <div class="scroll wow animated fadeIn" data-wow-delay="3.5s"></div>
            <div class="menu-bar">
              <span class="bars"></span>
            </div>
            <div class="logo">
              <h1>Vigorizante</h1>
            </div>
            <div class="header-text">
              <h1>the best selling 100% natural sex supplements</h1>
              <div class="header-btn">
                <button onclick="targrtLink()">read more</button>
              </div>
            </div>
            <div class="menu-side-overlay">
              <div class="close-menu-icon">
                <i class="far fa-times-circle"></i>
                <div class="menu-bar-wrapper">
                  <div class="menu-links">
                    <?php
                    include 'menu.php';
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 pl-0">
          <div class="header-right wow animated slideInRight main-header"  data-wow-delay="0.8s">
            <div class="login-link">
              <?php if (!isset($_SESSION['customer_name'])) {
                echo "<a href='javascript:void(0)' class='login-btn'>Login /</a><a href='javascript:void(0)' class='signup-btn'> Signup</a>";
              } else {
                echo "<a href='profile.php' class='login-btn-idle'>".$_SESSION['customer_name']." /</a><a href='logout.php' class='signup-btn'> Logout</a>";
              }
              ?>
            </div>

            <div class="cart-icon-link icon-cart-home">
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

            <div class="header-img">
              <img src="assets/img/vigo-caps.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>



  <div class="about-section" id="">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-main-img">
          <img src="assets/img/couple.png" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-content">

          <h1>about Vigorizante</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non pariatur id dolorem praesentium quod tenetur saepe dignissimos laudantium temporibus ipsum, quae nemo consequuntur maiores aliquam quibusdam accusantium modi quasi aliquid numquam, dolor est vero. Distinctio earum eaque alias provident, assumenda voluptas vitae, quo voluptatum, excepturi facere aliquam facilis esse consequatur tenetur! Dolore, iste accusamus possimus iusto accusantium sed nam, ullam minus adipisci odit ipsa, dignissimos optio rerum atque nobis, quasi.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="promotional-section">
    <div class="promotional-content">
      <h1>free promotional pack</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint dolorem repellat iure iusto, aliquid voluptatum explicabo maiores, perspiciatis ex! Harum consectetur labore inventore, eveniet accusamus veniam at, quasi, deserunt architecto delectus culpa porro cum totam, ipsa libero. Possimus, incidunt, quos.</p>
      <div class="promotional-img">
        <img src="assets/img/vigo-promo.png" alt="">
      </div>
      <div class="promotional-btn">
        <a href="products.php">buy now</a>
      </div>
    </div>
  </div>


  <!-- toast -->
  <div class="container-toast">
    <div class="rectangle">
      <div class="notification-text">
        <i class="fas fa-exclamation-circle"></i>
        <span>&nbsp;&nbsp;Please Login First to add item.&nbsp;&nbsp;</span><i class="fas fa-times" id="close-trigger"></i>
      </div>
    </div>
  </div>
  <!-- toast -->

  <div class="best-sellers">
    <div class="container">
      <div class="product-title">
        <h1>best sellers</h1>
      </div>
      <div class="row">
        <?php
        $get_pro = "SELECT * FROM products";
        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro = mysqli_fetch_array($run_pro)) {
          $pro_id = $row_pro['product_id'];
          $pro_cat = $row_pro['product_cat'];
          $pro_title = $row_pro['product_title'];
          $pro_price = $row_pro['product_price'];
          $pro_desc = $row_pro['product_desc'];
          $pro_image = $row_pro['product_image'];
          cart();

          if (!isset($_SESSION['customer_name'])) {

            ?>
            <div class="col-lg-4">
              <div class="product-box">
                <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                <div class="product-box-content">
                  <h4><?php echo $pro_title; ?></h4>
                  <div class="addtocart-btn">
                    <a href="javascript:void()" class="trigger-toast">add to cart</a>
                  </div>
                  <h4>&euro;<?php echo $pro_price; ?></h4>
                </div>
              </div>
            </div>

            <?php
          }
          else {

            ?>

            <div class="col-lg-4">
              <div class="product-box">
                <img src="includes/product_images/<?php echo $pro_image; ?>" alt="">
                <div class="product-box-content">
                  <h4><?php echo $pro_title; ?></h4>
                  <div class="addtocart-btn">
                    <a href="index.php?add_cart=<?php echo $pro_id; ?>">add to cart</a>
                  </div>
                  <h4>&euro;<?php echo $pro_price; ?></h4>
                </div>
              </div>
            </div>
          <?php }} ?>
        </div>
      </div>
    </div>

    <div class="certificates">
      <div class="container">
        <div class="certificate-title">
          <h1>accreditation</h1>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-4">
            <img src="assets/img/sanidad.jpg" alt="">
          </div>
          <div class="col-lg-4">
            <img src="assets/img/logo-aecosan.jpg" alt="">
          </div>
          <div class="col-lg-4">
            <img src="assets/img/efsa.jpg" alt="">
          </div>
        </div>
        <div class="certificate-text">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempora molestiae, animi aperiam sit hic impedit nam ad suscipit, unde nisi dignissimos deleniti neque, illo, rem necessitatibus aliquam. Pariatur, doloremque quis illo numquam animi aliquam nesciunt distinctio natus reiciendis dolores.</p>
        </div>
      </div>
    </div>



    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>

  </body>
  </html>
