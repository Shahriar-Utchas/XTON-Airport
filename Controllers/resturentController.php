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
  $add_cart = add_cart($_SESSION['user'],$cart_name, $cart_price, $cart_id);
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
    
    $add_buy = add_buy($_SESSION['user'],$buy_name, $buy_price, $buy_id);
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

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    $remove = remove_cart($remove_id);
    if ($remove) {
        $_SESSION['remove_status'] ="Removed from cart"; 
       header('location:../Views/RestaurentPage.php');
    }
    else{
        $_SESSION['remove_status2'] ="Failed to remove from cart"; 
       header('location:../Views/RestaurentPage.php');
    }
  }
  if(isset($_GET['rmv_all'])){
    $remove_all = remove_all_cart($_SESSION['user']);
    if ($remove_all) {
        $_SESSION['remove_all_status'] ="Removed all from cart"; 
       header('location:../Views/RestaurentPage.php');
    }
    else{
        $_SESSION['remove_all_status2'] ="Failed to remove all from cart"; 
       header('location:../Views/RestaurentPage.php');
    }
  }
  // if(isset($_GET['buy_all'])){
  //   $buy_all = buy_all_cart($_SESSION['user']);
  //   if ($buy_all) {
  //       $_SESSION['buy_all_status'] ="Added all to buy"; 
  //      header('location:../Views/RestaurentPage.php');
  //   }
  //   else{
  //       $_SESSION['buy_all_status2'] ="Failed to add all to buy"; 
  //      header('location:../Views/RestaurentPage.php');
  //   }
  // }
?>