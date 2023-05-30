<?php
class Student {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function create($name, $age, $email) {
        $stmt = $this->db->prepare("INSERT INTO students (name, age, email) VALUES (?, ?, ?)");
        $stmt->execute([$name, $age, $email]);
        
        return $this->db->lastInsertId();
    }
    
    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $name, $age, $email) {
        $stmt = $this->db->prepare("UPDATE students SET name = ?, age = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $age, $email, $id]);
        
        return $stmt->rowCount();
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$id]);
        
        return $stmt->rowCount();
    }
}
?>
