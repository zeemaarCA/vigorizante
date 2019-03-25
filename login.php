<?php
session_start();
include 'functions.php';
if(isset($_POST['login'])){

  $c_email = mysqli_real_escape_string($con,$_POST['email']);
  $c_pass = mysqli_real_escape_string($con,$_POST['pass']);

  $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";

  $run_c = mysqli_query($con, $sel_c);

  $check_customer = mysqli_num_rows($run_c);

  if($check_customer==0){

    echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    exit();
  }
  else{
    while ($row_user = mysqli_fetch_array($run_c)) {
      $c_id = $row_user['customer_id'];
      $c_name = $row_user['customer_name'];
      $c_email = $row_user['customer_email'];
      $c_address = $row_user['customer_address'];

      $_SESSION['customer_id']=$c_id;
      $_SESSION['customer_name']=$c_name;
      $_SESSION['customer_email']=$c_email;
      $_SESSION['customer_address']=$c_address;
    }
    // $_SESSION['customer_address']=$c_address;
    $ip = getIp();

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer>0 AND $check_cart==0){


      echo "<script>swal('You logged in successfully, Thanks!')</script>";
      echo "<script>window.open('profile.php','_self')</script>";

    }
    else {

      echo "<script>swal('You logged in successfully, Thanks!')</script>";
      echo "<script>window.open('profile.php','_self')</script>";


    }
  }
}


?>
