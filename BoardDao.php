   
   <?php
/*
   writer title content regtime hits stars age
   
   insertMsg(  제목 이름 내용 나이대)
   increaseHits(조회수)
   setStar(별)
   
*/
    class BoardDao{
        private $db;
        
        public function __construct(){
            try {
			$this->db = new PDO("mysql:host=localhost;dbname=php", "root", "");

			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
    }
        
    public function insertMsg($id,$title, $writer, $content, $age) {
		// sql문 만들고.. insert문
		// prepare 시키고
		// 넘어온 값 binding 시키고
		// 실행요청하고..
		try {
			$sql = "insert into bbboard(id,title, writer, content,age) values(:id,:title, :writer, :content,:age)";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":title", $title, PDO::PARAM_STR);
			$pstmt->bindValue(":id", $id, PDO::PARAM_STR);
			$pstmt->bindValue(":writer", $writer, PDO::PARAM_STR);
			$pstmt->bindValue(":content", $content, PDO::PARAM_STR);
			$pstmt->bindValue(":age", $content, PDO::PARAM_INT);

			$pstmt->execute();

		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}

	public function getManyMsgs() {
		try {
			/*
				1. sql: select * from board;
				2. prepare
				3. binding X, execute O
			*/
			$sql = "select * from bbboard";	
			$pstmt = $this->db->prepare("select * from bbboard");	
			$pstmt->execute();
			$msgs = $pstmt->fetchAll(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}

		return $msgs;
	}

	public function getMsg($num) {
		try {
			$sql = "select * from bbboard where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_STR);
			$pstmt->execute();

			$msg = $pstmt->fetch(PDO::FETCH_ASSOC);

		}catch(PDOException $e) {
			exit($e->getMessage());
		}
		return $msg;
	}

	public function increaseHits($num) {
		try {
			// update board set hits+1 where num=:num
			$sql = "update bbboard set hits=hits+1 where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}
        
    public function setStars($num, $star){
        try{
            
            $sql = "update bbboard set stars=(stars+:star), setstar=setstar+1 where num=:num";
            $pstmt = $this -> db -> prepare($sql);
            $pstmt->bindValue(":num",$num,PDO::PARAM_INT);
            $pstmt->bindValue(":star",$star,PDO::PARAM_INT);
            $pstmt->execute();
            
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }

	public function deleteMsg($num) {
		try {
			// update board set hits=hits+1 where num=:num
			$sql = "delete from board where num=:num";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":num", $num, PDO::PARAM_INT);
			$pstmt->execute();
		}catch(PDOException $e) {
			exit($e->getMessage());
		}
	}	
    
    public function updateMsg($title,$writer,$content){
        try{
            $sql = "update board set title=:t, writer=:w, writer=:w, content=:c where num =:n";
            /*
                1. prepare
                    실행할 sql문을 DB서버에 전송한다.
                    DB서버는 그 SQL문을 parsing을 통해 문법검사를 하고 그 sql문에서 접근하는 테이블과 칼럼이 존재하는지. ㅏㅅ용자가 그 작업을 할 수 있는지 권한을 check하는 등의 
                    정당성 검사(validation check)를 한 후, 
                    실행계획을 세운다.
                2. data bindinbg
                    실행에 필요한 데이터를 공급해준f                                                                                                                             서버에게 요청한다. 이 때
                    실행에 필요한 데이터도 함께 DB서버에게 전달된다.
                
                */
            
            $pstmt = $this->db->prepare($sql);
            $pstmt->bindValue(":t",$title,PDO::PARAN_STR);
            $pstmt->bindValue(":w",$writer,PDO::PARAN_STR);
            $pstmt->bindValue(":c",$content,PDO::PARAN_STR);
            $pstmt->execute();
            
        }catch(PDOException $e){
            exit($e->getMessage());
        }
    }    
        
        
}

?>