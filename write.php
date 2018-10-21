<?php
    
    //header("upload.php");
    
    require_once("../tools.php");
    require_once("./BoardDao.php");

    session_start();

    //$getcontent = $_POST["content"];
    //echo $getcontent;
    
    $id = $_SESSION["uid"];
    $title = requestValue("title");
    $writer = $_SESSION["name"];
    $content = requestValue("content");
    

    if($title && $writer && $content){
        $dao = new BoardDao();
        $dao -> insertMsg($id,$title, $writer, $content);
        okGo("이야기를 공유하였습니다","board.php");
        
    }else{
       errorBack("모든 항목이 빈칸 없이 입력되어야 합니다.");
    }


?>


