<?php 

class User extends QueryBuilder {
    public $register_result = NULL;
    public $userExist = NULL;
    public $loggedUser = NULL;
    public function registerUser(){
        $name = $_POST['register_name'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];


        $sql1 = "SELECT * FROM users WHERE email=?";
        $query1 = $this->db->prepare($sql1);
        $query1->execute([$email]);
        $result = $query1->fetch(PDO::FETCH_OBJ);
        
        if($result==false){
            $sql = "INSERT INTO users VALUES (NULL,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$name,$email,$password]);
            $this->register_result = true;
        }else{
            $this->userExist = true;   

        }
        
        
        
    }

    public function logUser(){
        $email=$_POST['login_email'];
        $password = $_POST['login_password'];

        $sql = "SELECT * FROM users WHERE email=? AND password=?";
        $query = $this->db->prepare($sql);
        $query->execute([$email,$password]);
        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if($loggedUser){
            $_SESSION['loggedUser']=$loggedUser;
            $this->loggedUser = $loggedUser;
            
        }
    }

    public function getUserWithId($id){
        $sql = "SELECT * FROM users  WHERE users.users_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }


    public function insertProfileImage(){
        $image_file = $_FILES["image"];
        $id=$_SESSION['loggedUser']->users_id;



if (!isset($image_file)) {
    die('No file uploaded.');
}


if (filesize($image_file["tmp_name"]) <= 0) {
    die('Uploaded file has no contents.');
}


$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
    die('Uploaded file is not an image.');
}


$image_extension = image_type_to_extension($image_type, true);


$image_name = bin2hex(random_bytes(16)) . $image_extension;


move_uploaded_file(
    
    $image_file["tmp_name"],

    
    __DIR__ . "/images/" . $image_name
);  
$sql="UPDATE profil_image SET current_img='' WHERE profil_image.user_id=$id";
$query = $this->db->prepare($sql);
$query->execute([]);

$sql1="INSERT INTO profil_image VALUES(NULL,?,?,NOW(),?)";
$query = $this->db->prepare($sql1);
$query->execute([$id,$image_name,$image_name]);
header("Refresh:0");
    }


    public function selectProfileImage($id){
        $sql = "SELECT * FROM profil_image WHERE profil_image.user_id=? ORDER BY insert_time DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    

}
?>