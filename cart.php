<?php
session_start();
if (!isset($_SESSION['customer_name'])) {
  header('location:index.php?loginmsg=Please Login First to add items in cart');
  echo "<script>window.open('index.php?loginmsg=Please Login First to add items in cart','_self')</script>";
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
          <div class="scroll wow animated fadeIn" data-wow-delay="3.5s"></div>
          <div class="menu-bar">
            <span class="bars"></span>
          </div>
          <div class="logo">
            <h1>Vigorizante</h1>
          </div>
          <div class="header-text">
            <h1>Your Cart</h1>
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
      </div>

      <section class="cart-section" id="targrtLink">
        <div class="container">
          <p class="bg-success text-white p-2 d-none <?php if(@$_GET['mes']){echo 'd-block';};?>"><?php if(@$_GET['mes']){echo "Cart has been successfully upadated";}; ?></p>
          <!-- <div class="cart-title">
          <h1>Cart</h1>
        </div> -->
        <?php
        $get_items = "SELECT * FROM cart WHERE c_id = '".$_SESSION['customer_id']."'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
        $cart_item_qty = $count_items;
        if ($cart_item_qty == 0) {

          ?>
          <div class="content-box">
            <div class="box-title">
              <h3>Shopping Cart</h3>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <p>Your shopping cart is empty.</p>
              </div>
              <div class="col-lg-6 text-right">
                <a href="products.php">Add products to cart</a>
              </div>
            </div>
          </div>

          <div class="best-sellers">
            <div class="container">
              <div class="product-title">
                <h1>Recommended Products</h1>
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
              <?php } ?>
              </div>
            </div>
          </div>
          <?php
        }
        else {

          ?>

          <div class="row mx-0">
            <div class="table-responsive">
              <form class="w-100" action="" method="post" enctype="multipart/form-data">
                <table class="table cart-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" width="35%">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col" width="29%">Quantity</th>
                      <th scope="col">total</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <?php
                  $total = 0;
                  global $con;
                  $ip = getIp();
                  $sel_price = "SELECT * FROM cart WHERE c_id = '".$_SESSION['customer_id']."'";
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
                                  <span><button class="btn-inc-dec"><i class="fas fa-minus"></i></button></span>
                                  <input type="hidden" name="pro_id_cart_qty[]" value="<?php echo $pro_id; ?>" name="">
                                  <input type="number" class="input-number" name="qty[]" value="<?php echo $qtyd ?>" maxlength="2" min="1">
                                  <span><button class="btn-inc-dec"><i class="fas fa-plus"></i></button></span>
                                  <?php
                                  if (isset($_POST['update_cart'])) {
                                    if (isset($_POST['qty'])) {
                                      $qty = $_POST['qty'];
                                      $pro_id_cart_qty = $_POST['pro_id_cart_qty'];
                                      $array = array_combine($qty,$pro_id_cart_qty);
                                      foreach ($array as $q => $i) {
                                        $update_qty = "UPDATE cart SET qty = '$q' WHERE p_id = '$i' AND c_id = '".$_SESSION['customer_id']."'";
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
                          <td><a href="cart.php?del=<?php echo $pro_id; ?>" class="remove" onClick="return confirm('Delete This item?')" name="del_product"><i class="far fa-times-circle"></i></td>
                          </tr>
                        <?php }} ?>
                      </tbody>

                    </table>
                  </div>
                </div>



                <div class="duo-btn">
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="products.php">back to store</a>
                    </div>
                    <div class="col-lg-6">
                      <input type="submit" class="medium mt-0 float-right" name="update_cart" value="update cart">
                    </div>
                  </div>
                </div>

                <div class="content-box">
                  <div class="box-title">
                    <h3>cart total</h3>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <h4>cart subtotal</h4>
                      <h4>order total</h4>
                    </div>
                    <div class="col-lg-6 text-right">
                      <h4>&euro;<?php echo $total; ?></h4>
                      <h4>&euro;<?php echo $total; ?></h4>
                    </div>
                    <div class="col-lg-12">
                      <a href="checkout.php">checkout</a>
                    </div>
                  </div>
                </div>


              <?php } ?>



            </div>
          </form>
        </section>
        <?php
        $ip = getIp();
        if (isset($_GET['del'])) {
          $del_id = $_GET['del'];
          $delete_product = "DELETE FROM cart WHERE p_id = '$del_id' AND ip_add = '$ip'";
          $run_delete = mysqli_query($con, $delete_product);
          if ($run_delete) {
            echo "<script>window.open('cart.php', '_self')</script>";
          }
        }

        ?>
        <?php include 'footer.php'; ?>
      </div>
    </div>
  </div>
</header>


<?php include 'scripts.php'; ?>
</body>
</html>
