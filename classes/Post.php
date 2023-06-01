<?php 
class Post extends QueryBuilder {


    public function addPost(){
        $inputPost=$_POST['inputPost'];
        $id=$_SESSION['loggedUser']->users_id;

        $sql="INSERT INTO posts VALUES(NULL,?,?,NOW())";
        $query = $this->db->prepare($sql);
        $query->execute([$inputPost,$id]);
        header("Location: index.php");
    }

    public function selectAllPosts(){
        $sql = "SELECT * FROM posts INNER JOIN users ON users.users_id=posts.user_id INNER JOIN profil_image ON profil_image.user_id=posts.user_id WHERE profil_image.current_img !=''";
        $query = $this->db->prepare($sql);
        $query->execute([]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    
}
?>