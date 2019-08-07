<html>
	<head>
		<meta name="viewport" content="user-scalable=0,initial-scale=0.8,width=device-width">
		<meta charset="UTF-8">
		<meta name="description" content="Login to Buy all your desired T-shirts here at affordable costs. You will leave with no regrets after being offered our services">
		<link rel="shortcut icon" href="images/tshirtshop.png">
		<link rel="stylesheet" href="css/index.css">
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
						<a href="index.php"><button class="tiny"><i class="fas fa-shopping-cart"></i></button></a>
					</td>
					<td class="to-hide">
						<a href="login.php"><button class="tiny">Login</button></a>
					</td>
					<td class="to-hide">
						<a href="register.php"><button class="tiny">Register</button></a>
					</td>
				</tr>
			</table>
		</div>
		<!--Body -->
		<div id="body">
			
		</div>
		<!--Form -->
		<div class="form-modal">
			<center><h1 class="small" style="color:hotpink">Login</h1></center>
			<br/>
			<form method="POST" id="form">
				<div class="head" id="c1">Email *</div>
				<div class="span">
					<input type="text" class="field" id="c2" name="emailaddress">
				</div>
				<label id="email-error" class="errors"></label>
				<br/>
				<br/>
				<div class="head" id="d1">Password *</div>
				<div class="span">
					<input type="password" class="field" id="d2" name="pass">
				</div>
				<label id="password-error" class="errors"></label>
				<br/>
				<br/>
				<center>
					<button type="button" class="submit" id="submit" onclick="login()">SUBMIT</button>
				</center>
				<br/>
				</div>
			</form>
			<br/>
			<br/>
			<br/>
			<div class="foo">
				<center>
					<table class="footer-float">
						<tr>
							<td >
									<h3>Questions?</h3>
									<a href="">Help</a>
									<br/>
									<br/>
									<a href="">Track Order</a>
									<br/>
									<br/>
									<a href="">Returns</a>
									<br/>
									<br/>
									<br/>
							</td>
						</tr>
					</table>
					<table class="footer-float">
						<tr>
							<td >
								<h3>What's In Store?</h3>
									<a href="">Women</a>
									<br/>
									<br/>
									<a href="">Men</a>
									<br/>
									<br/>
									<a href="">Products A-Z</a>
									<br/>
									<br/>
									<a href="">Buy Gift Voucher</a>
							</td>
						</tr>
					</table>
					<table class="footer-float">
						<tr>
							<td >
									<h3>Follow Us</h3>
									<a href=""><i class="fab fa-facebook"></i> Facebook</a>
									<br/>
									<br/>
									<a href=""><i class="fab fa-twitter"></i>Twitter</a>
									<br/>
									<br/>
									<a href=""><i class="fab fa-youtube"></i>Youtube</a>
									<br/>
									<br/>
									<br/>
							</td>
						</tr>
					</table>
				<div class="alt-footer">
					<center>&copy; 2019 Tshirt Stores</center>
				</div>
				</center>
			</div>
		<script src="js/index.js"></script>
		<div id="error"></div>
		<div class="slideout">
			<p align="right"><button class="close" onclick="slider()">&times;</button></p>
			<br/>
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
						<a href="settings.php?logout=true"><i class="fas fa-door-open"></i> Sign Out, <?php echo $_SESSION['user_name']; ?></a>
						<br/>
						<br/>
						<br/>
						<button class="settings"><i class="fas fa-cog"></i> Options</button>
						<br/>
						<br/>
					<?php
					}
				?>
			<br/>
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
	</body>
</html>