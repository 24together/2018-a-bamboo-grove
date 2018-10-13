<?php
    require_once("tools.php");
    require_once("MemberDao.php");

    session_start();
    
    unset($_SESSION["uid"]);
    unset($_SESSION["name"]);
    unset($_SESSION["pw"]);
    unset($_SESSION["age"]);

    goNow(MAIN_PAGE);

?>