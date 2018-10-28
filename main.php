<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>대나무숲::메인페이지</title>
              
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link href="./stylesheet.css" rel="stylesheet">
    <link rel="shortcut icon" href="\201802\termProject\img\favicon.ico">
    </head>
    <body >
    <!--상단바-->
          <nav class="navbar navbar-inverse" style="border:0px none white">
              <div class="container-fluid" style="background-color:white">
                       <form action="login_form.php">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#" style="color:#53853d">a bamboo grove</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#" style="background-color:#53853d">Home</a></li>
                  <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#53853d" 
                   >대나무숲<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="./board/board.php" style="color:#53853d">익명게시판</a></li>
                      <li><a href="./board/write_form.php" style="color:#53853d">게시글 쓰기</a></li>
                    </ul>
                  </li>
                  <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#53853d" 
                   >자유게시판<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="./free_board/board.php" style="color:#53853d">게시판</a></li>
                      <li><a href="./free_board/write_form.php" style="color:#53853d">게시글 쓰기</a></li>
                    </ul>
                  </li>
                  <li><a href="./introduce.php"style="color:#53853d">제작자소개</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
            
        <?php
            require_once("tools.php");

            session_start();
            $session_name=readSessionVar("name");
            if(isset($_SESSION["uid"])){
        ?>             
<!--login-->
                  <li style="margin:15px"><?=$session_name?>님,  환영합니다</li>
                  <li class="margin"><input type="button" class="btn btn-default" id="navbnt" value="logout" onclick="location.href='logout.php'"></li>
                  <li class="margin"><input type="button" class="btn btn-default" value="info" onclick="location.href='update_form.php'"></li> 
        <?php
            }else{
        ?>
<!--logout-->
                  <li style="margin:15px">로그인 해주세요</li>
                  <li class="margin"><input type ="button" class="btn btn-default" id="navbnt" value=" login " onclick="location.href='login_form.php'"> </li>
                  <li class="margin"><input type="button" class="btn btn-default" id="navbnt" value=" Sign Up " onclick="location.href='member_join_form.php'"></li> 

        <?php
            }
                ?>    
           </ul> </form>
            </div>
            </nav>

<!------------------------------------------------->       
       
       
       
       
        <div class="mainpage-div" >
        <div class="form-heading">
        <span class="logo">
            <img src="./img/logo.png" height="80px" ></span>
          </div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="./img/main1.png" >
        <div style="margin:20px" class="carousel-caption">
          <img src="./img/script1.png" width="360px">
        </div>
      </div>

      <div class="item">
        <img src="./img/main2.png" >
        <div style="margin:20px" class="carousel-caption">
          <img src="./img/script2.png" width="360px">
        </div>
      </div>
    
      <div class="item">
        <img src="./img/main3.png">
        <div style="margin:20px"class="carousel-caption">
          <img src="./img/script3.png" width="360px">
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>
  </div>
  </div>

    </body>

</html>