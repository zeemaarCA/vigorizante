<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:products.php?msg=Please Login First');
}
include 'functions.php';
include 'header.php';

?>
<body>
  <?php
  $total = 0;
  global $con;
  $ip = getIp();
  $sel_price = "SELECT * FROM cart WHERE ip_add = '$ip'";
  $run_price = mysqli_query($con, $sel_price);
  while ($p_price = mysqli_fetch_array($run_price)) {
    $pro_id = $p_price['p_id'];
    $qtyd = $p_price['qty'];
    // echo $qtyd;
    $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_pro_price = mysqli_query($con, $pro_price);
    while ($pp_price = mysqli_fetch_array($run_pro_price)) {
      $product_price = array($pp_price['product_price']);
      $single_price = $pp_price['product_price'];
      $product_title = $pp_price['product_title'];
      $product_image = $pp_price['product_image'];
      $total_qty_price = $single_price * $qtyd;
      $values = array_sum($product_price);
      $mega_total = $values * $qtyd;
      $total += $mega_total;
    }
  }
  ?>
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
            <h1>Confirm Your <br>Order</h1>
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
            <h1>Confirmation</h1>
          </div> -->
          <div class="row">
            <div class="table-responsive">
              <table class="table cart-table mb-0">
                <thead>
                  <tr>
                    <th scope="col" width="35%">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col" width="29%">Quantity</th>
                    <th scope="col">total</th>
                  </tr>
                </thead>
                <?php
                $total = 0;
                global $con;
                $ip = getIp();
                $sel_price = "SELECT * FROM cart WHERE c_id = '".$_SESSION['customer_id']."' ";
                $run_price = mysqli_query($con, $sel_price);
                while ($p_price = mysqli_fetch_array($run_price)) {
                  $pro_id = $p_price['p_id'];
                  $qtyd = $p_price['qty'];
                  // echo $qtyd;
                  $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
                  $run_pro_price = mysqli_query($con, $pro_price);
                  while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                    $product_price = array($pp_price['product_price']);
                    $single_price = $pp_price['product_price'];
                    $product_title = $pp_price['product_title'];
                    $product_image = $pp_price['product_image'];
                    $total_qty_price = $single_price * $qtyd;
                    $values = array_sum($product_price);
                    $mega_total = $values * $qtyd;
                    $total += $mega_total;

                    ?>
                    <tbody>
                      <tr>
                        <td>
                          <div class="item-img">
                            <img src="includes/product_images/<?php echo $product_image; ?>" alt="">
                            <p><?php echo $product_title; ?></p>
                          </div>
                        </td>
                        <td>&pound<?php echo $single_price; ?></td>
                        <td>
                          <div class="form">
                            <div class="form-group">
                              <div class="input-group">
                                <p><?php echo $qtyd ?></p>
                                <?php
                                if (isset($_POST['update_cart'])) {
                                  if (isset($_POST['qty'])) {
                                    $qty = $_POST['qty'];
                                    $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
                                    $array = array_combine($qty,$pro_id_cart_qty);
                                    foreach ($array as $q => $i) {
                                      $update_qty = "UPDATE cart SET qty = '$q' WHERE p_id = '$i'";
                                      $run_qty = mysqli_query($con, $update_qty);
                                      // header("location: cart.php?mes=Update cart sucessfully");
                                      echo("<script>location.href = 'cart.php?mes=Update cart sucessfully'</script>");
                                    }
                                    $total = $total * $qtyd;
                                  }
                                }

                                ?>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td>&euro;<?php echo $total_qty_price; ?></td>
                      </tr>
                    <?php }} ?>
                  </tbody>
                </table>
              </div>
            </div>
            <br><br>
            <div class="content-box">
              <div class="box-title">
                <h3>cart total</h3>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <h4>cart subtotal</h4>
                  <h4>Delivery</h4>
                  <h4>order total</h4>
                </div>
                <div class="col-lg-6 text-right">
                  <h4>&euro;<?php echo $total; ?></h4>
                  <h4>&euro;0</h4>
                  <h4>&euro;<?php echo $total; ?></h4>
                </div>
              </div>
            </div>

            <div class="content-box">
              <div class="box-title">
                <h3>shipping billing address</h3>
                <a href="#" data-toggle="modal" data-target="#edit-shipping" data-dismiss="modal">edit</a>
              </div>

              <div class="row">
                <p>current shopping address</p>

                <ul>
                  <?php
                  $get_customer = "SELECT * FROM customers WHERE customer_email = '".$_SESSION['customer_email']."'";
                  $run_customer = mysqli_query($con, $get_customer);

                  while ($row_customer = mysqli_fetch_array($run_customer)) {
                    $customer_id = $row_customer['customer_id'];
                    $customer_name = $row_customer['customer_name'];
                    $customer_email = $row_customer['customer_email'];
                    $customer_country = $row_customer['customer_country'];
                    $customer_city = $row_customer['customer_city'];
                    $customer_contact = $row_customer['customer_contact'];
                    $customer_address = $row_customer['customer_address'];
                    ?>
                    <li><?php echo $customer_name; ?></li>
                    <li><?php echo $customer_email; ?></li>
                    <li><?php echo $customer_city; ?></li>
                    <li><?php echo $customer_country; ?></li>
                    <li><?php echo $customer_contact; ?></li>
                    <li><?php echo $customer_address; ?></li>
                  </ul>
                <?php } ?>
              </div>
            </div>
            <div class="content-box">
              <div class="box-title">
                <h3>payment method</h3>
              </div>
              <div class="row align-items-center">
                <div class="col-lg-4">
                  <img src="assets/img/checkoutb1.png" alt="">
                </div>
                <div class="col-lg-8">
                  <p class="mb-0">Paypal</p>
                </div>
              </div>
            </div>
            <div class="bottom-btn">
              <div class="row">
                <div class="col-lg-6 col-6">
                  <a href="checkout.php" class="float-left">back</a>
                </div>
                <div class="col-lg-6 col-6">
                  <!-- <button type="submit">next</button> -->
                  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" class="float-right">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="zmt@gmail.com">
                    <input type="hidden" name="lc" value="US">
                    <input type="hidden" name="item_name" value="<?php echo $product_title; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $pro_id ?>">
                    <input type="hidden" name="amount" value="<?php echo $total; ?>">

                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="return" value="https://zeemaar.com/vigorizante/paypal_success.php">
                    <input type="hidden" name="cancel_return" value="https://zeemaar.com/vigorizante/paypal_cancel.php">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="no_note" value="0">

                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
                    <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

                  </form>


                </div>
              </div>
            </div>

          </div>
        </section>
      </div>


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
                    <form action="update_address.php" method="post">
                      <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                      <div class="form-group">
                        <input type="number" id="number" name="customer_contact" placeholder="MOBILE NUMBER" required="true" value="<?php echo $customer_contact; ?>">
                      </div>
                      <div class="form-group">
                        <textarea placeholder="ADDRESS" name="customer_address" required="true"><?php echo $customer_address; ?></textarea>
                      </div>
                      <div class="form-group">
                        <input type="text" id="city" placeholder="LOCALITY/CITY" name="customer_city" required="true" value="<?php echo $customer_city; ?>">
                      </div>
                      <div class="form-group">
                        <input type="text" id="country" placeholder="COUNTRY" name="customer_country" required="true" value="<?php echo $customer_country; ?>">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="w-40" name="update_address">update address</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include 'footer.php'; ?>
    </div>
  </div>
</div>
</header>


<?php include 'scripts.php'; ?>
</body>
</html>
