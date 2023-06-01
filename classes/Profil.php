<?php 
class Profil extends QueryBuilder {

    public function getProfil($id){
        $sql = "SELECT * FROM users INNER JOIN posts ON users.users_id=posts.user_id INNER JOIN profil_image ON profil_image.user_id=users.users_id WHERE profil_image.current_img !='' AND users.users_id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}
?>