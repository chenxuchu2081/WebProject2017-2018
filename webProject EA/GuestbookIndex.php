<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>訪客留言簿</title>
		

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link CND-->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"><!-- link CND-->
      <script type="text/javascript" src="JavaScript/index.js"></script>  <!--javascript link file-->

        <script src="jslib/jquery-3.3.1.min.js"></script>
       <link rel="stylesheet" href="./css/stylelayout.css"> <!--css link file-->
       <link rel="stylesheet" href="./css/header.css"> <!--css link file-->
        <link rel="stylesheet" href="./css/Footer.css"> <!--css footer link-->
        
        <style>
            #guestbookform{
                margin-left: 50px;
                margin-right: 50px;
                text-align: center;
                
            }
            
            button{
                height: 100px;
                width: 150px;
                margin-top: 75px;
                margin-right: 75px;
                margin-bottom: 60px;
                
            }
            .msg{
                width: 100%;
            }
            
            

@media screen and (max-width: 550px) {
    #guestbookform{
        width: 100%;
        margin: 0px;
        text-align: center;
    }
    button{
                height: 55px;
                width: auto;
                margin: auto;
            }
            legend{
                font-size: 34px;
                font-weight: bold;
                text-align: center;
            }
            .container{
                text-align:center;
                float:none;
                width:100%;
            }
            
 
}
            
        </style>
    </head>

    <body>   

        <header>
	  <div class="fix"> 
        
          <h1 class="highlight" id="jumptop" style="text-align:center;">  訪客區</h1>
        

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

        <form action="Guestbook.php" method="post" id="guestbookform">
            
                <h1>訪客留言譜</h1>
                <div class="container">
                    <label for="name"><b></b></label>
                    <input type="text" size="35" name="name" Required placeholder="姓名：">
                    <label for="email"><b></b></label>
                    <input type="text" size="35" name="email"  placeholder="電子郵件：">
                    <label for="message"><b></b></label>
                    <textarea name="message" class="msg" rows="5" cols="100" Required placeholder="你的意見！"></textarea>
                </div>
            
            <button type="submit" name="send" value="送出">送出</button>
            <button type="reset" name="reset" value="重設">重設</button>
             
              <hr />
             <a href="GuestbookIndex.php"><button>新增留言</button></a>
            <a href="Showmessage.php"><button>檢視留言</button></a>
              
                
        </form>

	
	
    </body>
</html>
