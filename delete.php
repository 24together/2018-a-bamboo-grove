<?php
    require_once("../tools.php");
    require_once("./BoardDao.php");
    
    $num = requestValue("num");
    $page = requestValue("page");

    $dao = new BoardDao();
    $dao -> deleteMsg($num);

    header("Location:board.php?page=$page");

?>