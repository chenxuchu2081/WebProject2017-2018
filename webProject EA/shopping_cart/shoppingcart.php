<?php
session_start();
$product_ids = array();

//check Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'add_cart')){
    if(isset($_SESSION['shopping_cart'])){
        
        //record of how mnay products are in the shopping cart
        $count = count($_SESSION['shopping_cart']);
        
        //create number $product array for matching array keys to products id's
        $product_ids = array($_SESSION['shopping_cart'], 'id');
        

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //if the product already exists, increase quantity
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing products in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart don't no exist,create first product array key 0,and then using submit form data
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

//remove the product item
if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart
				//it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link CND-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"><!-- link CND-->
        <script type="text/javascript" src="../JavaScript/index.js"></script>  <!--javascript link file-->
        
       <script src="../jslib/jquery-3.3.1.min.js"></script>
        <!--show checkout form-->
       <script>
           $(document).ready(function(){
              $(".button").click(function(){
                $(".showform").toggle(1000);
                });
            });
       </script>

       <link rel="stylesheet" href="../css/header.css"> <!--css link file-->
        <link rel="stylesheet" href="../css/Footer.css">		<!--css footer link-->
		<style>
            body {
                font-family: Arial;
                padding: 8px;
            }
			.button {
				display: block;
				border-radius: 23px;
				font-size: 16px;
				margin: 25px 0 15px 0;
				background: #23ca10;
				color:white;
				text-align: center;
				padding: 12px;
                width: 100%;
			}

			.button:hover {
				background: #7fa9ff;
				color: white;
			}
			.button:visited {
				color: #7fa9ff;
			}
			.button:active {
				color: #23ca10;
			}
			.btn-danger {
				font-size: 12px;
				padding: 3px;
			}
			
			.table {
			margin: 0px auto;
			}
			.row {
			margin: 0px auto;
			}
			.products {
			border: 1px solid #333;
			background-color: #f1f1f1;
			border-radius: 25px;
			padding: 15px;
			margin-bottom: 21px;
			}
			.centered{
			margin: 0 auto;
			}
		</style>

        <!--checkout form-->
        <style>
            .showform{
            display: none;
            }
            
            .container_checkform {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
           }

        input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }
          
          .icon-container {
         margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
        }  
        
            span.price {
        float: right;
        color: grey;
        }
            
         @media (max-width: 650px) {
        .col-25 {
            margin-bottom: 20px;
        }
    }
        </style>
    </head>
    <body>

         <header>
	  <div class="fix"> 
	  
         <h1 class="highlight" id="jumptop" style="text-align:center;"> Shopping</h1>
		 
      <div class="all_link" id="down_link">
            <a class="home" href="../index.html"><i class="fa fa-home"></i></a>
            <a href="../News.html">News</a>
            <a href="../About.html">About</a>
			<a href="../GPS.html">GPS</a>
            <a href="../Brands/B_Ferrari.html">Brands</a>
            <a href="../form.php" target="_blank">Login</a>
			 <a href="../GuestbookIndex.php">GuestBook</a>
          <a href="shoppingcart.php">Shopping</a>
		  
          <a href="javascript:void(0);" class="icon" onclick ="SlideDownShowLink()">&#9776;</a>
      </div>
	</div>
    </header>

        <div class="container">
        <?php
        //connect the datebase
        $connect = mysqli_connect('localhost', 'root', 'chen12345', 'cart');
        $query = 'SELECT * FROM products ORDER by id ASC';		//select all product form product table
        $result = mysqli_query($connect, $query);
		
		//show products
        if ($result):
            if(mysqli_num_rows($result)>0): //loop product array
                while($product = mysqli_fetch_assoc($result)):
                ?>
					<!--display product date using  styling and add image ,name, price,quantity-->
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="shoppingcart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                            <h4 class="text-info"><?php echo $product['name']; ?></h4>
                            <h4>$ <?php echo $product['price']; ?>M</h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" name="add_cart" style="margin-top:5px;" class="btn btn-info"
                                   value="Add to Cart" />
                        </div>
                    </form>
                </div>

                <?php
                endwhile;
            endif;
        endif;   
        ?>

        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h1 style="text-align: center;">Order Details</h1></th></tr>   
        <tr>  
             <th width="35%">Product Name</th>  
             <th width="15%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
             $total = 0;  
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?>M</td>  
		   <!--calculate each product price and show the data-->
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?>M</td>  
           <td>
               <a href="shoppingcart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  //calculate all product's price of total and show the data
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" style="text-align:right;">Total</td>  
             <td style="text-align:right;">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <button class="button">checkout</button>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
        </div>
        
        <!--checkout form-->

        <div class="showform">
  <div class="row">
    <div class="col-75">
      <div class="container_checkform">
        <form method="POST" action="">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="John ho" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="name@example.com" >
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" >
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="HongKong" >

            <div class="row">
              <div class="col-50">
                <label for="country">country</label>
                <input type="text" id="country" name="country" placeholder="China" >
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" >
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John ho">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button type="submit" value="place_order" name="place_order"class="button">Place order</button>
      </form>
    </div>
    </div>
   </div>
    </div>

        <?php
            /*$errors = array();

            if(isset($_POST['place_order'])){
		        $fullname= mysqli_real_escape_string($connect,$_POST['fname']);
                $email= mysqli_real_escape_string($connect,$_POST['email']);
                $address= mysqli_real_escape_string($connect,$_POST['address']);
                $city= mysqli_real_escape_string($connect,$_POST['city']);
                $country= mysqli_real_escape_string($connect,$_POST['country']);
                $zip= mysqli_real_escape_string($connect,$_POST['zip']);
                $nameoncard=mysqli_real_escape_string($connect,$_POST['cardname']);
                $creditcard_number=mysqli_real_escape_string($connect,$_POST['cardnumber']);
                $exp_month=mysqli_real_escape_string($connect,$_POST['expmonth']);
                $exp_year=mysqli_real_escape_string($connect,$_POST['expyear']);
                $cvv=mysqli_real_escape_string($connect,$_POST['cvv']);
                
               

                //some input is not null
                if (empty($fullname)) { array_push($errors, "Fullname is required"); }
                if (empty($eamil)) { array_push($errors, "Email is required"); }
                if (empty($address)) { array_push($errors, "Address is required"); }
                if (empty($city)) { array_push($errors, "City is required"); }
                if (empty($country)) { array_push($errors, "Country is required"); }
                if (empty($zip)) { array_push($errors, "Zip is required"); }
                if (empty($nameoncard)) { array_push($errors, "Name On Card is required"); }
                if (empty($creditcard_number)) { array_push($errors, "Credit Card Number is required"); }
                if (empty($exp_month)) { array_push($errors, "Exp month is required"); }
                if (empty($exp_year)) { array_push($errors, "Exp_year is required"); }
                if (empty($cvv)) { array_push($errors, "CVV is required"); }

                //insert into the data
                if(count($errors)==0){
                    $query = "INSERT INTO order_info(fullname, email, address,city,country,zip,nameoncard,creditcard_number,exp_month,exp_year,cvv) 
  			                    VALUES('$fullname', '$email', '$address', '$city', '$country', '$zip', '$nameoncard', '$creditcard_number', '$exp_month', '$exp_year','$cvv')";
                                mysqli_query($connect, $query);

                                $message = "Thank for your place order, our company will contact you soon.";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                            //header('location: shoppingcart.php');
                }
            }*/
        ?>
    </body>
</html>
