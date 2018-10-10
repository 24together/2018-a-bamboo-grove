<?php
    require_once("tools.php");
    require_once("MemberDao.php");

    $id = readSessionVar("id");
    $pw = readSessionVar("pw");
    $name = readSessionVar("name");
    $age = readSessionVar("age");

    $mado = new MemberDao();

    if($id && $pw && $name && $age){
        if($mdao->getMember($id)){
            
            errorBack("이미 사용중인 아이디 입니다.");
            exit();
        }else{
            $mdao->inserMember($id,$pw,$name,$age);
            okGo("가입이 완료되었습니다.",MAIN_PAGE);
        }
    }
?>