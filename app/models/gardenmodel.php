<?php

class gardenmodel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_shopgarden;charset=utf8', 'root','');
    }

// accedo a todos los elementos
    function getAllgarden() {
    $query = $this->db->prepare("SELECT * FROM products");
        $query->execute();
    $gardens = $query->fetchAll(PDO::FETCH_OBJ);     
    return $gardens;
    }

// accedo por id
function getById($id) {
    $query = $this->db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_OBJ);        
    return $product;
    }

//elimino
function delete($id) {
    $query = $this->db->prepare('DELETE FROM products WHERE id = ?');
    $query->execute([$id]);
    }

// inserto 
function insert($name, $price,$stock,$size,$type) {
    $query = $this->db->prepare("INSERT INTO products ( name,price,stock,size,type) VALUES (?, ?, ?,?,?)");
    $query->execute([$name,$price,$stock,$size,$type]);

    return $this->db->lastInsertId();
}

// upgradear una planta method= PUT
function update($name,$price,$stock,$size,$type,$id) {
    $query = $this->db->prepare("UPDATE products SET `name`=?,`price`=?,`stock`=?,`size`=?, `type`=? WHERE id=? ");
    $query->execute([$name,$price,$stock,$size,$type,$id]);
}

// ordeno los productos
function orderproducts($place,$order){
    $query = $this->db->prepare(("SELECT * FROM `products` ORDER BY `products` . `$place` $order"));
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_OBJ);
    return $products;
}
// traigo los productos, pero paginado
// no logro hacer funcionar el paginado, queda el proceso para consultar en clase.
/*
function getallpaginate($page,$long){
    $query = $this->db->prepare("SELECT * FROM products LIMIT $page,$long");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_OBJ);
    return $products;
    }*/
}


