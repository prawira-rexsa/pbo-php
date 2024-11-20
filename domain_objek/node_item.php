<?php
    class Item{
        public $item_id;
        public $item_name;
        public $price_Item;
        public $amount_item;
    
        public function __construct($itemId, $itemName, $priceItem, $amountItem){
            $this->item_Id = $itemId;
            $this->item_name =$itemName;
            $this->price_Item = $priceItem;
            $this->amount_item = $amountItem;
        }
    }
?>