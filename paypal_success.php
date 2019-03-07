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
            <h1>Paypal</h1>
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
          <div class="container paypal-results">
            <?php
            $total = 0;

            global $con;

            $ip = getIp();

            $sel_price = "select * from cart where ip_add='$ip'";

            $run_price = mysqli_query($con, $sel_price);

            while($p_price=mysqli_fetch_array($run_price)){

              $pro_id = $p_price['p_id'];
              $qtyd = $p_price['qty'];


              $pro_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
              $run_pro_price = mysqli_query($con, $pro_price);
              while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                $product_price = array($pp_price['product_price']);
                $single_price = $pp_price['product_price'];
                $product_id = $pp_price['product_id'];
                $product_title = $pp_price['product_title'];
                $total_qty_price = $single_price * $qtyd;
                $values = array_sum($product_price);
                $mega_total = $values * $qtyd;
                $total += $mega_total;



              }


            }

            // getting Quantity of the product
            $get_qty = "select * from cart where p_id='$pro_id'";

            $run_qty = mysqli_query($con, $get_qty);

            $row_qty = mysqli_fetch_array($run_qty);

            $qty = $row_qty['qty'];
            $single_price *= $qty;


            // this is about the customer
            $user = $_SESSION['customer_email'];

            $get_c = "select * from customers where customer_email='$user'";

            $run_c = mysqli_query($con, $get_c);

            $row_c = mysqli_fetch_array($run_c);

            $c_id = $row_c['customer_id'];
            $c_email = $row_c['customer_email'];
            $c_name = $row_c['customer_name'];




            //payment details from paypal



            $amount = $_GET['amt'];

            $currency = $_GET['cc'];

            $trx_id = $_GET['tx'];

            // $invoice = mt_rand();

            $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                                 .'0123456789'); // and any other characters
                shuffle($seed); // probably optional since array_is randomized; this may be redundant
                $invoice = '';
                foreach (array_rand($seed, 8) as $k) $invoice .= $seed[$k];

            if($trx_id){


              //inserting the payment to table
              $insert_payment = "insert into payments (amount,customer_id,product_id,trx_id,currency,payment_date) values ('$amount','$c_id','$pro_id','$trx_id','$currency',NOW())";

              $run_payment = mysqli_query($con, $insert_payment);

              // inserting the order into table
              $insert_order = "insert into orders (p_id, c_id, qty, invoice_no, order_date,status) values ('$pro_id','$c_id','$qty','$invoice',NOW(),'in Progress')";

              $run_order = mysqli_query($con, $insert_order);


              // create notifcations

              // $create_notif = "insert into notifcations (notif_text, notif_status) values ('good person', 1";
              // $run_notif = mysqli_query($con, $create_notif);



              // create notifcations


              //removing the products from cart
              $empty_cart = "DELETE FROM cart WHERE c_id = $c_id";
              $run_cart = mysqli_query($con, $empty_cart);

            }

            if($amount==$single_price){

              ?>
              <div class="paypal-notification">
                <div class="success-img">
                  <img src="assets/img/paypal_success_icon.png" alt="">
                  <h3>Thank You...!</h3>
                </div>
                <h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
                <p>Your Payment was successful, Please go to your account to see your order history.</p>
                <a href="profile.php" class="btn-paypal">Go to your account</a>
              </div>
            <?php }
            else {
              ?>

              <div class="paypal-notification">
                <div class="success-img">
                  <img src="assets/img/paypal_cancel_icon.png" alt="">
                  <h3>Payment was failed</h3>
                  <h4><?php echo $amount; ?></h4>
                  <h4><?php echo $currency; ?></h4>
                  <h4><?php echo $trx_id; ?></h4>

                </div>
                <h2>Dear <?php echo $_SESSION['customer_name']; ?></h2>
                <p>Your Payment was not successful, Please go to our shop and try again..</p>
                <a href="products.php" class="btn-paypal">Go to Shop</a>
              </div>

            <?php } ?>
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
