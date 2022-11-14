<?php
require_once './app/models/gardenmodel.php';
require_once './app/views/gardenview.php';
class gardencontroller {
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new gardenmodel();
        $this->view = new gardenview();
        
        
        $this->data = file_get_contents("php://input");// lee el body del request
    }
    private function getData() {
    return json_decode($this->data);
    }

// accedo, reviso si tiene un filtro para traer los elementos y los traigo. en caso de que no, trae todos los productos
    public function getgardens($params = null) {
        if(!isset($_GET['type'])){
        
            $gardens = $this->model->getAllgarden();
            $this->view->response($gardens);
        }
        else{
            $type = $_GET['type'];
            $products=$this->filterbytype($type);
            $this->view->response("las plantas con el tipo $type son:",200);
            $this->view->response($products);
        }
    }
// filtro con el valor que ya consegui antes
function filterbytype($type){
    
    $products=$this->model->getAllgarden();
    $array=array();
    if($type=='frutales'){
        foreach($products as $product)
            if($product->type==1 || $product->type==2)
                array_push($array,$product);

    }elseif($type=='arbusto'){
        foreach($products as $product)
            if($product->type==3 || $product->type==4 )
                array_push($array,$product);
    }
    else{
        $this->view->response("El tipo de planta=($type) no existe", 404);
        exit();
    }
    return $array; 
}



// traigo una planta con un id especifico    
    public function getgarden($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $garden = $this->model->getById($id);

        // si no existe devuelvo 404
        if ($garden)
            $this->view->response($garden);
        else 
            $this->view->response("La planta con id=$id no existe", 404);
    }

// borro una planta
    public function deletegarden($params = null){
        $gardenid = $params[':ID'];
        
        $garden = $this->model->getById($gardenid);
        if ($garden) {
            $this->model->delete($gardenid);
            $garden = $this->view->response("planta id:$gardenid se elimino con exito",200);
        } else 
            $this->view->response("La planta con id=$gardenid no existe", 404);
    }

// inserto una nueva planta
    public function insertgarden($params = null) {
        $product = $this->getData();
        if (empty($product->name) || empty($product->price) || empty($product->stock)|| empty($product->size) || empty($product->type)){
            $this->view->response("Complete todos los datos", 400);
        } else {
            $id = $this->model->insert($product->name, $product->price, $product->stock,$product->size,$product->type);
            $product = $this->model->getById($id);
            $this->view->response("se cargo de forma exitosa la planta =", 201);
            $this->view->response($product, 201);
        }
    }

//actualizo una planta existente
    public function updategarden($params = null){
        $id = $params[':ID'];
        $data = $this->getData();
        $garden = $this->model->getById($id);
        if (!empty($garden)){
            if (empty($data->name) || empty($data->price) || empty($data->stock)|| empty($data->size)|| empty($data->type)){
                $this->view->response("complete todos los campos para poder modificar(nombre,precio,stock,tamaño y tipo).", 404);
                exit();
                }
            else
                $this->model->update($data->name,$data->price, $data->stock,$data->size,$data->type,$id);
                $this->view->response("la planta se modifico de forma exitosa",200);
            }
        else 
            $this->view->response("el id no existe,eliga otro id valido",404);
    }

    


// ordeno de forma ascendente o descendente loa productos. en base al precio. 
    function orderproducts($order){
        $products=$this->model->getAllgarden();
        $array = array();
        asort($products);
        
        
    }
}

