<?php
require_once 'models/transaksiModel.php';

class TransactionController {
    private $transaksiModel;

    public function __construct() {
        $this->transaksiModel = new transaksiModel();
    }

    public function addTransaction($name_trx, $amount_trx, $date_trx) {
        $this->transaksiModel->addTrx($name_trx, $amount_trx, $date_trx);
        $_SESSION['success_message'] = 'Data transaksi berhasil disimpan.';
        header('location: index.php?modul=DetailsTrx');
        exit();
    }

    public function deleteTransaction($id_trx) {
        if ($this->transaksiModel->deleteTrx($id_trx)) {
            $_SESSION['success_message'] = 'Transaksi berhasil dihapus.';
        } else {
            $_SESSION['error_message'] = 'Gagal menghapus transaksi.';
        }
        header('location: index.php?modul=DetailsTrx');
        exit();
    }

    public function getAllTransactions() {
        return $this->transaksiModel->getAllTrx();
    }

    public function getTransactionById($id_trx) {
        return $this->transaksiModel->getTrxById($id_trx);
    }

    public function updateTransaction($id_trx, $name_trx, $amount_trx, $date_trx) {
        if ($this->transaksiModel->updateTrx($id_trx, $name_trx, $amount_trx, $date_trx)) {
            $_SESSION['success_message'] = 'Transaksi berhasil diperbarui.';
        } else {
            $_SESSION['error_message'] = 'Gagal memperbarui transaksi.';
        }
        header('location: index.php?modul=DetailsTrx');
        exit();
    }
}
?>