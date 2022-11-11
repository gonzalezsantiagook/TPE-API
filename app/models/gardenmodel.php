<?php

class gardenmodel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_shopgarden;charset=utf8', 'root','');
    }


    public function getAllgarden() {
        $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();
        $gardens = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $gardens;
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $query->execute([$id]);
        $garden = $query->fetch(PDO::FETCH_OBJ);
        
        return $garden;
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $query->execute([$id]);
    }

public function insertgarden($name, $price,$stock,$size,$type) {
    $query = $this->db->prepare("INSERT INTO products ( name, price, stock, size,type) VALUES (?, ?, ?,?,?)");
    $query->execute([$name,$price,$stock,$size,$type]);

    return $this->db->lastInsertId();
}
}
