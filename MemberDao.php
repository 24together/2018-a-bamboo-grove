<?php
    class MemberDao{
        private $db;
        
        public function __construct(){
            try{
                
                $this->db = new PDO("mysql:host=localhost;dbname=php","root","");
                $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        public function getMember($id){
            try{
                $query=$this->db->prepare("select * from Bbmember where id = :id");
                
                $query->bindValue(":id",$id,PDO::PARAM_STR);
                $query->execute();

                  $result=$query->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                  exit($e->getMessage());
                }
                return $result;
        }
        
        public function insertMember($id,$pw,$name,$age){
            try{
                
                $sql = "insert into Bbmember(id,pw,name,age) values(:id,:pw,:name,:age)";
                
                $pstmt = $this->db->prepare($sql);
                
                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name", $name, PDO::PARAM_STR);
                $pstmt->bindValue(":age", $age, PDO::PARAM_INT);
                
                $pstmt->execute();
                
            }catch(PDOException $e){
                exit($e->getMessage());
            }
        }
        
        public function updateMember($id,$pw,$name,$age){
            try{
                $sql = "update Bbmember set pw = :pw, name=:name. age=:age where id=:id";
            
                $pstmt =$this -> db-> prepare($sql);
                
                $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
                $pstmt->bindValue(":name", $name, PDO::PARAM_STR);
                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->bindValue(":age", $age, PDO::PARAM_INT);

                $pstmt->execute();
            }catch(PDOException $e){
                exit($e->getMessage());
            }
            
        }
        
    }
?>