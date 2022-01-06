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
	}

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
	<title>Dessert - Ultimate Foods</title>
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
            <a href="https://scs.ryerson.ca/~vandreut/">
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
        <p class="category-name">Dessert</p>
        <img src="./png/line.png" class="img-fluid" id="underline" alt="Pizza" ></img>
        </div>
    </div>
    <br><br><br>

    <p id="category" style="text-align:center;font-size: 3vh;"><strong><em>All products are one size.</em></strong></p>
    <div class="row" id="menu">
    <?php
		$mysqli= new mysqli("localhost", "vandreut", "Zighpyb7", "vandreut");
		if ($mysqli -> connect_errno) {
			exit();
		}
		$search="SELECT * FROM menuItems";
		$result=$mysqli->query($search);
		if ($result) {
			while($row = $result->fetch_assoc()) {
				if ($row['type'] == "dessert"){
					?>
						<div class = "col-lg-3 col-md-4 col-sm-6">
							<form method="post" action="dessertMenu.php?action=add&item_id= <?php echo $row['item_id']; ?>">
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
		}
		else{
			printf("Database Error.");
		}
	?> 
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
    <div class="footer-copyright text-center py-3" style="background-color:  #c7aa89;"><em>@Copyright 2020-2021<strong>  <a style="color:black"href="https://scs.ryerson.ca/~vandreut/"> Ultimate Foods</a></strong> All rights reserved.</em>
 
    </div>
</footer>
</body>
</html>

<!-- References -->
<!--+---------------------------+-----------------------------------------------------------------------------------------------------------------------+
    | name                      | url                                                                                                                   |
    +---------------------------+-----------------------------------------------------------------------------------------------------------------------+
    | Brownie Lasagna           | https://i.redd.it/wyg90yq5icw31.png                                                                                   |
    | Caramel Cake              | https://static.onecms.io/wp-content/uploads/sites/9/2017/11/14/201009-xl-revelatory-caramel-cake.jpg                  |
    | Oreo Cheesecake           | https://bakingamoment.com/wp-content/uploads/2018/09/IMG_9724-best-oreo-cheesecake-recipe-square.jpg                  |
    | Mini Ice Cream Sandwiches | https://tastesbetterfromscratch.com/wp-content/uploads/2019/06/Brownie-Ice-Cream-Sandwiches-7.jpg                     |
    | Chocolate Chip Muffin     | https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F4470819.jpg |
    | Lemon Gelato              | https://bellalimento.com/wp-content/uploads/2010/04/lemon_gelato3_wm-320x320.jpg                                      |
    | Tiramisu                  | https://upload.wikimedia.org/wikipedia/commons/5/58/Tiramisu_-_Raffaele_Diomede.jpg                                   |
    | Cheesecake                | https://i2.wp.com/www.sugarspunrun.com/wp-content/uploads/2019/01/Best-Cheesecake-Recipe-2-1-of-1-4.jpg               |
    +---------------------------+-----------------------------------------------------------------------------------------------------------------------+-->