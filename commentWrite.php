<?php
require_once ("./tools.php");
require_once ("CommentDao.php");
$comment = requestValue("comment");
$cwriter = requestValue("writer");
$cn = requestValue("cn");
    
session_start();    
$id = $_SESSION["uid"];
$dao=new CommentDao();

$num = requestValue("num");
$page = requestValue("page");
$url= bdURL("./board/view.php",$num,$page);

//echo "cn",$cn,"num", $num,"wrter,", $cwriter,"id", $id, $comment;
$dao->insertMsg($cn, $num, $cwriter, $id, $comment);

goNow($url);

//페이지랑 넘 불로오기
?>