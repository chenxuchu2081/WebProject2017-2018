<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>顯示訪客留言</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link CND-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"><!-- link CND-->
      <script type="text/javascript" src="JavaScript/index.js"></script>  <!--javascript link file-->

        <script src="jslib/jquery-3.3.1.min.js"></script>
       <link rel="stylesheet" href="./css/stylelayout.css"> <!--css link file-->
       <link rel="stylesheet" href="./css/header.css"> <!--css link file-->
        <link rel="stylesheet" href="./css/Footer.css"> <!--css footer link-->

        <style>
            .fix_right{
                float: right;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
            }
        </style>
    </head>

    <body>
        <header>
	  <div class="fix"> 
	  
         <h1 class="highlight" id="jumptop" style="text-align:center;"> 訪客區</h1>
		 
     <div class="all_link" id="down_link">
            <a class="home" href="index.html"><i class="fa fa-home"></i></a>
            <a href="News.html">News</a>
            <a href="About.html">About</a>
			<a href="GPS.html">GPS</a>
             <a href="Brands/B_Ferrari.html">Brands</a>
            <a href="form.php" target="_blank">Login</a>
			 <a href="GuestbookIndex.php">GuestBook</a>
          <a href="shopping_cart/shoppingcart.php">Shopping</a>
		  
          <a href="javascript:void(0);" class="icon" onclick ="SlideDownShowLink()">&#9776;</a>
      </div>
	</div>
    </header>
        <h2 style="text-align: center;">顯示訪客留言</h2><hr/>
<?php
        $file = "guestbook.txt";
            if ( !file_exists($file) or filesize($file) == 0 )
                echo "<h2>現在沒有任何留言哦！</h2><hr>";
             else
                readfile($file);  // read flie message and show its message
?>

     <a href="GuestbookIndex.php"><button class="fix_right">新增留言</button></a> 
    </body>
</html>
