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
            <h1>Your Account</h1>
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
            echo "<a href='profile.php' class='login-btn'>".$_SESSION['customer_name']." /</a><a href='logout.php' class='signup-btn'> Logout</a>";
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
            <h1>Your Account</h1>
          </div> -->

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
            <div class="content-box">
              <div class="box-title">
                <h3>Customer Profile <?php echo $_SESSION['customer_name']; ?></h3>

              </div>
              <div class="form-deliver col-lg-12">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">FIRST AND LAST NAME</label>
                      <p class="profile-p"><?php echo $customer_name; ?></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="number">Email</label>
                      <p class="profile-p"><?php echo $customer_email ?></p>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="street">Country</label>
                      <p class="profile-p"><?php echo $customer_country ?></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">City</label>
                      <p class="profile-p"><?php echo $customer_city ?></p>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="code">Contact Number</label>
                      <p class="profile-p"><?php echo $customer_contact ?></p>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="city">Street Address</label>
                      <p class="profile-p"><?php echo $customer_address ?></p>
                    </div>
                  </div>
                  <div class="text-right mr-3">
                    <a href="#" class="update-profile"><i class="fas fa-pencil-alt"></i> update</a>
                    <a href="#" data-toggle="modal" data-target="#changePass" class="update-profile"><i class="fa fa-cog"></i> change password</a>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>

          <div class="content-box">
            <div class="box-title">
              <h3>Order History</h3>
            </div>
            <div class="address col-lg-12">
              <div class="row">
                <table class="table cart-table">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Product</th>
                      <td>23152</td>
                      <td>5</td>
                      <td>25-02-2018</td>
                    </tr>
                    <tr>
                      <th scope="row">Product</th>
                      <td>23152</td>
                      <td>5</td>
                      <td>25-02-2018</td>
                    </tr>
                    <tr>
                      <th scope="row">Product</th>
                      <td>23152</td>
                      <td>5</td>
                      <td>25-02-2018</td>
                    </tr>
                    <tr>
                      <th scope="row">Product</th>
                      <td>23152</td>
                      <td>5</td>
                      <td>25-02-2018</td>
                    </tr>
                  </tbody>
                </table>
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



<!-- change password -->
<div class="modal fade bd-example-modal-lg" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered all-modals-style" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container popup-inner position-relative">
          <div class="close-btn" data-dismiss="modal"><i class="fa fa-times"></i></div>
          <div class="row align-items-center">
            <div class="popup-title">
              <h4>Change Password</h4>
            </div>
            <div class="general-form">
              <form action="#">
                <div class="form-group">
                  <input type="password" name="username" value="" placeholder="Old Password">
                </div>
                <div class="form-group">
                  <input type="password" name="password" value="" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" name="password" value="" placeholder="Confirm Password">
                </div>
                <button type="submit">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<?php include 'scripts.php'; ?>
</body>
</html>
