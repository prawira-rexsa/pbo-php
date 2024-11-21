<?php
    class Item{
        public $item_id;
        public $item_name;
        public $price_item;
        public $amount_item;
    
        public function __construct($item_id, $item_name, $price_item, $amount_item){
            $this->item_id = $item_id;
            $this->item_name =$item_name;
            $this->price_item = $price_item;
            $this->amount_item = $amount_item;
        }
    }
?>