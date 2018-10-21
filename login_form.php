<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>
    <title>대나무숲::로그인</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="./stylesheet.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">

  <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="./main.php"style="color:gray">a bamboo grove</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="#" style="color:gray">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">Link 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">Link 3</a>
            </li>
          </ul>
        </nav>
  
   
    <div class="container" style="margin-top:50px ">
    <span class="logo">
    <img src="./img/Bamboo.png" width="30px" height="30px" ></span>
    <span class="logo">
    <a href="./main.php" style="text-decoration:none">
        <h1 class="form-heading">a bamboo grove</h1></a>
    </span>
    <div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>Admin Login</h2>
       <p>Please enter your ID and password</p>
       </div>
        <form id="Login" action="login.php" method="post">

            <div class="form-group">

                <input type="text" name="id" class="form-control" placeholder="ID">

            </div>

            <div class="form-group">

                <input type="password" name="pw" class="form-control" id="inputPassword" placeholder="Password">

            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>
        </div>
    <p class="botto-text"style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
    </div></div>


</body>
</html>
