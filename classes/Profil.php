<?php 
class Profil extends QueryBuilder {
        public $requestStatus=NULL;
        public $sendRequestResult =NULL;
        public $statusIsOne = NULL;


    

    public function sendRequest(){
        $sender = $_SESSION['loggedUser']->users_id;
        $id=$_POST['id'];
        $status = 1;

        $sql = "INSERT INTO request VALUES(NULL,?,?,?,NOW())";
        $query = $this->db->prepare($sql);
        $query->execute([$sender,$id,$status]);
        if($query){
            $this->requestStatus = true;
        }
    }

    public function viewRequest(){
        
        $id=$_SESSION['loggedUser']->users_id;
        $sql = "SELECT * FROM request INNER JOIN users ON request.sender_id=users.users_id INNER JOIN profil_image ON request.sender_id = profil_image.user_id WHERE request.recipient_id=? AND request.status=1";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    

    }

    public function viewSendRequest($sender,$recipient){
        
        
        $sql = "SELECT * FROM request INNER JOIN users ON users.users_id=request.sender_id  WHERE request.sender_id=? AND request.recipient_id=? AND request.status=1";
        $query = $this->db->prepare($sql);
        $query->execute([$sender,$recipient]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
}

    public function getBasicProfil($id){
        $sql = "SELECT * FROM users  WHERE users.users_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
}

    public function confirm($id){
        $sql="UPDATE request SET request.status=0 WHERE request.sender_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        header("Refresh:0");

    }
    public function following($id){
        $sql = "SELECT request.request_id,request.sender_id,request.recipient_id,request.status,request.date_of_send,users.users_id,users.name,users.surname FROM request INNER JOIN users ON users.users_id=request.recipient_id WHERE request.sender_id=? AND request.status=0";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function followers($id){
        $sql = "SELECT request.request_id,request.sender_id,request.recipient_id,request.status,request.date_of_send,users.users_id,users.name,users.surname FROM request INNER JOIN users ON users.users_id=request.sender_id WHERE request.recipient_id=? AND request.status=0";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
   
}
?>