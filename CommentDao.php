<?php
class CommentDao {
    private $db;
    
    public function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=php", "root", "");

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e) {
			exit($e->getMessage());
		}

    }
    public function insertMsg($cn,$content_num, $writer, $id, $comment) {
		// sql문 만들고.. insert문
		// prepare 시키고
		// 넘어온 값 binding 시키고
		// 실행요청하고..
        //cn==1이면 익명, ==2면 자유게시판
		try {
            if($cn==1){
			$sql = "insert into bbboard_comment(content_num, writer, id,comment) values(:content_num, :writer, :id,:comment)";
            }else if($cn==2){
            $sql = "insert into free_bbboard_comment(content_num, writer, id,comment) values(:content_num, :writer, :id,:comment)";
            }
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":content_num", $content_num, PDO::PARAM_INT);
			$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
			$pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
			$pstmt->bindValue(":comment", $comment, PDO::PARAM_STR);

			$pstmt->execute();

		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	
    }
        public function getMsg($cn,$num){
            try{
                if($cn==1){
                    $sql = "select * from bbboard_comment where Num=:num";
                }else if($cn==2){
                    $sql = "select * from free_bbboard_comment where Num=:num";
                }
                $pstmt = $this->db->prepare($sql);
                $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
                $pstmt->execute();
                
                $msg = $pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            return $msg;
            
        }
        public function getManyMsgs($cn,$content_num) {
		try {
			/*
				1. sql: select * from board;
				2. prepare
				3. binding X, execute O
			*/
            if($cn==1){
			$sql = "select * from bbboard_comment where content_num=:content_num";
            //해당 게시글의 댓글만 가져오도록
            }else if($cn==2){
            $sql = "select * from free_bbboard_comment where content_num=:content_num";
            }
			$pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":content_num", $content_num, PDO::PARAM_INT);
            
			$pstmt->execute();
			$msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}

		return $msgs;
	}
        
        public function increaseGood($cn,$num) {
		try {
			// update board set hits+1 where num=:num
            if($cn==1){
			$sql = "update bbboard_comment set good=good+1 where num=:num";
            }else if($cn==2){
                $sql = "update free_bbboard_comment set good=good+1 where num=:num";
            }
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}
        public function deleteMsg($cn,$num) {
		try {
			// update board set hits=hits+1 where num=:num
			if($cn==1){
            $sql = "delete from bbboard_comment where num=:num";
			}else if($cn==2){
                $sql = "delete from free_bbboard_comment where num=:num";
            }
            $pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}
}