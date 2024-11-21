<?php 
require_once '/../domain_objek/node_item.php';

class modelItem
{
    private $items = [];
    private $nextId = 1;

    public function __construct() {
        if (isset($_SESSION['items'])) {
            $this->items = unserialize($_SESSION['items']);
            $this->nextId = count($this->items) + 1;
        } else {
            $this->initializeDefaultItem();
        }
    }

    public function initializeDefaultItem() {
        $this->addItem("Processor", "Rp1000.000", 1);
        $this->addItem("SSD SATA", "Rp500.000", 1);
        $this->addItem("RAM DDR 4", "Rp200.000", 0);
    }

    public function addItem($item_name, $price_Item, $amount_item) {
        $peranItem = new Item($this->nextId++, $item_name, $price_Item, $amount_item);
        $this->items[] = $peranItem;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['items'] = serialize($this->items);
    }

    public function getAllitems() {
        return $this->items;
    }

    public function getItemById($item_id) {
        foreach ($this->items as $item) {
            if ($item->item_id == $item_id) {
                return $item;
            }
        }
        return null;
    }

    public function updateItem($item_id, $item_name, $price_item, $amount_item) {
        foreach ($this->items as $item) {
            if ($item->item_id == $item_id) {
                $item->item_name = $item_name;
                $item->price_Item = $price_item;
                $item->amount_item = $amount_item;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteItem($item_id) {
        foreach ($this->items as $key => $item) {
            if ($item->item_id == $item_id) {
                unset($this->items[$key]);
                $this->items = array_values($this->items);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleByName($item_name) {
        foreach ($this->items as $item) {
            if ($item->item_name == $item_name) {
                return $item;
            }
        }
        return null;
    }
}
?>