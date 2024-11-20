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

    public function addItem($itemName, $priceItem, $amountItem) {
        $peranItem = new Item($this->nextId++, $itemName, $priceItem, $amountItem);
        $this->items[] = $peranItem;
        $this->saveToSession();
    }

    private function saveToSession() {
        $_SESSION['items'] = serialize($this->items);
    }

    public function getAllitems() {
        return $this->items;
    }

    public function getRoleById($item_id) {
        foreach ($this->items as $item) {
            if ($item->item_id == $item_id) {
                return $item;
            }
        }
        return null;
    }

    public function updateRole($item_id, $itemName, $priceItem, $amountItem) {
        foreach ($this->items as $item) {
            if ($item->item_id == $item_id) {
                $item->item_name = $itemName;
                $item->price_Item = $priceItem;
                $item->amount_item = $amountItem;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteRole($item_id) {
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