<?php
/*
	session_start();
	$item_ids = array();

	if(filter_input(INPUT_POST,'add_to_cart')){
		if isset($_SESSION['shopping_cart']){
			//count items in cart
			$count = count($_SESSION['shopping_cart']);
			//create array matching array keys to item ids
			$item_ids = array_column($_SESSION['shopping_cart'],'item_id');

			printt($item_ids);
			
			if (!in_array(filter_input(INPUT_GET, 'item_id', $item_ids))){
				$_SESSION['shopping_cart'][$count] = array	
					(
						'id' => filter_input(INPUT_GET, 'item_id'),
						'name' => filter_input(INPUT_POST, 'name'),
						'price' => filter_input(INPUT_POST, 'price'),
						'quantity' => filter_input(INPUT_POST, 'quantity')
					);
			}
		} 
		else { //product already exists in cart, increase quantity
			//match array key to id of added item
			for($i=0;$i<count($item_ids);$i++){
				//add item quantity
				$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
			}
		}
		else
	}s

	function printt($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add-Ons - Ultimate Foods</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta name="author" content="CPS530 Group 9 - Section 3 & 4" >
 	<meta name="description" content="Ultimate Foods - CPS530 Final Project">

 	<link href="./css/menu.css" rel="stylesheet" type="text/css"/>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
	
</head>
<body style="overflow-x: hidden;">
	<div class="navBar">
		<nav class="navbar navbar-expand-sm custom-navbar" >
			<a href="https://scs.ryerson.ca/~vandreut/index.html">
				<img src="./png/platterlogo1.png" class="navbar-brand" style="height:60px; width:80px;"></img>
			</a>
			<button class="navbar-toggler custom-toggler">
				<span class="navbar-toggler-icon" data-toggle="collapse" data-target="#navbar">
				
				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item"></li>
					<a href="https://scs.ryerson.ca/~vandreut/menuIndex.html" class="nav-link">Menu</a>
					<a href="https://scs.ryerson.ca/~vandreut/coupons.html" class="nav-link">Coupons</a>
					<a href="https://scs.ryerson.ca/~vandreut/contactForm.html" class="nav-link">Contact Us </a>
					<a href="https://scs.ryerson.ca/~vandreut/locations.html" class="nav-link">Locations </a>
					
				</ul>			
			</div>
		</nav>
	</div><br>

    
    <div class="row" id="banner">
        <div class="col-lg-12">
        <p class="category-name">ADD - ONS</p>
        <img src="./png/line.png" class="img-fluid" id="underline" alt="Pizza" ></img>
        </div>
    </div>
	<br><br><br>

    <p id="category" style="text-align:center; font-size: 3vh;"><strong><em>All products are one size.</em></strong></p>
	<?php
		$mysqli= new mysqli("localhost", "vandreut", "Zighpyb7", "vandreut");
		if ($mysqli -> connect_errno) {
			exit();
		}
		$search="SELECT * FROM menuItems";
		$result=$mysqli->query($search);
		if ($result) {
        ?>
            <div style="margin-top:10%; margin-left:2%"><h2><i><b> Dipping Sauces </b></i><h2></div>
            <div class="row" id="menu" style="margin-top:-9%">
        <?php
			while($row = $result->fetch_assoc()) {
                if($row['type'] == "addon_dip"){
                ?>
				<div class="col-lg-3 col-m-4 col-sm-6">
					<form method="post" action="addonMenu.php?action=add&item_id= <?php echo $row['item_id']; ?>">
						<div class="card">
							<img class="card-img-top" src="<?php echo $row['url'];?>" alt="Card image cap">
							<div class="card-body text-center">
								<h5 class="card-title"><?php echo $row['name']; ?></h5>
								<p class="card-text"><?php echo $row['description']; ?></p>
								<p><strong>Price: $<?php echo $row['price']; ?></strong> &nbsp; 
								<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add To Cart"></p>
							</div>
						</div>
					</form>
				</div>
				<?php
                }
            }
        } else {
            printf("Database Error.");
		}

		$search="SELECT * FROM menuItems";
		$result=$mysqli->query($search);
		if ($result) {
        ?>
            <div style="margin-top:2%; margin-left:2%"><h2><i><b> Drinks </b></i><h2></div>
			<div class="row" id="menu" style="margin-top:-10%">
        <?php
			while($row1 = $result->fetch_assoc()) {
                if($row1['type'] == "addon_drink"){
                ?>
				<div class="col-lg-3 col-m-4 col-sm-6">
					<form method="post" action="addonMenu.php?action=add&item_id= <?php echo $row1['item_id']; ?>">
						<div class="card">
							<img class="card-img-top" src="<?php echo $row1['url'];?>" alt="Card image cap">
							<div class="card-body text-center">
								<h5 class="card-title"><?php echo $row1['name']; ?></h5>
								<p class="card-text"><?php echo $row1['description']; ?></p>
								<p><strong>Price: $<?php echo $row1['price']; ?></strong> &nbsp; 
								<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add To Cart"></p>
							</div>
						</div>
					</form>
				</div>
				<?php
                }
            }
        } else {
            printf("Database Error.");
		}
		$search="SELECT * FROM menuItems";
		$result=$mysqli->query($search);
		if ($result) {
        ?>
            <div style="margin-top:2%; margin-left:2%"><h2><i><b> Sides </b></i><h2></div>
			<div class="row" id="menu" style="margin-top:-10%">
        <?php
			while($row2 = $result->fetch_assoc()) {
                if($row2['type'] == "addon_side"){
                ?>
				<div class="col-lg-3 col-m-4 col-sm-6">
					<form method="post" action="addonMenu.php?action=add&item_id= <?php echo $row2['item_id']; ?>">
						<div class="card">
							<img class="card-img-top" src="<?php echo $row2['url'];?>" alt="Card image cap">
							<div class="card-body text-center">
								<h5 class="card-title"><?php echo $row2['name']; ?></h5>
								<p class="card-text"><?php echo $row2['description']; ?></p>
								<p><strong>Price: $<?php echo $row2['price']; ?></strong> &nbsp; 
								<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add To Cart"></p>
							</div>
						</div>
					</form>
				</div>
				<?php
                }
            }
        }
	?> 
	</div>
	</div>
	</div>
    <br><br>


<footer class="page-footer">
    <div class="container-fluid text-center" style="background-color:  #c7aa89;">
        <div class="row">
            <div class="col-md-3 mx-auto"><br><br>
                <h3 class="text-uppercase" style="color: #5C2E00;"><strong>Our Mission</strong></h3><br>
                <p style="font-size:17px;">From our ovens to your table, we pride ourselves in delivering a variety of different high quality food to you and your loved ones.</p>
            </div>
            <div class="col-md-3 mx-auto"><br><br><br>
                <img src="./png/platterlogo1.png" class="center-block" style="height:60px; width:80px;"></img>
                <h3 class="text-uppercase " style="color: #5C2E00; 	font-family: 'Courgette', bold; "><strong>Ultimate Foods</Strong></h3>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mx-auto"><br><br>
                <h3 class="text-uppercase" style="color: #5C2E00;"><strong>Links</strong></h3>

                <ul class="list-unstyled" style="text-align: center;">
                    <li, style="color:black">
                        <a style="color: black;font-size:20px;" href="https://scs.ryerson.ca/~vandreut/menuIndex.html">Browse the menu</a>
                    </li><br>
                    <li, style="color:black">
                        <a style="color: black;font-size:20px;" href ="https://scs.ryerson.ca/~vandreut/coupons.html">View coupons</a>
                    </li><br>
                    <li, style="color:black">
                        <a  style="color: black; font-size:20px;" href="https://scs.ryerson.ca/~vandreut/contactForm.html">Contact us</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3" style="background-color:  #c7aa89;"><em>@Copyright 2020-2021<strong>  <a style="color:black"href=".https://scs.ryerson.ca/~vandreut/"> Ultimate Foods</a></strong> All rights reserved.</em>
 
    </div>
    </footer>
</body>
</html>

<!--+----------------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------+
	| name           | url                                                                                                                                                               |
	+----------------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------+
	| honey mustard  | https://sweetandsavorymeals.com/wp-content/uploads/2020/01/Honey-Mustard-Sauce-2.jpg                                                                              |
	| Chipotle Aioli | https://minimalistbaker.com/wp-content/uploads/2016/09/Vegan-Chipotle-Aioli-SQUARE.jpg                                                                            |
	| Spicy Soy Mayo | https://img.sunset02.com/sites/default/files/spicy-soy-mayo-su.jpg                                                                                                |
	| Avocado Ranch  | https://i.pinimg.com/736x/04/b4/3d/04b43d9b9fffe06ee2a3c6666ce03f3a.jpg                                                                                           |
	| Cola           | https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/topic_centers/2019-12/Soda_1296x728-header.jpg?w=1155&h=1528                                    |
	| Coffee         | https://post.healthline.com/wp-content/uploads/2020/08/ways-to-make-coffee-super-healthy-732x549-thumbnail-732x549.jpg                                            |
	| Orange Juice   | https://www.earthfoodandfire.com/wp-content/uploads/2018/04/Homemade-Orange-Juice.jpg                                                                             |
	| Hot Chocolate  | https://thecookful.com/wp-content/uploads/2015/12/How-to-Make-Hot-CocoaHow-to-Make-Hot-CocoaDSC_4177-feature-680.jpg                                              |
	| French Fries   | https://img.apmcdn.org/4b2716626c9ff3f6e5dfebe520eb592c33cf1e7b/uncropped/941f50-splendid-table-french-fries.jpg                                                  |
	| Green Salad    | https://tmbidigitalassetsazure.blob.core.windows.net/rms3-prod/attachments/37/1200x1200/Green-Salad-with-Tangy-Basil-Vinaigrette_EXPS_TOHAM20_49115_B10_29_1b.jpg |
	| Poutine        | https://chefcuisto.com/files/2014/03/poutine-maison.jpg                                                                                                           |
	| Onion Rings    | https://recipefairy.com/wp-content/uploads/2020/01/onion-rings-burger-king.png                                                                                    |
	+----------------+-------------------------------------------------------------------------------------------------------------------------------------------------------------------+-->