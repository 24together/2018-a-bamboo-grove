<?php
    define("MAIN_PAGE","main.php");
    
    function requestValue($name){
        return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
    }

    function errorBack($msg){
        
        ?>
        <script>
            alert('<?= $msg ?>');
            history.back();
        </script>
    
        <?php
            exit();
    }
    
    function okGo($msg,$url){
        ?>
        <script>
            location.href = '<?= $url ?>';
        </script>
        <?php
            exit();
    }
    function readSessionVar($val){
        //$session = "\"".$val."\"";
        
        if(session_status()==PHP_SESSION_NONE){
            session_start();
        }//세션 시작 유무
        if(isset($_SESSION["name"])){
            if($val=="name"){//값 반환
                return $_SESSION["name"];
            }else if($val=="id"){
                return $_SESSION["uid"];
            }else if($val=="pw"){
                return $_SESSION["pw"];
            }else if($val=="age"){
                return $_SESSION["age"];
            }
        }
    }
 ?>    
    
