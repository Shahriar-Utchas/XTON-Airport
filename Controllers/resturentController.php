<?php 
require_once('../Models/alldb.php');
session_start();
$fast_food=get_fast_foods();
$lunch=get_lunch();
$coffee=get_coffee();
$cousine=get_interCousine();
if (isset($_GET['cart'])) {
  $cart_id = $_GET['cart'];
  $cart = get_cart_info($cart_id);
  while ($row = mysqli_fetch_assoc($cart)) {
     $cart_name = $row['name'];
     $cart_price = $row['price'];
  }
  $add_cart = add_cart($_SESSION['user'],$cart_name, $cart_price);
    if ($add_cart) {
        $_SESSION['cart_status'] ="Added to cart"; 
       header('location:../Views/RestaurentPage.php');
    }
    else{
        $_SESSION['cart_status2'] ="Failed to add to cart"; 
       header('location:../Views/RestaurentPage.php');
    }
}
$cart_info = get_cart($_SESSION['user']);

if (isset($_GET['buy'])) {
  
  
  $buy_id = $_GET['buy'];
  $buy = get_buy_info($buy_id);
    while ($row = mysqli_fetch_assoc($buy)) {
         $buy_name = $row['name'];
         $buy_price = $row['price'];
    }
    
    $add_buy = add_buy($_SESSION['user'],$buy_name, $buy_price);
    if ($add_buy) {
        $_SESSION['buy_status'] ="Added to buy"; 
       header('location:../Views/RestaurentPage.php');
    }
    else{
        $_SESSION['buy_status2'] ="Failed to add to buy"; 
       header('location:../Views/RestaurentPage.php');
    }
  
}
$buy_info = get_buy($_SESSION['user']);


?>