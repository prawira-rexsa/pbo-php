<?php
require_once '/models/item_model.php';

class ItemController {
    private $model;

    public function __construct() {
        $this->model = new modelItem();
    }

    public function addItem($item_name, $price_item, $amount_item) {
        $this->model->addItem($item_name, $price_item, $amount_item);
        header('Location: ../index.php?action=view_items');
        exit();
    }

    public function updateItem($item_id, $item_name, $price_item, $amount_item) {
        if ($this->model->updateItem($item_id, $item_name, $price_item, $amount_item)) {
            header('Location: ../index.php?action=view_items');
            exit();
        }
        return "Item with ID '$item_id' not found.";
    }

    public function deleteItem($item_id) {
        if ($this->model->deleteItem($item_id)) {
            header('Location: ../index.php?action=view_items');
            exit();
        }
        return "Item with ID '$item_id' not found.";
    }

    public function getAllItems() {
        return $this->model->getAllitems();
    }

    public function getItemById($item_id) {
        return $this->model->getItemById($item_id);
    }

    public function getItemByName($item_name) {
        return $this->model->getRoleByName($item_name);
    }
}
?>