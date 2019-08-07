<?php
	@session_start();
	if (isset($_SESSION['account_email'])){}
	else {
		header('location:https://www.247naijaforum.com/ecommerce/index.php');
	}
?>
<html>
	<head>
		<meta name="viewport" content="user-scalable=0,initial-scale=0.8,width=device-width">
		<meta charset="UTF-8">
		<meta name="description" content="Configure and check out some details in your account with you well-customized dashboard">
		<link rel="shortcut icon" href="images/tshirtshop.png">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/dashboard.css">
		<link rel="stylesheet" href="fontawesome/styles.css">
		<style>
             @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
		</style>
		<script src="fontawesome/all.js"></script>
		<title>Go Commerce</title>
	</head>
	<body>
		<button class="slidebar" onclick="slider()"><i class="fas fa-bars"></i></button>
		<a href="index.php"><img class="logo" src="images/tshirtshop.png"></a>
		<!-- Menu bar-->
		<div class="menu">
			<table class="menu-inner" cellspacing="0" cellpadding="0">
				<tr>
					<td class="to-hide">
						<input type="text" id="search-btn"></td>
					</td>
					<td class="to-hide">
						<a href="index.php"><button class="tiny"><i class="fas fa-shopping-cart"></i></button></a>
					</td>
					<?php
						@session_start();
						if (!isset($_SESSION['account_email'])) { ?>
							<td class="to-hide">
								<a href="login.php"><button class="tiny">Login</button></a>
							</td>
							<td class="to-hide">
								<a href="register.php"><button class="tiny">Register</button></a>
							</td>	
						<?php
						}
						else { ?>
							<td>
								<a href="settings.php?logout=true"><button class="tiny to-hide">Sign Out, <?php echo $_SESSION['user_name']; ?></button></a>
						    </td>
						<?php
						}
					?>
				</tr>
			</table>
		</div>
		<!--Body -->
		<div id="body" style="overflow:auto;position:absolute;margin-bottom:30px">
			<center>
				<center><h2 style="font-family:'GothamRounded'"><i class="fas fa-chart-bar"></i> Overall Stats</h2></center>
				<div class="floaters">
					<button class="round-bars-left media">
					<?php
						$host = 'localhost';
						$user = 'naijafo7_root';
						$password = 'danielpatrick';
						$database = 'naijafo7_dstore';
						@session_start();
						$em = $_SESSION['account_email'];
						$db = mysqli_connect($host,$user,$password,$database );
						$q =mysqli_query($db,"SELECT * FROM orders WHERE customer_id = '$em' AND status = 'successful'");
						$cnt = mysqli_num_rows($q);
						echo intval($cnt);
					?>
					</button>
					<h3><center style="font-family:'Roboto'">Completed Orders</center></h3>
				</div>
				<div class="floaters">
					<button class="round-bars-right media">
					<?php
						$host = 'localhost';
						$user = 'naijafo7_root';
						$password = 'danielpatrick';
						$database = 'naijafo7_dstore';
						@session_start();
						$em = $_SESSION['account_email'];
						$db = mysqli_connect($host,$user,$password,$database );
						$q =mysqli_query($db,"SELECT * FROM orders WHERE customer_id = '$em' AND status = 'Pending'");
						$cnt = mysqli_num_rows($q);
						echo intval($cnt);
					?>
					</button>
					<h3><center style="font-family:'Roboto'">Pending Orders</center></h3>
				</div>
				<br/>
				<i class="fas fa-info-circle"></i> Products will be delivered at your nation's international airport
				<br/>
				<br/>
				<br/>
				<table class="Pending-orders" cellspacing="0" cellpadding="10">
					<tr>
						<td style="background-color:gold;font-family:GothamRounded">
							Order ID
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Created On
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Price ($)
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Transaction Ref
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Shipping ID
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Delivery Date
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							Charge ($)
						</td>
						<td style="background-color:gold;font-family:GothamRounded">
							
						</td>
					</tr>
		<?php
			$host = 'localhost';
			$user = 'naijafo7_root';
			$password = 'danielpatrick';
			$database = 'naijafo7_dstore';
			@session_start();
			$em = $_SESSION['account_email'];
			$db = mysqli_connect($host,$user,$password,$database );
			$q = mysqli_query($db,"SELECT * FROM orders WHERE customer_id = '$em' AND status = 'Pending' OR status = 'progress'");
			while ($r = mysqli_fetch_array($q)) { ?>
				<tr>
						<td>
							<?php echo $r['order_id']; ?>
						</td>
						<td>
							<?php echo $r['created_on']; ?>
						</td>
						<td>
							<?php echo $r['price']; ?>
						</td>
						<td>
							<?php echo $r['reference']; ?>
						</td>
						<td>
							<?php echo $r['shipping_id']; ?>
						</td>
						<td>
							<?php echo $r['delivery_date']; ?>
						</td>
						<td>
							<?php echo $r['charge']; ?>
						</td>
						<td>
							<?php 
								if ($r['status'] == 'Pending') { ?>
									<button class="update" id="<?php echo $r['order_id']; ?>" onclick="pop(this.id)">Update</button>
								<?php
								}
							?>
						</td>
					</tr>
			<?php
			}
			$cnt = mysqli_num_rows($q);
			if ($cnt >= 1) { 
			}
			else {?>
				<tr><td colspan="7"><center style="font-family:'GothamRounded'">Nothing available yet</center></td></tr>
			<?php
			}
	    ?>
	    </table>
				<br/>
				<br/>
				<table class="complete-orders"  cellspacing="0" cellpadding="10">
					<tr>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Order ID
						</td>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Delivery Date
						</td>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Price ($)
						</td>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Transaction Ref
						</td>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Shipping ID
						</td>
						<td style="background-color:powderblue;font-family:GothamRounded">
							Charge ($)
						</td>
					</tr>
					<?php
			$host = 'localhost';
			$user = 'naijafo7_root';
			$password = 'danielpatrick';
			$database = 'naijafo7_dstore';
			@session_start();
			$em = $_SESSION['account_email'];
			$db = mysqli_connect($host,$user,$password,$database );
			$q =mysqli_query($db,"SELECT * FROM orders WHERE customer_id = '$em' AND status = 'successful'");
			while ($r = mysqli_fetch_array($q)) { ?>
				<tr>
						<td>
							<?php echo $r['order_id']; ?>
						</td>
						<td>
							<?php echo $r['created_on']; ?>
						</td>
						<td>
							<?php echo $r['delivery_date']; ?>
						</td>
						<td>
							<?php echo $r['price']; ?>
						</td>
						<td>
							<?php echo $r['reference']; ?>
						</td>
						<td>
							<?php echo $r['shipping_id']; ?>
						</td>
						<td>
							<?php echo $r['charge']; ?>
						</td>
					</tr>
			<?php
			}
			$cnt = mysqli_num_rows($q);
			if ($cnt >= 1) { 
			}
			else {?>
				<tr><td colspan="7"><center style="font-family:'GothamRounded'">Nothing available yet</center></td></tr>
			<?php
			}
	    ?>
				</table>
			</center>
	    </div>
	    <script src="js/index.js"></script>
		<div class="slideout">
				<p align="right"><button class="close" onclick="slider()">&times;</button></p>
				<br/>
				<br/>
				<a href="index.php"><i class="fas fa-home"></i> Home</a>
				<br/>
				<br/>
				<br/>
				<?php
						@session_start();
						if (!isset($_SESSION['account_email'])) { ?>
							<a href="register.php"><i class="fas fa-pencil-alt"></i> Register</a>
							<br/>
							<br/>
							<br/>
							<a href="login.php"><i class="fas fa-user"></i> Login</a>
							<br/>
							<br/>
							<br/>
						<?php
						}
						else { ?>
							<a href="settings.php?logout=true"><i class="fas fa-sign-out-alt"></i> Sign Out, <?php echo $_SESSION['user_name']; ?></a>
							<br/>
							<br/>
							<br/>
							<a href="options.php"><i class="fas fa-cog"></i> Options</a>
							<br/>
							<br/>
						<?php
						}
					?>
				<center>
					<table style="width:95%">
						<tr>
							<td style="width:20px">
								<i class="fas fa-search"></i>
							</td>
							<td>
								<input type="text" class="input" style="width:100%">
							</td>
						</tr>
					</table>
			    </center>
			</div>
			<div class="full-screen-size" id="full-screen-size">
				<center>
					<div id="order-settings" style="text-align:left">
						<p align="right">
							<button class="close" onclick="_('full-screen-size').style.display = 'none'">&times;</button>
						</p>
						<center><h2 style="font-family:'GothamRounded'">Update Order</h2></center>
						<br/>
						<label class="title">Select your Region:</label>
						<br/>
						<select id="region" style="margin-top:5px" onchange="inptype(this.id,this.options[this.selectedIndex].value)" class="selections">
							<option>US/Canada</option>
							<option>Europe</option>
							<option>Rest of World</option>
						</select>
						<br/>
						<br/>
						<label class="title">Enter Country:</label>
						<br/>
						<input type="text" id="nation" class="selections">
						<br/>
						<br/>
						<label class="title">Shipping Type:</label>
						<br/>
						<select id="type" style="margin-top:5px" onchange="inptype(this.id,this.options[this.selectedIndex].value)" class="selections">
							<option>Next Day Delivery ($20)</option>
							<option>3-4 Days ($10)</option>
							<option>7 Days ($5)</option>
						</select>
						<br/>
						<br/>
						<br/>
						<center><button class="buy-now" id="uporders">Update</button></center>
						<br/>
					</div>
				</center>
			</div>
			<div id="error"></div>
			<script src="js/dashboard.js"></script>
	</body>
</html>
