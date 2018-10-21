<!--       <span class="span">
<!--그 스마트 에디터로 가져오는거 디비로 소스만 가져오는건지 알아보기
           <img src="../img/board.png" style="width:350px">
       </span>
       <span class="span" id="content" style="width:200px height:350px" >
           <p>asdasdhfk alhsdkfh kahskdhfjkashdklfhaklsjdh fklahsdklfhaklsdh flkaj hsdlfkjhaskldjhf klasdhklj ahsldk fhlaksjdhfl kajsdhklfjhaklsdhfkl ajdfklaj hskldh klajhldkh aklsdjh</p>
       </span>
       -->
       
      
<?php
    require_once("../tools.php");
    require_once("BoardDao.php");
    require_once("../MemberDao.php");
    $num = requestValue("num");
    $page = requestValue("page");
    $dao = new BoardDao();
    $dao -> increaseHits($num);
    $msg = $dao -> getMsg($num);

    session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        /*로그인 정보 가져오기*/
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
        /*디비에서 찾아보기*/
        if(!$member){
            errorBack("$uid 로그인 해주세요.");
            exit();
        }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::게시글보기</title>
    <!--bootstrap, style-->
    <link href="../stylesheet.css" rel="stylesheet">
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--delete-->          
    	<script>
		function processDelete(num) {
			result = confirm("Are you sure?");
			if(result) {
				location.href="delete.php?num="+num;
			}
		}
            
	   </script>
	   <style>
           .view-div {
                max-width: 1200px;
                min-height: 77%;
                overflow: visible;
                background: #ffffff none repeat scroll 0 0;
                border-radius: 2px;
                margin: 10px auto 30px;
                padding: 50px 70px 70px 71px;

            }
           .noresize {
                resize: none; /* 사용자 임의 변경 불가 */
    
            }
           .btn btn-light{
               height:13px;
           }
    </style>
</head>
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
              <a class="nav-link" href="./board.php"style="color:gray">게시판</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">제작자</a>
            </li>
          </ul>
        </nav>

      <div class="container" style=" margin-top:50px">
   <div class="login-form">
    <div class="view-div">
        <div class="panel">
       <img src="../img/logo5.png" width="150px">
       <p>사람들의 이야기에 귀기울여 보세요.</p>
       </div>
<!--게시판 내용-->  
          <!--1들어갈때마다 사진이 다르게 
              2게시글과 댓글이 옆에 
              3별점 기능 
              4목록보기, 삭제
            -->   
            <div class="content" align="justify"> 
           <span class="span" >
               <div>
                    <?php
                        #난수 출력
                        $ran = mt_rand(1, 3);
                   ?>
                   <img src="../img/view<?=$ran?>.png" width="350px">
               </div>
            </span>
            <span class="span" style="margin-left:20px margin-right:20px width:350px height:350px">
               <div>
                   <h5><?=$msg["title"]?></h5>
                   <p><?=$msg["writer"]?>님의 대나무숲</p>
                   <br>
                    <div style="align:right">
                       <form id="Login" action="star_up.php?num=<?=$num?>&page=<?=$page?>" method="post">
                          
                           <select style="width:100px" name="star" class="custom-select mb-3" >
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

                                        }?>
                                </div>
                              <option value="0">별별</option>
                              <option value="1">★☆☆☆☆</option>
                              <option value="2">★★☆☆☆</option>
                              <option value="3">★★★☆☆</option>
                              <option value="4">★★★★☆</option>
                              <option value="5">★★★★★</option>
                            </select>
                            <button type="submit" class="btn btn-success">별점주기</button>
                         </form>
                    </div> 
                   <div>
                       <textarea cols="80" class="noresize">
                           <?=$msg["content"]?>
                       </textarea>
                   </div>
                   <div align="right">
                       <button onclick="location.href='board.php?page=<?=$page ?>'" type="submit" class="btn btn-light">목록보기</button>	
                        
                      <?php
                            if($member["id"]==$msg["id"]){
                      ?>
                         <button class="btn btn-light" onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>&page=<?=$page?>'">수정</button>
                        <button type="submit" 
                            onclick="processDelete(<?= $msg["Num"] ?>)"
                        class="btn btn-light">삭제하기</button>
                      <?php } ?>
                      </div>	
               </div>
            </span>
        </div>
            </div> 
         </div>
        <p class="botto-text" style="text-align: center">
          영진전문대학교 2WDJ 김민영</p>      
    </div>   
</body>
</html>