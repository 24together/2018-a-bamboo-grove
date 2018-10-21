<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::게시판</title>
        <link href="../stylesheet.css" rel="stylesheet">
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <style>
        
        
        </style>
          
    </head>
    <?php
        require_once("../MemberDao.php");
        require_once("../tools.php");
        
        session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        /*로그인 정보 가져오기*/
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
        /*디비에서 찾아보기*/
        if(!$member){
            errorBack("[$uid] 로그인 해주세요.");
            exit();
        }
    
    
    ?>
    <body id = "LoginForm">
<!--상단바-->
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="../main.php"style="color:gray">a bamboo grove</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="../main.php" style="color:gray">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./write_form.php"style="color:gray">글쓰기</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray"></a>
            </li>
          </ul>
        </nav>

      <div class="container" style=" margin-top:50px ">
   <div class="login-form">
    <div class="board-main-div">
        <div class="panel">
       <img src="../img/logo5.png" width="150px">
       <p>사람들의 이야기에 귀기울여 보세요.</p>
       </div>
<!--게시판 내용-->       
            <div class="container">	
                <table class="table table-hover">
                    <tr>
                        <th>번호</th>	
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일시</th>
                        <th>조회수</th>
                        <th>별점</th>
                    </tr>
                <?php
                    require_once("./BoardDao.php");

                    $Bdao = new BoardDao();
                    $msgs = $Bdao->getManyMsgs();   

                ?> 
<!--별저으로 나타내기--> 
                               
                <?php foreach($msgs as $msg) : 
                    
                 ?>   
                    <tr>
                        <td><?= $msg["Num"] ?> </td>			    
                        <td><a href="view.php?num=<?=$msg["Num"] ?>"> <?= $msg["title"] ?> </a> </td>
                        <td><?= $msg["writer"] ?> </td>
                        <td><?= $msg["regtime"] ?> </td>
                        <td><?= $msg["hits"] ?> </td>
                        <td>
                        <div class="span">
                <?php        
                        for($i=0; $i<5; $i++){
                        if($i < $msg["stars"]/$msg["setstar"] ){
                ?>
                       <span><img src="../img/star2.png" width="25px"></span>
                <?php
                        }else{
                ?>
                        <span><img src="../img/star.png" width="25px"></span>
                <?php
                        }
                        
                    }?></div></td>
                    </tr>
                <?php endforeach ?>	
                </table>	    
                </div>
            </div> 
          </div>
          <p class="botto-text" style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
      
        </div>   
    </body>
</html>