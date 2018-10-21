

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::글작성</title>
        <link href="../stylesheet.css" rel="stylesheet">
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                
                
<!--SmartEditor-->
           <script src="bower_components/jquery/dist/jquery.js"></script>
          <script src="bower_components/tui-code-snippet/dist/tui-code-snippet.js"></script>
          <script src="bower_components/markdown-it/dist/markdown-it.js"></script>
          <script src="bower_components/to-mark/dist/to-mark.js"></script>
          <script src="bower_components/codemirror/lib/codemirror.js"></script>
          <script src="bower_components/highlightjs/highlight.pack.js"></script>
          <script src="bower_components/squire-rte/build/squire-raw.js"></script>
          <script src="bower_components/tui-editor/dist/tui-editor-Editor.min.js"></script>
          <link rel="stylesheet" href="bower_components/codemirror/lib/codemirror.css">
          <link rel="stylesheet" href="bower_components/highlightjs/styles/github.css">
          <link rel="stylesheet" href="bower_components/tui-editor/dist/tui-editor.css">
          <link rel="stylesheet" href="bower_components/tui-editor/dist/tui-editor-contents.css">

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
    <script type="text/javascript" src="../editor/js/HuskyEZCreator.js" charset="utf-8"></script>
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
                  <a class="nav-link" href="#"style="color:gray">Link 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"style="color:gray">Link 3</a>
                </li>
              </ul>
            </nav>
<!--메인 -->
        <div class="container" style=" margin-top:50px ">
         <div class="login-form">
                <div class="board-main-div">
                <div class="panel">
               <img src="../img/logo5.png" width="150px">
               <p>이야기를 들려주세요.</p>
               </div>
                   <div>
                    <!--<form action="write.php" method="post">-->
                        <div class="form-group">
                           <span class="span" style="width:20%">
                                <label for="title">제목: </label>
                            </span>
                            <span class="span" style="width:70%">
                                <input type="text" id="title" name="title" class="form-control" required>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="writer">작성자: </label>
                            </span>
                            <span name="name" class="span" style="width:70%">
                                <p><?=$_SESSION["name"]?></p>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="content">내용</label>
                            </span>
                            <span name="content" class="span" style="width:70%">
                                <textarea class="form-control" style="resize:none overflow:visible" cols="50" id="content" name="content"></textarea>
                            </span>
                        </div>

                      </div> 
                      </div>  
                    </div>
                </div> 
        <p class="botto-text" style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
    </body>
</html>