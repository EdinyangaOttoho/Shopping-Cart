<?php
	if (isset($_POST['emailaddress'])) {
		$email = $_POST['emailaddress'];
		$pass = $_POST['pass'];
		$signin = new SignIn($_POST['emailaddress'],$_POST['pass']); //For SignIn Class
	}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$signup = new SignUp($email,$pass,$firstname,$lastname); //For SignUp class
	}
	if (isset($_GET['offset'])) {
		$off = $_GET['offset'];
		$cat = $_GET['cat'];
		$dep = $_GET['dep'];
		$fetchsales =  new FetchSales($off,$cat,$dep); //For Filtering
	}
	if (isset($_GET['logout'])) {
		@session_start();
		unset($_SESSION['account_email']);
		header('location:https://247naijaforum.com/ecommerce/index.php'); //Logs out a user
	}
	if (isset($_GET['id'])) {
		$addtocart = new AddToCart($_GET['id']); //Request handler for product ID and cart addition
	}
	if (isset($_GET['amt'])) {
		$fetchprice = new FetchPrice($_GET['amt']); //Fetches product prices
	}
	if (isset($_GET['remid'])) {
		$addtocart = new RemoveFromCart($_GET['remid']);	 //Fetches product ID for removal from cart
	}
	if (isset($_GET['arr'])) {
		$printarr = new PrintArray($_GET['arr']); //Gets the cart product IDs
	}
	if (isset($_GET['paid'])) {
		$pay = $_GET['paid'];
		$ref = $_GET['ref'];
		$success = new SuccessfulPayment($pay,$ref); //Sends the payment response to the settings.php
	}
	if (isset($_GET['shippingid'])) {
		$id = $_GET['id'];
		$shippingid = $_GET['shippingid'];
		$type= $_GET['type'];
		$nation = $_GET['nation'];
		$setorders = new ShippingUpdate($id,$nation,$shippingid,$type); //Updates the client product Shipping details
	}
	if (isset($_GET['qstr'])){
		$qstr = new SearchProduct($_GET['qstr']); //Fetches the search button string
	}
?>