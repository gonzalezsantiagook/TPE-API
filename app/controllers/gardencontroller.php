<?php
require_once './app/models/garden.model.php';
require_once './app/views/garden.view.php';


class gardencontroller {
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new gardenModel();
        $this->view = new gardenView();
        
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
    return json_decode($this->data);
    }

    public function getgardens($params = null) {
        $gardens = $this->model->getAllgarden();
        $this->view->response($gardens);
    }
    public function getgarden($params = null) {
        // obtengo el id del arreglo de params
        $id = $params[':ID'];
        $garden = $this->model->get($id);

        // si no existe devuelvo 404
        if ($garden)
            $this->view->response($garden);
        else 
            $this->view->response("La planta con id=$id no existe", 404);
    }
    public function deletegarden($params = null){
        $id = $params[':ID'];
        
        $garden = $this->model->get($id);
        if ($garden) {
            $this->model->delete($id);
            $this->view->response($garden);
        } else 
            $this->view->response("La planta con id=$id no existe", 404);
    }
    public function insertgarden($params = null) {
        $product = $this->getData();

        if (empty($product->name) || empty($product->price) || empty($product->stock)|| empty($product->size || empty($product->type))){
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->insertgarden($product->titulo, $product->price, $product->stock,$product->size,$product->type);
            $garden = $this->model->get($id);
            $this->view->response($garden, 201);
        }
    }
}