<?php 
class Profil extends QueryBuilder {
        public $requestStatus=NULL;
        public $sendRequestResult =NULL;
        public $statusIsOne = NULL;


    public function getProfil($id){
        $sql = "SELECT * FROM users INNER JOIN posts ON users.users_id=posts.user_id INNER JOIN profil_image ON profil_image.user_id=users.users_id WHERE profil_image.current_img !='' AND users.users_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

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
        $sql = "SELECT * FROM request INNER JOIN users ON request.sender_id=users.users_id INNER JOIN profil_image ON request.sender_id = profil_image.user_id WHERE request.recipient_id=? AND profil_image.current_img !=''";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    

    }

    public function viewSendRequest(){
        
        $id=$_SESSION['loggedUser']->users_id;
        $sql = "SELECT * FROM request WHERE request.sender_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
}

   
}
?>