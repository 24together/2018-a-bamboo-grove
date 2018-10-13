<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::회원가입</title>
</head>
<body>
   <?php
    require_once("tools.php");
    require_once("MemberDao.php");

    
    $id = requestValue("id");
    $pw = requestValue("pw");
    $name = requestValue("name");
    $age = requestValue("age");

    $mdao = new MemberDao();

    if($id && $pw && $name && $age){
        if($mdao->getMember($id)){
            
            errorBack("이미 사용중인 아이디 입니다.");
            exit();
            
        }else{
            
            $mdao->insertMember($id,$pw,$name,$age);
            okGo("가입이 완료되었습니다.",MAIN_PAGE);
            
        }
    }else{
        errorBack("내용을 다 채워주세요~");
        exit();
    }
?>    
</body>
</html>
