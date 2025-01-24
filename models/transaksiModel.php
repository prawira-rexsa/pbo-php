<?php
require_once '/../domain_objek/node_trx.php';

    class transaksiModel{
        private $trx;
        private $nextId = 1;

        public function __construct(){
            if (isset($_SESSION['trx'])) {
                $this->trx = unserialize($_SESSION['trx']);
                $this->nextId = count($this->trx) + 1;
            } else {
                $this->trx = []; 
                $_SESSION['trx'] = serialize($this->trx);
            }
        }

        public function addTrx($name_trx, $amount_trx, $date_trx){
            $peranTrx = new Trx($this->nextId++, $name_trx, $amount_trx, $date_trx);
            $this->trx[] = $peranTrx;
            $this->saveToSession();
        }

        public function saveToSession(){
            $_SESSION['trx'] = serialize($this->trx);
        }

        public function getAllTrx(){
            return $this->trx;
        }

        public function getTrxById($id_trx){
            foreach($this->trx as $transaction){
                if($transaction->id_trx == $id_trx){
                    return $transaction;
                }
            }
            return ;
        }

        public function updateTrx($id_trx, $name_trx, $amount_trx, $date_trx){
            foreach($this->trx as $transaction){
                if($transaction->id_trx == $id_trx){
                    $transaction->name_trx = $name_trx;
                    $transaction->amount_trx = $amount_trx;
                    $transaction->date_trx = $date_trx;
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }

        public function deleteTrx($id_trx){
            foreach($this->trx as $key => $transaction){
                if($transaction->id_trx == $id_trx){
                    unset($this->transaction[$key]);
                    $this->transaction = array_values($this->transaction);
                    $this->saveToSession();
                    return true;
                }
            }
            return false;
        }

        public function getTrxByUser($name_trx){
            foreach($this->trx as $transaction){
                if($transaction->name_trx == $name_trx){
                    return $transaction;
                }
            }
            return null;
        }
    }
        

?>
