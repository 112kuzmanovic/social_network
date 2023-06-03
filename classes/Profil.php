<?php 
class Profil extends QueryBuilder {
        public $requestStatus=NULL;
        public $sendRequestResult =NULL;
        public $confirm =NULL;


    

    public function sendRequest(){
        $sender = $_SESSION['loggedUser']->users_id;
        $id=$_POST['id'];
        $status = 1;
        $visit=0;

        $sql = "INSERT INTO request VALUES(NULL,?,?,?,NOW(),?)";
        $query = $this->db->prepare($sql);
        $query->execute([$sender,$id,$status,$visit]);
        if($query){
            $this->requestStatus = true;
        

        }
        header('Location: profil.php?id='.$id);
    }
    

    public function viewRequest(){
        
        $id=$_SESSION['loggedUser']->users_id;
        $sql = "SELECT * FROM request INNER JOIN users ON request.sender_id=users.users_id INNER JOIN profil_image ON request.sender_id = profil_image.user_id WHERE request.recipient_id=? AND request.status=1";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    

    }

    public function viewSendRequest($id,$loggedId){
        
        $sql="SELECT * FROM request WHERE request.sender_id=? AND request.recipient_id=? AND request.status=1";
        // $sql = "SELECT * FROM request INNER JOIN users ON users.users_id=request.sender_id  WHERE request.sender_id=? AND request.recipient_id=? AND request.status=1";
        $query = $this->db->prepare($sql);
        $query->execute([$id,$loggedId]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
}   
    public function viewSendRequest1($id,$loggedId){
        
        $sql="SELECT * FROM request WHERE request.sender_id=? AND request.recipient_id=? AND request.status=0";
        $query = $this->db->prepare($sql);
        $query->execute([$id,$loggedId]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
}


    public function accept($id){
        $sql="UPDATE request SET request.status=0 WHERE request.sender_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $this->confirm=true;
        header('Location: profil.php?id='.$id);


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


    public function signal($id){
        $sql="SELECT * FROM request INNER JOIN users ON users.users_id=request.recipient_id WHERE request.sender_id=? AND request.status=0";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function isVisit($loggedId,$id){
        $sql="UPDATE request SET request.visit=1 WHERE request.sender_id=? AND request.recipient_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$loggedId,$id]);
    }

    public function ignoreRequest($loggedId,$id){
        $sql="DELETE FROM request WHERE request.recipient_id=? AND request.sender_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$loggedId,$id]);

    }
    
   
}
?>