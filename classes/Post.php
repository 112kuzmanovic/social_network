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
        $sql = "SELECT * FROM posts INNER JOIN users ON users.users_id=posts.user_id INNER JOIN profil_image ON profil_image.user_id=posts.user_id ORDER BY posts.time_of_posts DESC";
        $query = $this->db->prepare($sql);
        $query->execute([]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


    public function allPostsFromUser($id){
        $sql='SELECT * FROM posts INNER JOIN users ON users.users_id=posts.user_id WHERE posts.user_id=?';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    
}
?>