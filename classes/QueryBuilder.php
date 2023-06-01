<?php 

class QueryBuilder {
    protected $db;
    function __construct($db){
        $this->db=$db;
    }
    public function selectAll($table){
        $sql = "SELECT * FROM {$table}";
        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);  
        return $result;    
    }
}

?>