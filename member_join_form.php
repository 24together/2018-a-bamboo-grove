<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::회원가입</title>
        <link href="./stylesheet.css" rel="stylesheet">
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id = "LoginForm">
<!--상단바-->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="#">Logo</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link 3</a>
            </li>
          </ul>
        </nav>

<!--회원수정폼-->
      <div class="container" style="margin-top:50px width:500px">
   <div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>회원가입</h2>
       <p>회원 정보를 작성해주세요.</p>
       </div>
        <form id="Login" action="member_join.php" method="post">

            <div class="form-group">
                <span class="Logo"><label for ="id" style="margin-right :10px ">Id</label></span> 
                <span class="Logo"><input type="text" class="form-control" id = "usr" name="id" placeholder="ID"></span>
            </div>

            <div class="form-group">
                <span class="Logo"><label for="pw" style="margin-right :10px">Password </label></span>
                <span class="Logo"><input type="password" class="form-control" id="pwd" name="pw" placeholder="Password"></span>

            </div>
            <div class="form-group">
                <span class="Logo"><label for="name" style="margin-right:10px">Name </label></span>
                <span class="Logo"><input type="password" class="form-control" id="name" name="name" placeholder="Name"></span>

            </div>
            <div class="form-group">
                <label for="age">Age </label>
                    <select name="cars" class="custom-select mb-3">
                      <option selected>Custom Select Menu</option>
                      <option value="volvo">Volvo</option>
                      <option value="fiat">Fiat</option>
                      <option value="audi">Audi</option>
                    </select>

            </div>

            <button type="submit" class="btn btn-primary">Login</button>

        </form>
        </div>
    <p class="botto-text" style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
          </div> </div>      
    </body>
</html>