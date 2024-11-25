<?php
    class trx{
        public $id_trx;
        public $name_trx;
        public $amount_trx;
        public $date_trx;
    
        public function __construct($id_trx, $name_trx,$amount_trx, $date_trx){
            $this->id_trx = $id_trx;
            $this->name_trx =$name_trx;
            $this->amount_trx = $amount_trx;
            $this->date_trx = $date_trx;
        }
    }
?>