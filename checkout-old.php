<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:products.php?msg=Please Login First');
}
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
          <!-- <div class="scroll wow animated fadeIn" data-wow-delay="3.5s"></div> -->
          <div class="menu-bar">
            <span class="bars"></span>
          </div>
          <div class="logo">
            <h1>Vigorizante</h1>
          </div>
          <div class="header-text">
            <h1>Checkout</h1>
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
          <?php if (!isset($_SESSION['customer_name'])) {
            echo "<a href='javascript:void(0)' class='login-btn'>Login /</a><a href='javascript:void(0)' class='signup-btn'> Signup</a>";
          } else {
            echo "<a href='profile.php' class='login-btn-idle'>".$_SESSION['customer_name']." /</a><a href='logout.php' class='signup-btn-idle'> Logout</a>";
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
        <section class="cart-section" id="targrtLink">
          <div class="container">
            <!-- <div class="cart-title">
            <h1>Checkout</h1>
          </div> -->
          <div class="container cart-popup position-relative confirmation cart">
            <div class="content-box">
              <div class="box-title">
                <h3>WHERE SHOULD WE DELIVER YOUR ORDER?</h3>
              </div>
              <div class="contact-form">
                <form action="#">
                  <div class="row">
                    <?php if (!isset($_SESSION['customer_name'])) {
                      ?>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" id="name" placeholder="FIRST AND LAST NAME" required="true">
                        </div>
                        <div class="form-group">
                          <input type="email" id="eemail" placeholder="Email" required="true">
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="">
                            <option value="0">United Arab Emirates</option>
                            <option value="1">England</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="number" id="number" placeholder="MOBILE NUMBER" required="true">
                        </div>
                        <div class="form-group">
                          <textarea placeholder="ADDRESS" class="w-100" required="true"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="number" id="number" placeholder="RESIDENCE NUMBER" required="true">
                        </div>
                        <div class="form-group">
                          <input type="number" id="code" placeholder="POST CODE" required="true">
                        </div>
                        <div class="form-group">
                          <input type="text" id="city" placeholder="LOCALITY/CITY" required="true">
                        </div>
                        <div class="form-group">
                          <input type="text" id="country" placeholder="COUNTRY" required="true">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="w-40">create address</button>
                        </div>
                      </div>

                    <?php }
                    else {
                      ?>
                      <div class="col-lg-5">
                        <?php
                        $get_customer = "SELECT * FROM customers WHERE customer_email = '".$_SESSION['customer_email']."'";
                        $run_customer = mysqli_query($con, $get_customer);

                        while ($row_customer = mysqli_fetch_array($run_customer)) {
                          $customer_name = $row_customer['customer_name'];
                          $customer_email = $row_customer['customer_email'];
                          $customer_country = $row_customer['customer_country'];
                          $customer_city = $row_customer['customer_city'];
                          $customer_contact = $row_customer['customer_contact'];
                          $customer_address = $row_customer['customer_address'];
                          ?>
                          <p>current shopping address</p>
                          <ul>
                            <li><?php echo $customer_name; ?></li>
                            <li><?php echo $customer_email; ?></li>
                            <li><?php echo $customer_city; ?></li>
                            <li><?php echo $customer_country; ?></li>
                            <li><?php echo $customer_contact; ?></li>
                            <li><?php echo $customer_address; ?></li>
                          </ul>
                          <a href="#" data-toggle="modal" data-target="#edit-shipping" data-dismiss="modal">Edit</a>
                        </div>
                        <div class="col-lg-7">
                          <p>Please select the address where you want this order to be delivered</p>
                          <select class="form-control border" name="addrs">
                            <option value="0">Kk   dubai, 0561458489  00000 - dubai Albania</option>
                            <option value="1">Ammar   dubai, 0561458489  00000 - dubai Albania</option>
                            <option value="2">Harif   dubai, 0561458489  00000 - dubai Albania</option>
                          </select>
                          <br>
                          <a href="#" data-toggle="modal" data-target="#add-shipping" data-dismiss="modal">add new address</a>
                        </div>
                      <?php }} ?>
                    </div>
                  </form>
                </div>
              </div>
              

              <div class="bottom-btn">
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <a href="cart.php" class="float-left">back</a>
                  </div>
                  <div class="col-lg-6 col-6">
                    <!-- <button type="submit">next</button> -->
                    <a href="confirmation.php">next</a>
                  </div>
                </div>
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



<!-- edit shipping address -->
<div class="modal fade bd-example-modal-lg" id="edit-shipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog all-modals-style modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container position-relative popup-inner">
          <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
          <div class="row align-items-center">
            <div class="popup-title">
              <h4>edit address</h4>
            </div>
            <div class="general-form">
              <form action="#">
                <div class="form-group">
                  <input type="text" id="name" placeholder="FIRST AND LAST NAME" required="true">
                </div>
                <div class="form-group">
                  <input type="email" id="eemail" placeholder="Email" required="true">
                </div>
                <div class="form-group">
                  <select class="form-control" name="">
                    <option value="0">United Arab Emirates</option>
                    <option value="1">England</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="number" id="number" placeholder="MOBILE NUMBER" required="true">
                </div>
                <div class="form-group">
                  <textarea placeholder="ADDRESS" required="true"></textarea>
                </div>
                <div class="form-group">
                  <input type="number" id="number" placeholder="RESIDENCE NUMBER" required="true">
                </div>
                <div class="form-group">
                  <input type="number" id="code" placeholder="POST CODE" required="true">
                </div>
                <div class="form-group">
                  <input type="text" id="city" placeholder="LOCALITY/CITY" required="true">
                </div>
                <div class="form-group">
                  <input type="text" id="country" placeholder="COUNTRY" required="true">
                </div>
                <div class="form-group">
                  <button type="submit" class="w-40">update address</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- add shipping address -->
<div class="modal fade bd-example-modal-lg" id="add-shipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog all-modals-style modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container position-relative popup-inner">
          <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
          <div class="row align-items-center">
            <div class="popup-title">
              <h4>Add address</h4>
            </div>
          </div>
          <div class="general-form">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="FIRST AND LAST NAME" required="true">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="eemail" placeholder="Email" required="true">
              </div>
              <div class="form-group">
                <select class="form-control" name="">
                  <option value="0">United Arab Emirates</option>
                  <option value="1">England</option>
                </select>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="number" placeholder="MOBILE NUMBER" required="true">
              </div>
              <div class="form-group">
                <textarea class="form-control" placeholder="ADDRESS" required="true"></textarea>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="number" placeholder="RESIDENCE NUMBER" required="true">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="code" placeholder="POST CODE" required="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="city" placeholder="LOCALITY/CITY" required="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="country" placeholder="COUNTRY" required="true">
              </div>
              <div class="form-group">
                <button type="submit" class="w-40">add address</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<?php include 'scripts.php'; ?>
</body>
</html>
