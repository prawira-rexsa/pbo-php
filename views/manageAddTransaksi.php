<?php
require_once '/controllers/ItemController.php';
$itemController = new ItemController();
$items = $itemController->getAllItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaction</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Transaction</h2>

                <!-- Tampilkan pesan sukses jika ada -->
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        <?php echo $_SESSION['success_message']; ?>
                        <?php unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?modul=insertTrx&trxdetails=add" method="POST">
                    <!-- Dropdown untuk Nama Item -->
                    <div class="mb-4">
                        <label for="itemSelect" class="block text-gray-700 text-sm font-bold mb-2">Name Item:</label>
                        <select id="name_trx" name="name_trx" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required onchange="updateTransactionName()">
                            <option value="">Pilih Item</option>
                            <?php foreach ($items as $item): ?>
                                <option value="<?php echo $item->item_id; ?>" data-name="<?php echo htmlspecialchars($item->item_name); ?>">
                                    <?php echo htmlspecialchars($item->item_name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Amount Transaction -->
                    <div class="mb-4">
                        <label for="amountItem" class="block text-gray-700 text-sm font-bold mb-2">Amount Transaction:</label>
                        <textarea id="amount_trx" name="amount_trx" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Jumlah Barang" rows="3" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="dateTrx" class="block text-gray-700 text-sm font-bold mb-2">Date Transaction:</label>
                        <input type="text" id="date_trx" name="date_trx" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Tanggal Transaksi" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>