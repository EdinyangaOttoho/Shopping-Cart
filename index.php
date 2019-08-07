<html>
	<head>
		<link rel="stylesheet" href="css/cart.css">
		<link rel="shortcut icon" href="images/tshirtshop.png">
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/product.css">
		<script src="https://js.paystack.co/v1/inline.js"></script>
		<meta name="viewport" content="user-scalable=0,initial-scale=0.8,width=device-width">
		<meta charset="UTF-8">
		<meta name="description" content="Buy all your desired T-shirts here at affordable costs. You will leave with no regrets after being offered our services">
		<link rel="stylesheet" href="fontawesome/styles.css">
		<style>
             @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
		</style>
		<script src="fontawesome/all.js"></script>
		<title>Go Commerce</title>
	</head>
	<body onload="fetchData();see()">
		<button class="slidebar" onclick="slider()"><i class="fas fa-bars"></i></button>
		<a href="index.php"><img class="logo" src="images/tshirtshop.png"></a>
		<!-- Menu bar-->
		<div class="menu">
			<table class="menu-inner" cellspacing="0" cellpadding="0">
				<tr>
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
								<a href="requests.php?logout=true"><button class="tiny to-hide">Sign Out, <?php echo $_SESSION['user_name']; ?></button></a>
						    </td>
						    <td>
								<a href="options.php"><button class="tiny to-hide">Options</button></a>
						    </td>
						<?php
						}
					?>
				</tr>
			</table>
		</div>
		<!--Body -->
		<div id="body">
		    <div class="shopping-area">
		    	<center>
			    		<div class="left-bar to-hide">
			    			<br/>
			    			<i class="fas fa-search"></i> <input type="text" class="search-input" style="margin-left:5px" oninput="searchnow(this.value)">
			    			<br/>
			    			<br/>
			    			<br/>
	    					<label class="headings">Departments</label>
	    					<div id="departments">
	    						<hr/>
	    						<br/>
	    						<?php
	    							$host = 'localhost';
	    							$user = 'naijafo7_root';
	    							$password = 'danielpatrick';
	    							$database = 'naijafo7_dstore';
	    							$db = mysqli_connect($host,$user,$password,$database);
	    							$q = mysqli_query($db,"SELECT * FROM department");
	    							while ($r = mysqli_fetch_array($q)) { ?>
	    								 <label class="captions" onclick="dep(<?php echo $r['department_id']; ?>)"><?php echo $r['name']; ?></label>
	    								 <br/>
	    								 <br/>	
	    							<?php
	    							}
	    						?>
		    					<br/>
		    				</div>
		    				<div id="category"></div>
			    		</div>
			    		<div class="right-bar">
	    					<center><label class="headings">Products</label></center>
	    					<hr/>
	    					<div id ="navigator">
		    					<button class="arrow" onclick="reduce()">
		    						<i class="fas fa-arrow-alt-circle-left"></i>
		    					</button>
		    					<button class="click" id="x1" onclick="getOffset(1)">1</button>
		    					<button class="click" id="x2" onclick="getOffset(10)">2</button>
		    					<button class="click" id="x3" onclick="getOffset(20)">3</button>
		    					<button class="click" id="x4" onclick="getOffset(30)">4</button>
		    					<button class="click" id="x5" onclick="getOffset(40)">5</button>
		    					<button class="click" id="x6" onclick="getOffset(50)">6</button>
		    					<button class="click" id="x7" onclick="getOffset(60)">7</button>
		    					<button class="click" id="x8" onclick="getOffset(70)">8</button>
		    					<button class="click" id="x9" onclick="getOffset(80)">9</button>
		    					<button class="click" id="x10" onclick="getOffset(90)">10</button>
		    					<button class="click" id="x11" onclick="getOffset(100)">11</button>
		    					<button class="arrow" onclick="increase()">
		    						<i class="fas fa-arrow-alt-circle-right"></i>
		    					</button>
		    					<div class="numeration">
		    						101 total
		    					</div>
	    					</div>
	    					<br/>
	    					<div id="products" style="width:100%">

	    					</div>
	    					<br/>
	    					<br/>
			    		</div>
		    	</center>
		    </div>
		    <!-- Footer -->
			<div class="foot">
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
			<script src="js/fetch.js"></script>
			<div id="error"></div>
		</div>
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
							<a href="requests.php?logout=true"><i class="fas fa-sign-out-alt"></i> Sign Out, <?php echo $_SESSION['user_name']; ?></a>
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
								<i class="fas fa-search" oninput="searchnow(this.value)"></i>
							</td>
							<td>
								<input type="text" class="input" style="width:100%">
							</td>
						</tr>
					</table>
			    </center>
			</div>
			<?php
					@session_start();
					if (isset($_SESSION['account_email'])) { ?>
						<button class="cart-button" onclick="discart()">
							<i class="fas fa-shopping-cart"></i>
						</button>
					<?php
					}
			?>
			<div class="big-cart" id="shopcart">
				<div style="height:100%;overflow:auto;width:100%">
					<div class="checkout-inner">
					<?php
					    $number = 0;
						$host = 'localhost';
			            $user = 'naijafo7_root';
			            $password = 'danielpatrick';
			            $database = 'naijafo7_dstore';
			            $db = mysqli_connect($host,$user,$password,$database);
			            @session_start();
			            $em = $_SESSION['account_email'];
			            $q = mysqli_query($db,"SELECT * FROM shopping_cart WHERE cart_id = '$em'");
			            $number = mysqli_num_rows($q);
			            $cnt = mysqli_num_rows($q);?>
			            <script>
			            	var cartnum = <?php echo $cnt; ?>;
			            </script>
			            <?php
			            if ($cnt >= 0) { ?>
			            <?php
			            }
			            while ($r = mysqli_fetch_array($q)) { ?>
			            	<div class="cart-text">
			            		<table style="width:100%">
			            			<tr>
			            				<td style="width:80%">
			            					<?php 
			            					    $id = $r['product_id'];
			            					    $q2 = mysqli_query($db, "SELECT * FROM product WHERE product_id = '$id'");
			            					    $name = '';
			            					    $price = '';
			            					    while ($r2 = mysqli_fetch_array($q2)) {
			            					    	$name = $r2['name'];
			            					    	$price = $r2['discounted_price'];
			            					    }?>
			            					    <center style="text-align:left;font-family:'GothamRounded'"><?php echo $name; ?></center>
			            					<?php
			            					?>
			            				</td>
			            				<td>
			            					<center style="font-family:'Roboto'" class="tag">
			            						<?php
			            						 	if ($price == '0.00') {
			            						 		echo 'FREE';
			            						 	}
			            						 	else {
			            						 		echo '$'.$price;	
			            						 	}
			            							 ?>
			            						</center>
			            				</td>
			            				<td style="width:14px">
			            					<button class="close ids" onclick="remelem(this.id)" id="<?php echo $id; ?>">&times;</button>
			            				</td>
			            			</tr>
			            		</table>
			            	</div>
			            <?php	
			            }
			            $cn = mysqli_num_rows($q);
			            if ($cn == 0) {
			                echo '<br/><center style="font-family:\'GothamRounded\'">Nothing to display here</center>';
			            }
			            else {
			                echo '<br/>
			            <br/>
			                    <center><button class="buy-now" onclick="checkbuy()">View Details</button></center>';
			            }
					?>
				</div>
			</div>
			</table>
			</div>
	</body>
	<?php
		if (isset($_SESSION['account_email'])) { ?>
			<button id="num-cart"><?php echo $number; ?></button>
		<?php
		}
	?>
	<div class="payment" id="payment">
		 
	</div>
	<div class="view-details" id="view-details">
		<center>
			 <div id="inner">
			 	
			 </div>
		</center>
	</div>
	<script src="js/cart.js"></script>
	<script src="js/pay.js"></script>
	<script src="js/product.js"></script>
</html>