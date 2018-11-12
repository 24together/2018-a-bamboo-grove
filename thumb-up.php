<?php
    require_once("./CommentDao.php");
    require_once("./tools.php");
    require_once("./MemberDao.php");
    
$cdao = new CommentDao();
$mdao = new MemberDao();
    
    $cn = requestValue("cn");
    $num = requestValue("num");
    $content=requestValue("content");
    

    $cdao->increaseGood($cn,$num);
    $cmsgs = $cdao->getMsg($cn,$num);

    if($cmsgs["good"]%5==0){
        $mdao->increaseCount($cmsgs["id"]);
        //5개씩 올라가면 글쓰기1개를 얻는다
    }
    if($cn==1){
        $url= "board/view.php?num=$content";
    }else if($cn==2){
        $url= "free_board/view.php?num=$content";
    }
    goNow($url);
?>