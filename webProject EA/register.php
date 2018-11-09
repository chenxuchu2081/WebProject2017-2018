<?php
    session_start();
	//connect database
	$db = mysqli_connect('localhost','root','chen12345','cart');
	
    //variable to store
    $username = "";
    $email    = "";
    $errors = array(); 

    //register form////////////////////////////////////////////////////////////
	//check register button was sended
	if(isset($_POST['register'])){
        //get the input value in the form
		$username = mysqli_real_escape_string($db,$_POST['user']);
		$email =  mysqli_real_escape_string($db,$_POST['email']);
        $password =  mysqli_real_escape_string($db,$_POST['pass']);
        $password1 =  mysqli_real_escape_string($db,$_POST['password_confirm']);
	
        //fix the problems to use mysql_real_escape_string  

        if (empty($username)) { array_push($errors, "Username is required"); }
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password)) { array_push($errors, "Password is required"); }

        if ($password != $password1) {
            //adding (array_push()) function add error of an array
	        array_push($errors, "The passwords is not same!");
        }
        

        //check the database
        //the user does not exit the same username or email
        $query = "SELECT * FROM register WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db,$query);
        $user = mysqli_fetch_assoc($result);
    
        //the user was exits
        if($user){
            if($user['username']== $username){
                array_push($errors, "The username exists");
            }
        //the email was exits
            if ($user['email'] == $email) {
                array_push($errors, "The email exists");
            }
        }

        //finally the register form is not any errors 
        if(count($errors)==0){
            $password = md5($password);//encrypt the password and then saving it to the database
            $add_table_value ="INSERT INTO register (username, email, password) 
  			                    VALUES('$username', '$email', '$password')";
            // Execute the query
            mysqli_query($db, $add_table_value);
            $_SESSION['username'] = $username;
  	        $_SESSION['success'] = "You are now logged in";
            /*$message = "You are now logged in";
            echo "<script type='text/javascript'>alert('$message');</script>";*/
  	        header('location: form.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link CND-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"><!-- link CND-->
        <link rel="stylesheet" href="./css/stylelayout.css"> <!--css link file-->
        <link rel="stylesheet" href="./css/Footer.css"> <!--css footer link-->
        <title>Register Form</title>

        <style>
            .registerbtn{
                width: 100%; 
            }
            .registerform{
                margin-left: 220px;
                margin-right: 220px;
            }
			.errors{
				color:DodgerBlue;
				font-family: "Times New Roman", Times, serif;
				font-size: 23px;
			}
			
			@media screen and (max-width: 650px) {
				.registerbtn{
                width: 100%; 
            }
            .registerform{
                margin-left: 0px;
                margin-right: 0px;
            }
  
			}
        </style>
    </head>
    <body>
       
        <!--register form-->
        <form method="post" action="register.php" class="registerform">
            <h1 style="text-align: center">註冊表</h1>
			
			<div class="errors">
            <!--show the form errors-->
            <?php include('errors.php'); ?>
			</div>
	

           <section class="container">
            <div id="userDiv">
                <label for="user"><b>使用者名稱：</b></label>
                <input type="text" name="user" id="user" placeholder="Enter username" value="<?php echo $username?>"/>
                <p style="color: #e81212;">用户名可以包含任何字母或数字，不含空格</p>
            </div>

            <div id="emailDiv">
                <label for="email"><b>電子郵件:</b></label>
                <input type="text" name="email" id="email" placeholder="Enter email" value="<?php echo $email; ?>" />
                <p style="color: #e81212;">密码应至少为4个字符</p>
            </div>

            <div id="passwordDiv">
                <label for="password"><b>使用者密碼：</b></label>
                <input type="password" name="pass" id="pass" placeholder="Enter Password" />
                <p style="color: #e81212;">请提供您的电子邮件</p>
            </div>

            <div id="password_confirmDiv">
                <label for="password_confirm" ><b>密碼（确认）:</b></label>
                <input type="password" name="password_confirm" id="password_confirm" placeholder="confirm password" />
                <p style="color: #e81212;">请确认密码</p>
            </div>

             <div class="container" style="background-color:rgba(244, 244, 244, 0.48)">
                <button type="submit" id="register" name="register" class="registerbtn">註冊</button>
             </div>

           </section>
        </form>

        <footer class="footer-container">

			<div class="footer-left">


				<p class="footer-links">
					<a href="index.html">Home</a>
					·
					<a href="GuestbookIndex.php">GuestBook</a>
					·
					<a href="About.html">About</a>
					·
                    <a href="./shopping_cart/shoppingcart.php">Shopping</a>
                    .
                    <a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Sports car Company &copy; 2018</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>地區:地區:灣仔,火炭,將軍澳</span>
					<a href="GPS.html">詳情請按這裏</a></p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>電話: +852 68005521</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p>電郵:<a href="mailto: 2018projectdb@gmail.com"> 2018projectdb@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>關於</span>
					讓人們隨時隨地買車,了解品牌,交流心得,分享感想的平台
				</p>

				<div class="footer-icons">
			<a href="https://zh-hk.facebook.com/" class="fa fa-facebook"></a>
			<a href="https://twitter.com/?lang=zh-tw" class="fa fa-twitter"></a>
			<a href="https://www.google.com.hk/" class="fa fa-google"></a>
			<a href="https://www.youtube.com/" class="fa fa-youtube"></a>
				</div>

			</div>
		
		<div id="footer">
			 <p>
			  Webpage made by Chiu Ka Yau,CHEN xuchu,吳國宏 </a>
			  </p>
		 </div>	  
    </footer>
    </body>
</html>