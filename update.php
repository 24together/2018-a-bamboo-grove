<?php

    require_once("tools.php");
    require_once("MemberDao.php");

    $id = requestValue("id");
    $pw = requestValue("pw");
    $name = requestValue("name");
    $age = requestValue("age");

    /* 
        로그인 한 사용자 체크
        회원정보를 수정하려는 사용자가 그 사용자인지 체크
    */

    session_start();

    $suid= isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        if(!$suid){//로그인 하지 ㅇ낳ㅇ는 경우
            errorBack("로그인 해주세요");
        }else{
            if($suid != $id)
                errorBack("회원님과 수정하려는 회원정보가 다릅니다");
        }

        if($id && $pw && $name && $age){
            $mdao = new MemberDao();
            $mdao -> updateMember($id,$pw,$name,$age);
            $_SESSION["name"] = $name;
            $_SESSION["age"] = $age;
            //화면에 정보가 나타나도록 세션을 변경해 준다.

            okGo("회원정보가 수정되었습니다.", MAIN_PAGE);

        }else{
            errorBack("모든 입력란을 채워주세요...");
        }

 ?>