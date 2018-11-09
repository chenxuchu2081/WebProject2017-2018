<?php
    //connect db
    session_start();
    $db = mysqli_connect('localhost', 'root', 'chen12345', 'cart');
    $username = "";
    $password = "";
    $errors = array();  

    //form validation
    /*$userIsNotNull = $_POST["uname"];
    $passIsNotNull = $_POST["psw"];

    if(empty($userIsNotNull)){
        $user_error = "賬號欄位空白<br />";
    }
    if(empty($passIsNotNull)){
        $pass_error = "密碼欄位空白<br />";
    }*/

    //login form
    if(isset($_POST['login'])){
        $username=mysqli_escape_string($db,$_POST['uname']);
        $password=mysqli_escape_string($db,$_POST['psw']);
    
    //make sure input is not null
    /*
    if (empty($username)) {
  	    array_push($errors, "Username is required");
    }
    if (empty($password)) {
  	    array_push($errors, "Password is required");
    }*/
    
    if(count($errors)==0){
        $password = md5($password);
        $query = "SELECT * FROM register WHERE username='$username' AND password='$password'";
  	    $results = mysqli_query($db, $query);
    }
    if (mysqli_num_rows($results) == 1) {
         $_SESSION['username'] = $username;
  	     $_SESSION['success'] = "You are now logged in";
  	     //header('location: index.php');
    }else{
        array_push($errors, "Wrong username/password combination");
    }
}

    //remember login form's username and password
    $remember_user="";
    $remember_pass="";
    if(isset($_POST["remember"])){
        $remember_user=$_POST["uname"];
        $remember_pass=$_POST["psw"];
    }
  
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link CND-->
		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"><!-- link CND-->
      <script type="text/javascript" src="JavaScript/index.js"></script>  <!--javascript link file-->
        <title></title>

        <script src="jslib/jquery-3.3.1.min.js"></script><!--jQuery to deal with-->
		 <link rel="stylesheet" href="./css/stylelayout.css"> <!--css link file-->
       <link rel="stylesheet" href="./css/header.css"> <!--css link file-->
        <link rel="stylesheet" href="./css/Footer.css"> <!--css footer link-->
        <script>
            $(document).ready(function () {
               
            });
        </script>

        <style>
            .loginform {
                margin-left: 220px;
                margin-right: 220px;
                }
            .welcome{
                font-size: 20px;
                text-align: center;
            }
				
				@media screen and (max-width: 650px) {
					.loginform {
                margin-left: 0px;
                margin-right: 0px;
                }
				}
			
        </style>
    </head>

    <body>

        <!--Login form that it will show when the mouse click login link-->
       <form method="post" action="form.php" class="loginform">


           <div class="content">
            <!-- logged in user information -->
             <?php  if (isset($_SESSION['username'])) : ?>
    	        <p class="welcome">Welcome: <strong><?php echo $_SESSION['username']; ?></strong></p>
            <?php endif ?>
            </div>


           <?php include('errors.php'); ?>
           
           <div class="imgbox">
		    <center><a class="home" href="index.html"><i class="fa fa-home"></i></a></center>
            <img src="./Picture/head.png" alt="head image" class="headimage" >
           </div>

           <div class="container">
            <label for="uname"><b>用戶</b></label>
            <input type="text" placeholder="Enter Username!" name="uname" id="uname" value="<?php echo $remember_user;?>" required >

            <label for="psw"><b>密碼</b></label>
            <input type="password" placeholder="Enter Password!" name="psw" id="psw" value="<?php echo $remember_pass;?>" required>          

            <button type="submit" class="loginbtn" name="login">登入</button>
               <label>
                   <input type="checkbox" checked="checked" name="remember"> 記住？
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
		
			
             <button type="reset" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
           <div class="container" style="background-color:rgba(244, 244, 244, 0.48)">
             <a href="register.php"><button type="button" class="registerbtn">註冊</button></a>
            </div>
       </form>

        
    </body>
</html>
